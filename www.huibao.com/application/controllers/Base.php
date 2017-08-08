<?php

/**
 * 一些公用的控制器方法,需要继承此类.
 *
 * @author moxiaobai
 * @since  2015-03-21
 */
Abstract Class BaseController extends ExpandController {

    private $_regalCategory;
    private $_type;

    protected function init(){

        $this->_type = 2;
        $this->_regalCategory = NewscategoryModel::getInstance()->getCateTree($this->_type,0);

        //尾部新闻
        $whereOne    = array('pid'=>14);//头条分类
        $categoryOne = NewscategoryModel::getInstance()->getInfo(14);
        $dataOne     = NewsModel::getInstance()->getList($whereOne);

        $whereTwo    = array('pid'=>11);//即使分类
        $categoryTwo = NewscategoryModel::getInstance()->getInfo(11);
        $dataTwo     = NewsModel::getInstance()->getList($whereTwo);

        $this->getView()->assign(array(
            'regalCategory'    => $this->_regalCategory,
            'categoryTwo'      => $categoryTwo,
            'categoryOne'      => $categoryOne,
            'dataOne'          => $dataOne,
            'dataTwo'          => $dataTwo,
        ));

    }

    /**
     * 初始化页面标题
     * @param string $title
     */
    protected function initPageTitle($title='') {
        $pageTitle = "{$title}_国汇宝";
        $this->getView()->assign('pageTitle',$pageTitle);
    }

    /**
     * 初始化表单token
     *
     * @param $name
     * @return string
     */
    protected function initFormToken($name) {
        if(! Yaf_Session::getInstance()->has($name)) {
            $token = Helper_Code::getRandCode(12);
            Yaf_Session::getInstance()->set($name, $token);
        } else {
            $token = Yaf_Session::getInstance()->get($name);
        }
        return $token;
    }

    //判断是否是Ajax请求，防止非法请求
    protected function isAjaxRequest() {
        if(! $this->getRequest()->isXmlHttpRequest()) {
            Helper_Json::formJson('非法请求!', 'n');
        }
    }

    //输出JSON数据
    protected function eachJson($result) {
        if($result['code'] == 1) {
            Helper_Json::formJson($result['data'], 'y');
        } else {
            Helper_Json::formJson($result['data'], 'n');
        }
    }

    /**
     * 设置分页
     *
     * @param int $page
     * @param int $per
     * @param $total
     * @param $base_url
     * @param null $ajax_function
     * @param bool $get_method
     * @return string
     */
    protected function setPage($page=1, $per=10, $total, $base_url, $ajax_function=null, $get_method=false) {
        $page = intval($page);
        $page = $page == 0 ? 1 : $page;

        $base_url = rtrim($base_url, '/');

        if ( ($page - 1) * $per > $total ) {
            $this->redirect( $base_url );
        }

        if($get_method == false) {
            $url = $base_url . '/page/';
        } else {
            $url = $base_url . '?page=';
        }
        $obj = new Page(array(
            'total'     => $total,
            'perpage'   => $per,
            'nowindex'  => $page,
            'url'       => $url,
        ), true);

        if ($ajax_function) {
            $obj->open_ajax($ajax_function);
        }

        $obj->current_class = 'current';
        $pagecode = $obj->show(1);
        return $pagecode;
    }
}