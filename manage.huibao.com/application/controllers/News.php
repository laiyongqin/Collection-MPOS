<?php

/**
 * 新闻列表
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class NewsController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status = array(
        1 => '正常',
        2 => '禁用'
    );
    private $_type = array(
        1 => '新手区',
        2 => '富豪区'
    );
    public function init() {
        $this->_model = new NewsModel();
        $this->_pageSize = 12;
    }

    private $_menuList = array(
        'product' => '产品详情',

    );

    public function indexAction($page=1) {
        $this->initPageTitle('新闻列表');

        $tid    = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
        $pid    = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
        $status = isset($_GET['status']) ? intval($_GET['status']) : 0;
        $title  = isset($_GET['title']) ? Helper_Filter::format($_GET['title']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('title'=>$title, 'pid' => $pid, 'tid' => $tid,'status' => $status);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        $category = NewscategoryModel::getInstance()->getListByPid($tid);
        if(!empty($tid)){
            $categoryOption = Helper_Form::option($category ? $category : array(), intval($pid), '请选择分类');
        }else{
            $categoryOption  = Helper_Form::option(array(), intval($pid), '请选择分类');
        }
        //数据列表
        $data = $this->_model->getList( $where, $pagination );

        $typeOption     = Helper_Form::option($this->_type, intval($tid), '请选择类型');

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'        => $baseUrl,
            'title'          => $title,
            'data'           => $data,
            'total'          => $total,
            'page'           => $pageCode,
            'categoryOption' => $categoryOption,
            'typeOption'     => $typeOption,
            'cateList'       => NewscategoryModel::getInstance()->getListArr(),
            'statusOption'   => Helper_Form::option($this->_status, intval($status), '请选择状态')
        ));
    }

    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('新闻详情');
        $id = intval($id);
        $row = array();
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                'n_id' => '',
                'nc_id' => '',
                'n_source' => '汇宝网',
                'n_editor' => '汇汇',
                'n_title' => '',
                'n_cover' => '',
                'n_content' => '',
                'n_des' => '',
                'n_sort' => 1,
                'n_status' => '',
                'n_addtime' => '',
                'nc_type' => '',
            );
        }
        $category = NewscategoryModel::getInstance()->getListByPid($row['nc_type']);
        if(!empty($row['nc_type'])){
            $categoryOption = Helper_Form::option($category ? $category : array(), intval($row['nc_id']), '请选择分类');
        }else{
            $categoryOption  = Helper_Form::option(array(), intval($row['nc_id']), '请选择分类');
        }

        $typeOption     = Helper_Form::option($this->_type, intval($row['nc_type']), '请选择类型');
        $this->getView()->assign(array(
            'row'=> $row,
            'menuList'=> $this->_menuList,
            'categoryOption'=> $categoryOption,
            'typeOption'=> $typeOption,
            'statusOption'=> Helper_Form::option($this->_status, intval($row['n_status']), '请选择状态')
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

        unset($post['file']);
        unset($post['id']);

        if($id){
            $msg = '修改';
            $ret = $this->_model->saveData($post, $id);
        }else{
            $msg = '添加';
            $post['n_addtime'] = date('Y-m-d H:i:s');
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

        $data['n_status'] = $status == 1 ? 2  : 1;
        $ret = $this->_model->saveData($data, $id);
        $msg = '修改';
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

    public function deleteAction($id = 0){
        if(empty($id)){
            Helper_Json::formJson('参数错误');
        }

        $ret = $this->_model->delete($id);
        if($ret){
            Helper_Json::formJson('删除成功', 'y');
        }else{
            Helper_Json::formJson('删除失败');
        }
    }

    public function changeMultiAction(){
        $ids = isset($_POST['ids']) ? Helper_Filter::format($_POST['ids']) : '';
        if(empty($ids)){
            Helper_Json::formJson('未选择项');
        }

        $ret = $this->_model->updateStatus($ids);
        $msg = '修改';
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }
}