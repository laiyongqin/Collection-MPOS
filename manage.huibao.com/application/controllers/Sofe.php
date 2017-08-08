<?php

/**
 * 财经日历
 *
 * @author: monyyip
 * @since : 2016/07/07
 */

class SofeController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status = array(1=>'已推荐' ,2=>'未推荐');

    public function init() {
        $this->_model = new SofeModel();
        $this->_pageSize = 12;
    }

    public function indexAction($page=1) {
        $this->initPageTitle('软件列表');
        $title = isset($_GET['title']) ? Helper_Filter::format($_GET['title']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('title' => $title);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'        => $baseUrl,
            'data'           => $data,
            'total'          => $total,
            'page'           => $pageCode,
            'title'         => $title
        ));
    }

    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('软件详情');
        $id = intval($id);
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                's_id' => '',
                's_cover' => '',
                's_name' => '',
                's_download_link' => '',
                's_sort' => 1,
                's_addtime' => '',
                's_recommend' => 2,
            );
        }

        $recommendOption = Helper_Form::option($this->_status,intval($row['s_recommend']),'请选择推荐状态');
        $this->getView()->assign(array(
            'row'=> $row,
            'recommendOption'=> $recommendOption,
        ));
    }

    //上传图片
    public function uploadAction() {
        $api = new Qiniu_Api('img');
        $params = array('category'=>'news', 'file'=>$_FILES['upload']);
        $ret = $api->uploadImg($params);
        if($ret['code'] == 1) {
            Helper_Json::formJson($ret['data'], 'y');
        } else {
            Helper_Json::formJson($ret['msg'], 'n');
        }
    }


    public function saveAction(){
        $post = $this->getRequest()->getPost();
        $id = intval($post['id']);
        unset($post['id']);

        if($id){
            $msg = '修改';
            $ret = $this->_model->saveData($post, $id);
        }else{
            $msg = '添加';
            $post['s_addtime'] = date('Y-m-d H:i:s');
            $ret = $this->_model->saveData($post);
        }

        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

    public function statusAction($id = 0, $status = 1){
        if(empty($id)){
            Helper_Json::formJson('参数错误');
        }

        $data['s_recommend'] = $status == 1 ? 2  : 1;
        $ret = $this->_model->saveData($data, $id);
        $msg = '修改';
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

}