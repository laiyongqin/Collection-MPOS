<?php

/**
 * 分类管理
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class NewscategoryController extends BaseController
{

    //初始化
    public function init()
    {
        $this->isAjaxRequest();
        $this->isLogin();
        Yaf_Dispatcher::getInstance()->disableView();
    }

    //新增保存数据
    public function saveAction() {
        $id  = intval( $_POST['id'] );

        // 基本数据过滤
        $data  = $this->getRequest()->getPost();

        unset($data['id']);
        $data['nc_parent_id'] = intval($data['nc_parent_id']);
        if($id > 0) {
            $result = NewscategoryModel::getInstance()->saveData($data, $id);
            $msg = '修改';
        } else {
            $data['nc_addtime'] = date('Y-m-d H:i:s');
            $result = NewscategoryModel::getInstance()->saveData($data);
            $msg = '添加';
        }

        if($result){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

    //更改状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $status  = ($status == 1) ? 2: 1;
        $data     = array('nc_status'=>$status);
        $result   = NewscategoryModel::getInstance()->saveData($data, $id);
        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }

}