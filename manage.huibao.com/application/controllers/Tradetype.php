<?php

/**
 * 交易建议类型
 *
 * @author: lindexin
 * @since : 2016/07/07
 */

class TradetypeController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status = array(
        1 => '正常',
        2 => '禁用'
    );

    public function init() {
        $this->_model = new TradetypeModel();
        $this->_pageSize = 12;
    }

    private $_menuList = array(
        'product' => '交易建议类型',

    );

    public function indexAction($page=1) {
        $this->initPageTitle('交易建议类型');
        $name   = isset($_GET['name']) ? Helper_Filter::format($_GET['name']) : '';
        $status   = isset($_GET['status']) ? intval($_GET['status']) : 0;
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('name' => $name, 'status' => $status);
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
            'name'          => $name,
            'data'           => $data,
            'total'          => $total,
            'page'           => $pageCode,
            'statusOption'   => Helper_Form::option($this->_status, intval($status), '请选择状态')
        ));
    }

    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('交易建议详情');
        $id = intval($id);
        $row = array();
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                'tt_id'     => '',
                'tt_name'   => '',
                'tt_status' => 1,
                'tt_sort'   => 1,
                'tt_addtime' => '',
            );
        }

        $this->getView()->assign(array(
            'row'          => $row,
            'menuList'     => $this->_menuList,
            'statusOption' => Helper_Form::option($this->_status, intval($row['tt_status']), '请选择状态')
        ));
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
            $post['tt_addtime'] = date('Y-m-d H:i:s');
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

        $data['tt_status'] = $status == 1 ? 2  : 1;
        $ret = $this->_model->saveData($data, $id);
        $msg = '修改';
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

}