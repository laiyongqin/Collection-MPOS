<?php

/**
 * 财经日历
 *
 * @author: monyyip
 * @since : 2016/07/07
 */

class FinanceController extends BaseController {

    private $_pageSize;
    private $_model;
    public function init() {
        $this->_model = new FinanceModel();
        $this->_pageSize = 12;
    }

    public function indexAction($page=1) {
        $this->initPageTitle('财经日历列表');
        $date = isset($_GET['date']) ? Helper_Filter::format($_GET['date']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('date' => $date);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'    => $baseUrl,
            'data'       => $data,
            'total'      => $total,
            'page'       => $pageCode,
            'date'       => $date
        ));
    }

    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('日历详情');
        $id = intval($id);
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                'fc_id' => '',
                'fc_content' => '',
                'fc_date' => '',
                'fc_addtime' => '',
            );
        }

        $this->getView()->assign(array(
            'row'=> $row,
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
            $post['fc_addtime'] = date('Y-m-d H:i:s');
            $ret = $this->_model->saveData($post);
        }

        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

}