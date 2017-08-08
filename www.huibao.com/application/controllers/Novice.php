<?php

/**
 * 新闻列表-新手区
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class NoviceController extends BaseController {
    private $_pageSize = 12;
    private $_article = 2758; // 什么是外汇的文章id
    public function init() {
        parent::init();
    }

    public function indexAction($page = 1) {
        $this->initPageTitle('新闻列表-新手区');
        $cate = isset($_GET['cate']) ? intval($_GET['cate']) : 3; // 分类，默认是外汇百科
        $id = isset($_GET['id']) ? intval($_GET['id']) : $this->_article;
        $type = isset($_POST['type']) ? Helper_Filter::format($_POST['type'], FALSE, TRUE) : '';
        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';
        //分页参数，读取参数设置
        $pagination = array('page' => $page, 'pagesize' => $this->_pageSize);
        $where = array(
            'tid' => 1, // 新手区
            'pid' => $cate,
        );

        $total = NewsModel::getInstance()->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl), 'getList');
        //数据列表
        $data  = NewsModel::getInstance()->getList( $where, $pagination);
        foreach($data as &$v){
            $v['n_title'] = Helper_Filter::cutString($v['n_title'],18);
        }

        // 读新手区分类列表
        $noviceCateList = NewscategoryModel::getInstance()->getCateTree(1, 0);
        if($type == 'load'){
            $this->getView()->assign('data', $data);
            $this->getView()->assign('page', $pageCode);
            $this->getView()->display('novice/load.html');
            exit();
        }

        // 获得外汇百科的文章
        if(isset($_GET['cate']) && $_GET['cate'] > 0 && empty($_GET['id'])){
            $articleInfo = NewsModel::getInstance()->getCidInfo($cate);
        }else{
            $articleInfo = NewsModel::getInstance()->getInfo($id);
        }


        // 对文章内容进行分页
        $pageContent = explode('_ueditor_page_break_tag_', $articleInfo['n_content']);
        $pageTotal       = $pageContent ? count($pageContent) : 0;
//        $page_url    = '/demo/news/content/';
//        $pagecode    = $this->setPage($page, 1, $total, $page_url);
        $cateInfo = NewscategoryModel::getInstance()->getInfo($cate);
        $this->getView()->assign(array(
            'baseUrl'          => $baseUrl,
            'cate'             => $cate,
            'data'             => $data,
            'totalPage'        => ceil($total / $this->_pageSize),
            'total'            => $total,
            'page'             => $pageCode,
            'noviceCateList'   => $noviceCateList,
            'articleInfo'      => $articleInfo,
            'pageContent'      => $pageContent,
            'pageTotal'        => $pageTotal,
            'cateInfo'         => $cateInfo,
            'hide'             => empty($_GET['cate']) ? 1 : 0,
        ));
    }

}