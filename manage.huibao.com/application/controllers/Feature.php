<?php

/**
 * 单篇文章
 *
 * @author: lindexin
 * @since : 2016/07/18
 */

class FeatureController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status = array(1=>'正常' ,2=>'禁用');

    public function init() {
        $this->_model = new FeatureModel();
        $this->_pageSize = 12;
    }

    //表单页
    public function formAction() {

        $this->initPageTitle('特色服务详情');
        $id = 1;
        $row  = $this->_model->getInfo($id);

        $statusOption = Helper_Form::option($this->_status,intval($row['f_status']),'请选择状态');
        $this->getView()->assign(array(
            'row'=> $row,
            'statusOption'=> $statusOption,
        ));
    }


    public function saveAction(){
        $post = $this->getRequest()->getPost();
        $id = intval($post['id']);
        unset($post['id']);

        if($id){
            $msg = '修改';
            $ret = $this->_model->saveData($post, $id);
        }

        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }
}