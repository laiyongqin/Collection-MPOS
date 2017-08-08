<?php

/**
 * 交易建议
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class TradesuggestController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_type;
    public function init() {
        $this->_model = new TradesuggestModel();
        $this->_pageSize = 12;
        $this->_type = TradetypeModel::getInstance()->option();
    }

    public function indexAction($page=1) {
        $this->initPageTitle('交易建议');

        $type   = isset($_GET['type']) ? intval($_GET['type']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('type' => $type);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        $typeOption = Helper_Form::option($this->_type, intval($type), '请选择类型');
        //数据列表
        $data = $this->_model->getList( $where, $pagination );

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'        => $baseUrl,
            'data'           => $data,
            'type'           => $this->_type,
            'total'          => $total,
            'page'           => $pageCode,
            'typeOption'     => $typeOption,
        ));
    }

    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('交易建议');
        $id = intval($id);
        $row = array();
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                'ts_id' => '',
                'tt_id' => '',
                'ts_cover' => '',
                'ts_target' => '',
                'ts_loss' => '',
                'ts_purchase' => '',
            );
        }

        $typeOption = Helper_Form::option($this->_type, intval($row['tt_id']), '请选择类型');

        $this->getView()->assign(array(
            'row'           => $row,
            'typeOption'    => $typeOption,
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
            $ret = $this->_model->saveData($post);
        }

        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }


}