<?php

/**
 * 广告组管理
 *
 * @author: lindexin
 * @since : 2016/07/18
 */

class AdsgroupController extends BaseController {

    private $_pageSize;
    private $_model;

    public function init() {

        $this->_model = new AdsgroupModel();
        $this->_pageSize = 12;
    }


    public function indexAction($page=1) {
        $this->initPageTitle('广告组列表');

        $title  = isset($_GET['title']) ? Helper_Filter::format($_GET['title']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('title'=>$title);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );

        $ids = Helper_Array::setIds( $data, 'a_ids', TRUE);
        $ids = trim($ids, ",");

        $ads = AdsModel::getInstance()->getList(array('ids' => $ids) );
        $ads = Helper_Array::setIdsKey($ads, 'a_id');

        if($data) {
            foreach ( $data AS &$row ) {
                $row['a_ids'] = explode(',', $row['a_ids']);
                foreach ($row['a_ids'] as $key => $id) {
                    if(array_key_exists($id,$ads)){
                        $row['a_ids'][$key] = $ads[$id];
                    }else{
                        unset($row['a_ids'][$key]);
                    }
                }
                $row['a_counts'] = count($row['a_ids']);
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'        => $baseUrl,
            'title'          => $title,
            'data'           => $data,
            'total'          => $total,
            'page'           => $pageCode,
        ));
    }


    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('广告组');
        $id = intval($id);
        $row = array();
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
            $row['a_ids'] = (explode(",",$row['a_ids']));
        }else{
            $row = array(
                'ag_id' => '',
                'ag_name' => '',
                'ag_cname' => '',
                'a_ids' => '',
                'ag_addtime' => '',
            );
        }
        //获得所有广告
        $where   = array('status'=>1);
        $adsData = AdsModel::getInstance()->getList($where);

        $this->getView()->assign(array(
            'row'=> $row,
            'adsData'=> $adsData,
        ));
    }


    public function saveAction(){
        $post = $this->getRequest()->getPost();

        $id = intval($post['id']);

        unset($post['id']);
        unset($post['banner']);

        if($id){
            $msg = '修改';
            $ret = $this->_model->saveData($post, $id);
        }else{
            $msg = '添加';
            $post['ag_addtime'] = date('Y-m-d H:i:s');
            $ret = $this->_model->saveData($post);
        }

        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }
}