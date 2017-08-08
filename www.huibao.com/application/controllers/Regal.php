<?php

/**
 * 新闻列表-富豪区
 * @author: lindexin
 * @since : 2016/07/12
 */

class RegalController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_type;

    protected function init() {

        parent::init();
        $this->_model = new NewsModel();
        $this->_pageSize = 15;
        $this->_type = 2; //富豪区类型id
    }

    public function indexAction($page=1){

        $this->initPageTitle('富豪区');
        $this->_pageSize = 5;

        $id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if(!$id){
            $this->getView()->display('index/index.html');
            die;
        }
        $page   = intval($page);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';

        // 获得该分类下面所有分类
        if($id){
            $cateInfo = NewscategoryModel::getInstance()->getInfo($id);

            if(empty($cateInfo)){
                return FALSE;
            }
            if($cateInfo['nc_parent_id'] == 0){
                // 获得子分类
                $pid = $cateInfo['nc_id'];

                // 获得所有分类
                $cateList = NewscategoryModel::getInstance()->getList(array('pid' => $pid), array());

                if($cateList){
                    foreach($cateList as $val){
                        $tmp[] = $val['nc_id'];
                    }
                }
                $tmp[] = $id;
                $where['cateID'] = $tmp;
            }else{
                $pid = $cateInfo['nc_id'];
                $where['cateID'] = array($id);
                $cateList = NewscategoryModel::getInstance()->getList(array('pid' => $pid), array());
            }
        }

        //分页参数，读取参数设置
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $where1    = (array('ntid'=>1,'cateID'=>array($id)));//国际新闻
        $where2    = (array('ntid'=>2,'cateID'=>array($id)));//国内新闻
        $total    = NewsModel::getInstance()->countData($where);

        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data  = NewsModel::getInstance()->getList( $where, $pagination);
        $testData  = NewsModel::getInstance()->getList( $where2, $pagination);
        $picData  = NewsModel::getInstance()->getList( $where1, $pagination);

        $first = array();
        if($id==14){
            if($testData){
                foreach($testData as &$v){
                    $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                    $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                    $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 90);
                }
            }
            if($picData){
                foreach($picData as &$v){
                    $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                    $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                    $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 90);
                }
            }
        }

        if($data){
            foreach($data as &$v){
                $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 90);
            }


            //判断数据是否为头条
            foreach($data as $key=>$val){
                if($val['nc_id'] ==14 && $id==14){
                    if(!isset($val['nc_id'])){
                        continue;
                    }
                    $first[$val['n_type']][$key] = $val;
                }
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'id'        => $id,
            'data'      => $data,
            'testData'  => $testData,
            'picData'   => $picData,
            'first'     => $first,
            'total'     => $total,
            'page'      => $pageCode,
            'cateInfo'  => $cateInfo,
            'cateList'  => $cateList,

        ));
    }

    //国际新闻列表
    public function firstinfoAction($page=1){

        $this->initPageTitle('国际新闻列表');
        $id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if(!$id){
            $this->getView()->display('index/index.html');
            die;
        }
        $page   = intval($page);
        $cateInfo = NewscategoryModel::getInstance()->getInfo($id);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';


        //分页参数，读取参数设置
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $where    = array('ntid'=>1,'cateID'=>array($id));
        $total    = NewsModel::getInstance()->countData($where);

        $pageUrl  = $baseUrl .  'firstinfo/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data  = NewsModel::getInstance()->getList( $where, $pagination);
        if($data){
            foreach($data as &$v){
                $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 90);
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'id'        => $id,
            'data'      => $data,
            'total'     => $total,
            'page'       => $pageCode,
            'cateInfo'   => $cateInfo,
        ));
    }

    //国内新闻列表
    public function firsttestAction($page=1){
        $this->initPageTitle('国内新闻列表');

        $this->_pageSize = 16;
        $id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if(!$id){
            $this->getView()->display('index/index.html');
            die;
        }
        $page   = intval($page);
        $cateInfo = NewscategoryModel::getInstance()->getInfo($id);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';


        //分页参数，读取参数设置
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $where    = array('ntid'=>2,'cateID'=>array($id));
        $total    = NewsModel::getInstance()->countData($where);

        $pageUrl  = $baseUrl .  'firsttest/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data  = NewsModel::getInstance()->getList( $where, $pagination);
        if($data){
            foreach($data as &$v){
                $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 90);
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'id'        => $id,
            'data'      => $data,
            'total'     => $total,
            'page'       => $pageCode,
            'cateInfo'   => $cateInfo,
        ));
    }

    //交易策略
    public function strategyAction(){

        $this->initPageTitle('交易策略');
        $id     = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $type   = isset($_GET['type']) ? intval($_GET['type']) : 1;
        if(!$id){
            $this->getView()->display('index/index.html');
            die;
        }

        // 获得该分类下面所有分类
        if($id){
            $cateInfo = NewscategoryModel::getInstance()->getInfo($id);
            if(empty($cateInfo)){
                return FALSE;
            }
            if($cateInfo['nc_parent_id'] == 0){
                // 获得子分类
                $pid = $cateInfo['nc_id'];
                // 获得所有分类

                $cateList = NewscategoryModel::getInstance()->getList(array('pid' => $pid), array());
                if($cateList){
                    foreach($cateList as $val){
                        $tmp[] = $val['nc_id'];
                    }
                }
                $tmp[] = $id;
                $where['cateID'] = $tmp;
            }else{
                $pid = $cateInfo['nc_id'];
                $where['cateID'] = array($id);
                $cateList = NewscategoryModel::getInstance()->getList(array('pid' => $pid), array());
            }
        }

        //数据列表
        $data      = NewsModel::getInstance()->getList($where);

        //交易建议
        $tradeType = TradetypeModel::getInstance()->getList(array('status'=>1));
        $tradeData = TradesuggestModel::getInstance()->mergData($tradeType);
        $sunData = array();
        $nightData = array();
        $monData = array();
        $weekData = array();

        if($data){
            foreach($data as &$v){
                $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']),70);
            }
            //判断数据是否为头条
            foreach($data as $key=>$val){
                if($val['nc_id']==19){
                    $sunData[] = $val;
                }
                if($val['nc_id']==20){
                    $nightData[] = $val;

                }
                if($val['nc_id']==21){
                    $weekData[] = $val;
                }
                if($val['nc_id']==22){
                    $monData[] = $val;
                }
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'id'          => $id,
            'ncid'          => $id,
            'type'          => $type,
            'data'          => $data,
            'sunData'     => $sunData,
            'nightData'   => $nightData,
            'monData'     => $monData,
            'weekData'   => $weekData,
            'cateInfo'    => $cateInfo,
            'cateList'    => $cateList,

            'tradeData'    => $tradeData,

        ));
    }

    //国内新闻列表
    public function strategylistAction($page=1){
        $this->initPageTitle('交易策略列表');
        $id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if(!$id){
            $this->getView()->display('index/index.html');
            die;
        }

        $page   = intval($page);
        $cateInfo = NewscategoryModel::getInstance()->getInfo($id);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';


        //分页参数，读取参数设置
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $where    = array('pid'=>$id);
        $total    = NewsModel::getInstance()->countData($where);

        $pageUrl  = $baseUrl .  'strategylist/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data  = NewsModel::getInstance()->getList( $where, $pagination);

        if($data){
            foreach($data as &$v){
                $v['n_addtime'] = date('Y-m-d',strtotime($v['n_addtime']));
                $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
                $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 40);
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'id'        => $id,
            'data'      => $data,
            'total'     => $total,
            'page'       => $pageCode,
            'cateInfo'       => $cateInfo,
        ));
    }

    //即时资讯列表
    public function instantAction($page=1){

        $this->initPageTitle('即时资讯列表');
        $id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if(!$id){
            $this->getView()->display('index/index.html');
            die;
        }
        $this->_pageSize = 12;
        $page   = intval($page);
        $cateInfo = NewscategoryModel::getInstance()->getInfo($id);

        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getControllerName() . '/';


        //分页参数，读取参数设置
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $where    = array('pid'=>$id);
        $total    = NewsModel::getInstance()->countData($where);

        $pageUrl  = $baseUrl .  'instant/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data  = NewsModel::getInstance()->getList( $where, $pagination);
        if($data){
            foreach($data as &$v){
                $v['n_addtime'] = date('H:i',strtotime($v['n_addtime']));
//                $v['n_title']   = Helper_Filter::cutString(strip_tags($v['n_title']), 40);
//                $v['n_content'] = Helper_Filter::cutString(strip_tags($v['n_content']), 150);
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'id'        => $id,
            'data'      => $data,
            'total'     => $total,
            'page'       => $pageCode,
            'cateInfo'       => $cateInfo,
        ));
    }

}