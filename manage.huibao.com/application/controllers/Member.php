<?php

/**
 * 用户管理
 *
 * @author: lindexin
 * @since : 2016/07/11
 */

class MemberController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status = array(1=>'正常',2=>'禁用');

    public function init() {
        $this->_model = new MemberModel();
        $this->_pageSize = 12;
    }

    public function indexAction($page=1) {
        $this->initPageTitle('用户管理');

        $status = isset($_GET['status']) ? intval($_GET['status']) : '';
        $name   = isset($_GET['name']) ? Helper_Filter::format($_GET['name']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('username'=>$name, 'status'=>$status);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'name'      => $name,
            'data'      => $data,
            'total'     => $total,
            'page'      => $pageCode,
            'statusOption'   => Helper_Form::option($this->_status, intval($status), '请选择状态')
        ));
    }

    //修改密码表单页
    public function formPasswordAction($id=0) {
        $id = intval($id);
        $this->getView()->assign('id', $id);
    }

    //表单页
    public function formAction($id=0) {
        $id = intval($id);

        $row = array(
            'm_status'=>''
        );
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }
        //类型数据
        $statusOption = Helper_Form::option($this->_status,isset($row) ? intval($row['m_status']) : '','请选择状态');

        $this->getView()->assign(array(
            'id'                => isset($row['m_id']) ? $row['m_id'] : '',
            'username'          => isset($row['m_username']) ? $row['m_username'] : '',
            'realname'          => isset($row['m_realname']) ? $row['m_realname'] : '',
            'password'          => isset($row['m_password']) ? $row['m_password'] : '',
            'addtime'           => isset($row['m_addtime']) ? $row['m_addtime'] : '',
            'statusOption'      => $statusOption
        ));
    }
}