<?php

/**
 * 毛毛数据
 *
 * @author: monyyip
 * @since : 2016/7/11
 */

class CollectController extends BaseController {

    //初始化
    public function init()
    {
        $this->isAjaxRequest();
        $this->isLogin();
        Yaf_Dispatcher::getInstance()->disableView();
    }

    // 毛毛日历
    public function calendarAction(){
        set_time_limit(0);
        $day = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
        if(empty($day)){
            $day = date('Y-m-d');
        }

        $date = date('Ymd', strtotime($day));
        PhpQuery_Query::newDocumentFile("http://rl.fx678.com/date/{$date}.html");
        $cjsj_tab[] = '<table class="cjsj_tab">' . pq('.cjsj_tab')->html() . '</table>';
        foreach(pq('.cjsj_tab2') as $item){
            $cjsj_tab[] = '<table class="cjsj_tab2">' . pq($item)->html() . '</table>';
        }

        $content = '';
        if($cjsj_tab){
            foreach($cjsj_tab as $val){
                $val = str_replace('/Public/images/', 'http://rl.fx678.com/Public/images/', $val);
                $val = preg_replace("(<a[^>]*>(.+?)<\/a>)","<a href='javascript:void(0);'>$1</a>", $val);
                $content .= $val;
            }

            $data = array(
                'fc_content' => $content,
                'fc_date' => date('Y-m-d', strtotime($date)),
                'fc_addtime' => date('Y-m-d H:i:s'),
            );

            // 根据标题判断是否有插入过
            $res = FinanceModel::getInstance()->getInfoByDate($data['fc_date']);
            if(!$res){
                FinanceModel::getInstance()->saveData($data);
            }else{
//                FinanceModel::getInstance()->saveData($data, $res['fc_id']);
            }
        }

        Helper_Json::formJson('采集成功', 'y');
    }


    // 毛毛新闻
    public function newsAction(){
        set_time_limit(0);
        ignore_user_abort(true);
        $tid = isset($_POST['tid']) ? intval($_POST['tid']) : 0;
        $pid = isset($_POST['pid']) ? intval($_POST['pid']) : 0;
        if(empty($tid)){
            Helper_Json::formJson('请选择类型');
        }

        if(empty($pid)){
            Helper_Json::formJson('请选择分类');
        }

        switch($tid){
            case 1: // 新手区,后台编辑
                Helper_Json::formJson('新手区，后台编辑');
                break;
            case 2: // 富豪区
                switch($pid){
                    case 11: // 即时资讯
                        PhpQuery_Query::newDocumentFile('http://www.jin10.com/');
                        $obj = pq('.newsline');
                        $arr = array();
                        foreach($obj as $item){
                            $arr[] = pq($item)->html();
                        }

                        if($arr){
                            foreach($arr as $val){
                                // 遍历获得td内容
                                $tds = array();
                                foreach(pq($val)->find('td') as $v){
                                    $tds[] = pq($v)->html();
                                }

                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 2,
                                    'nc_id' => $pid,
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => strip_tags($tds[2]),
                                    'n_content' => $tds[2],
                                    'n_sort' => 1,
                                    'n_status' => 1,
                                    'n_addtime' => date('Y-m-d H:i:s'),
                                );

                                // 根据标题判断是否有插入过
                                $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                if($res){
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 14: // 头条，国际和国内放在一个版面
                        PhpQuery_Query::newDocumentFile('http://news.fx678.com/news/top/index.shtml');
                        $obj = pq('#analysis_ul');
                        $images = array();
                        $title = array();
                        $content = array();
                        $url = array();
                        foreach($obj->find('.new_6_pic a img') as $item){
                            $images[] = pq($item)->attr('src');
                        }

                        foreach($obj->find('.touzi_font h1 a') as $item){
                            $url[] = pq($item)->attr('href');
                            $title[] = pq($item)->html();
                        }

                        foreach($obj->find('.touzi_font p a') as $item){
                            $content[] = pq($item)->html();
                        }

                        if($title){
                            foreach($title as $key => $val){
                                $newUrl = 'http://news.fx678.com' . $url[$key];
                                PhpQuery_Query::newDocumentFile($newUrl);
                                $content = pq('.wenzhang_my_area')->html();
                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => $images[$key],
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => $title[$key],
                                    'n_content' => $content,
                                    'n_sort' => 1,
                                    'n_status' => 2,
                                    'n_addtime' => date('Y-m-d H:i:s'),
                                );

                                // 根据标题判断是否有插入过
                                $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                if($res){
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }
                        }

                        PhpQuery_Query::newDocumentFile('http://news.hexun.com/');
                        $obj = pq('.m_news:eq(0)');
                        foreach($obj->find('li') as $item){
                            $url = pq($item)->find('a')->attr('href');
                            $title = pq($item)->find('a')->html();
                            $title = mb_convert_encoding($title,'ISO-8859-1','utf-8');
                            $title = mb_convert_encoding($title,'utf-8','GBK');
                            // 获得内容
                            PhpQuery_Query::newDocumentFile($url);
                            $content = pq('.art_contextBox')->html();
                            $encode = mb_detect_encoding($content, array("ASCII",'UTF-8',"GB2312","GBK"));
                            if($encode != 'UTF-8'){
                                $content = iconv($encode, "utf-8",$content);
                            }

                            $data = array(
                                'nc_type' => $tid,
                                'n_type' => 2,
                                'nc_id' => $pid,
//                                    'n_cover' => $imgs ? $imgs[1][0] : '',
                                'n_source' => '汇宝',
                                'n_editor' => '毛毛',
                                'n_title' => $title,
                                'n_content' => $content,
                                'n_sort' => 1,
                                'n_status' => 2,
                                'n_addtime' => date('Y-m-d H:i:s'),
                            );

                            // 根据标题判断是否有插入过
                            $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                            if($res){
//                                NewsModel::getInstance()->saveData($data, $res['n_id']);
                            }else{
                                NewsModel::getInstance()->saveData($data);
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 15: // 外汇
                        PhpQuery_Query::newDocumentFile('http://news.fx168.com/top/forex/');
                        $obj = pq('.yjl_fx168_news_listBox');
                        $images = array();
                        $title = array();
                        $content = '';
//                        $content = array();
                        $url = array();
                        foreach($obj->find('.yjl_fx168_news_listPhoto a img') as $item){
                            $images[] = pq($item)->attr('lazy-src');
                        }

                        foreach($obj->find('.yjl_fx168_news_listTitle a') as $item){
                            $url[] = pq($item)->attr('href');
                            $title[] = pq($item)->html();
                        }

//                        foreach($obj->find('.del') as $item){
//                            $content[] = pq($item)->html();
//                        }

                        if($title){
                            foreach($title as $key => $val){
                                $newUrl = $url[$key];
                                PhpQuery_Query::newDocumentFile($newUrl);
                                $content = pq('.yjl_fx168_article_zhengwen')->html();
                                // 替换图片链接
                                $conImg = Helper_Collect::getImgUrl($content);
                                if($conImg && isset($conImg[1])){
                                    $tmp = explode('/', $newUrl);
                                    unset($tmp[count($tmp) - 1]);
                                    $newUrl = implode('/', $tmp);
                                    foreach($conImg[1] as $kc => $vc){
                                        $content = str_replace($vc, $newUrl . "/" . $vc, $content);
                                    }

                                    $content = str_replace('./', '', $content);
                                }

                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => $images[$key],
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => $title[$key],
                                    'n_content' => $content,
                                    'n_sort' => 1,
                                    'n_status' => 2,
                                    'n_addtime' => date('Y-m-d H:i:s'),
                                );

                                // 根据标题判断是否有插入过
                                $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                if($res){
                                    // 更新
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 16: // 贵金属
                        PhpQuery_Query::newDocumentFile('http://24k99.fx168.com/top/');

                        $obj = pq('.yjl_ContentList_tabBox');
                        $images = array();
                        $title = array();
                        $url = array();
                        foreach($obj->find('.left a img') as $item){
                            $images[] = pq($item)->attr('src');
                        }

                        foreach($obj->find('.rightName h3 a') as $item){
                            $url[] = pq($item)->attr('href');
                            $title[] = pq($item)->html();
                        }


                        if($title){
                            foreach($title as $key => $val){
                                $newUrl = $url[$key];
                                PhpQuery_Query::newDocumentFile($newUrl);
                                $content = pq('.TRS_Editor')->html();
                                // 替换图片链接
                                $conImg = Helper_Collect::getImgUrl($content);
                                if($conImg && isset($conImg[1])){
                                    $tmp = explode('/', $newUrl);
                                    unset($tmp[count($tmp) - 1]);
                                    $newUrl = implode('/', $tmp);
                                    foreach($conImg[1] as $kc => $vc){
                                        $content = str_replace($vc, $newUrl . "/" . $vc, $content);
                                    }

                                    $content = str_replace('./', '', $content);
                                }

                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => $images[$key],
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => $title[$key],
                                    'n_content' => $content,
                                    'n_sort' => 1,
                                    'n_status' => 2,
                                    'n_addtime' => date('Y-m-d H:i:s'),
                                );

                                // 根据标题判断是否有插入过
                                $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                if($res){
                                    // 更新
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 17:
                        // 原油
                        PhpQuery_Query::newDocumentFile("http://oil.fx168.com/top/");

                        $obj = pq('.yjl_ContentList_tabBox');
                        $images = array();
                        $title = array();
                        $url = array();
                        foreach($obj->find('.left a img') as $item){
                            $images[] = pq($item)->attr('src');
                        }

                        foreach($obj->find('.rightName h3 a') as $item){
                            $url[] = pq($item)->attr('href');
                            $title[] = pq($item)->html();
                        }


                        if($title){
                            foreach($title as $key => $val){
                                $newUrl = $url[$key];
                                PhpQuery_Query::newDocumentFile($newUrl);
                                $content = pq('.TRS_Editor')->html();
                                // 替换图片链接
                                $conImg = Helper_Collect::getImgUrl($content);
                                if($conImg && isset($conImg[1])){
                                    $tmp = explode('/', $newUrl);
                                    unset($tmp[count($tmp) - 1]);
                                    $newUrl = implode('/', $tmp);
                                    foreach($conImg[1] as $kc => $vc){
                                        $content = str_replace($vc, $newUrl . "/" . $vc, $content);
                                    }

                                    $content = str_replace('./', '', $content);
                                }

                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => $images[$key],
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => $title[$key],
                                    'n_content' => $content,
                                    'n_sort' => 1,
                                    'n_status' => 2,
                                    'n_addtime' => date('Y-m-d H:i:s'),
                                );

                                // 根据标题判断是否有插入过
                                $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                if($res){
                                    // 更新
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 18:
                        // 专家解读
                        PhpQuery_Query::newDocumentFile("http://news.jin10.com/");
                        $obj = pq('#newest-news');
                        $images = array();
                        $title = array();
                        $url = array();
                        foreach($obj->find('.col-sm-3 a img') as $item){
                            $images[] = pq($item)->attr('src');
                        }

                        foreach($obj->find('.col-sm-9 h4 a') as $item){
                            $url[] = pq($item)->attr('href');
                            $title[] = pq($item)->html();
                        }

                        if($title){
                            foreach($title as $key => $val){
                                $newUrl = $url[$key];
                                PhpQuery_Query::newDocumentFile("http://news.jin10.com" . $newUrl);
                                $content = pq('#content-detail')->html();
                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => $images[$key],
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => $title[$key],
                                    'n_content' => $content,
                                    'n_sort' => 1,
                                    'n_status' => 2,
                                    'n_addtime' => date('Y-m-d H:i:s'),
                                );

                                // 根据标题判断是否有插入过
                                $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                if($res){
                                    // 更新
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    default:
                        Helper_Json::formJson('请选择有效的毛毛分类');
                        break;
                }

                break;
            default:
                Helper_Json::formJson('请选择采集类型');
                break;
        }
    }
}