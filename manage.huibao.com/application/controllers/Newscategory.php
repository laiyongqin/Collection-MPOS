<?php

/**
 * 新闻分类
 *
 * @author: lindexin
 * @since : 2016/07/06
 */
class NewscategoryController extends BaseController {
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

        $this->_model = new NewscategoryModel();
        $this->_pageSize = 12;
    }

    public function indexAction($page=1) {
        $this->initPageTitle('分类列表');
        $name        = isset($_GET['name']) ? Helper_Filter::format($_GET['name']) : '';
        $pid         = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
        $status      = isset($_GET['status']) ? intval($_GET['status']) : '';
        $tid         = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
        $page        = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('name' => $name, 'pid' => $pid, 'status' => $status,'tid'=>$tid);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));
        //数据列表
        $data           = $this->_model->getList( $where, $pagination );
        $category       = $this->_model->getListByPid($tid);

        if(!empty($tid)){
            $categoryOption = Helper_Form::option($category ? $category : array(), intval($pid), '请选择分类');
        }else{
            $categoryOption  = Helper_Form::option(array(), intval($pid), '请选择分类');
        }

        $typeOption     = Helper_Form::option($this->_type, intval($tid), '请选择类型');
        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'        => $baseUrl,
            'name'           => $name,
            'data'           => $data,
            'total'          => $total,
            'page'           => $pageCode,
            'categoryOption' => $categoryOption,
            'typeOption' => $typeOption,
            'statusOption'   => Helper_Form::option($this->_status, intval($status), '请选择状态')
        ));
    }

    //表单页
    public function formAction($id = 0) {
        $id = intval($id);
        $row = array();
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                'nc_id' => 0,'nc_parent_id' => 0,'nc_alias' => '','nc_name' => '','nc_type'=>'','nc_sort' => 1,'nc_status' => 1,'nc_addtime' => ''
            );
        }

        $category = $this->_model->getListByPid($row['nc_type']);

        if(!empty($row['nc_type'])){
            $categoryOption = Helper_Form::option($category ? $category : array(), intval($row['nc_parent_id']), '请选择分类');
        }else{
            $categoryOption  = Helper_Form::option(array(), intval($row['nc_parent_id']), '请选择分类');
        }

        $typeOption     = Helper_Form::option($this->_type, intval($row['nc_type']), '请选择类型');
        $this->getView()->assign($row);
        $this->getView()->assign(array(
            'categoryOption' => $categoryOption,
            'typeOption' => $typeOption,
            'id' => $id,
            'statusOption' => Helper_Form::option($this->_status, intval($row['nc_status']), '请选择状态')
        ));
    }

    /**
     * @throws Exception
     *
     * 获得类型下的所在分类
     */
    public function getTypeAction(){
        $tid = intval($_POST['tid']);
        $category       = $this->_model->getListByPid($tid);
        $category       = Helper_Form::option($category ? $category : array(),'','请选择分类');
        Helper_Json::echoJson(1, $category);
    }

}