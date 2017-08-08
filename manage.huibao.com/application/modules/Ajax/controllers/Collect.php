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
        $arr = Helper_Collect::getContent("http://rl.fx678.com/date/{$date}.html", '/<table[^>]+>(.*)<\/table>/isU');
        $arr = Helper_Collect::filterDiv($arr);
        if($arr && $arr[0]){
            // 替换图片
            foreach($arr[0] as &$val){
                $val = str_replace('/Public/images/', 'http://rl.fx678.com/Public/images/', $val);
//                $val = str_replace('/\/id\/(\d)+html$/', 'javascript:void(0);', $val);
                $val = preg_replace("(<a[^>]*>(.+?)<\/a>)","<a href='javascript:void(0);'>$1</a>", $val);
            }

            $data = array(
                'fc_content' => $arr[0][0] . $arr[0][1] . $arr[0][2] . $arr[0][3]. $arr[0][4]. $arr[0][3]. $arr[0][5],
                'fc_date' => date('Y-m-d', strtotime($date)),
                'fc_addtime' => date('Y-m-d H:i:s'),
            );

            // 根据标题判断是否有插入过
            $res = FinanceModel::getInstance()->getInfoByDate($data['fc_date']);
            if(!$res){
                FinanceModel::getInstance()->saveData($data);
            }else{
                FinanceModel::getInstance()->saveData($data, $res['fc_id']);
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
                        $arr = Helper_Collect::getContent("http://www.jin10.com/", "/<div class=\"newsline\".*?>.*?<\/div>/ism");
                        if(!empty($arr) && !empty($arr[0])){
                            // 解析里面的内容
                            $arr[0] = array_reverse($arr[0]);
                            foreach($arr[0] as $val){
                                $tds = Helper_Collect::getTdContent($val);
                                $tds = Helper_Collect::filterDiv($tds);
                                if($tds && !empty($tds[1][2])){
                                    $data = array(
                                        'nc_type' => $tid,
                                        'n_type' => 2,
                                        'nc_id' => $pid,
                                        'n_source' => '汇宝',
                                        'n_editor' => '毛毛',
                                        'n_title' => Helper_Filter::cutString($tds[1][2], 100),
                                        'n_content' => $tds[1][2],
                                        'n_sort' => 1,
                                        'n_status' => 1,
                                        'n_addtime' => date('Y-m-d H:i:s'),
                                    );

                                    // 根据标题判断是否有插入过
                                    $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                    if($res){
//                                        NewsModel::getInstance()->saveData($data, $res['n_id']);
                                    }else{
                                        NewsModel::getInstance()->saveData($data);
                                    }
                                }
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 14: // 头条，国际和国内放在一个版面
                        // 国际
                        $arr = Helper_Collect::getContent("http://news.fx678.com/news/top/index.shtml", "/<ul id=\"analysis_ul\".*?>.*?<\/ul>/ism");
                        if($arr){
                            $arr = Helper_Collect::getLiContent($arr[0][0]);
                            // 解析li里面的div数据
                            if($arr) {
                                $arr[0] = array_reverse($arr[0]);
                                foreach ($arr[0] as $val) {
                                    $contents = Helper_Collect::getContentByReg($val, '#<div.+?>(.+?)</div>#');
                                    $contents = Helper_Collect::filterDiv($contents);
                                    $imgs = Helper_Collect::getImgUrl($val);
                                    if($contents && isset($contents[1][3])){
                                        // 获得图片，及内容
                                        $con = Helper_Collect::getAContent($contents[1][3]);
                                        $con = Helper_Collect::filterDiv($con);
                                        if(empty($con)){
                                            continue;
                                        }

                                        // 获得a标签的href，方便以下获得详情页面的内容
                                        $hrefList = Helper_Collect::getAHref($con[0][0]);
                                        if($hrefList){
                                            $url = 'http://news.fx678.com' . $hrefList[1][0];
                                            $contentArr = Helper_Collect::getContent($url, "/<div class=\"wenzhang_my_area\".*?>.+?<\/div>/ism");
                                            $contentArr = Helper_Collect::filterDiv($contentArr);
                                        }

                                        if(empty($contentArr[0][0])){
                                            continue;
                                        }

                                        $data = array(
                                            'nc_type' => $tid,
                                            'n_type' => 1,
                                            'nc_id' => $pid,
                                            'n_cover' => $imgs ? $imgs[1][0] : '',
                                            'n_source' => '汇宝',
                                            'n_editor' => '毛毛',
                                            'n_title' => $con[1][0],
                                            'n_content' => $contentArr[0][0],
                                            'n_sort' => 1,
                                            'n_status' => 2,
                                            'n_addtime' => date('Y-m-d H:i:s'),
                                        );

                                        // 根据标题判断是否有插入过
                                        $res = NewsModel::getInstance()->getInfoByTitle($data['n_title']);
                                        if($res){
//                                            NewsModel::getInstance()->saveData($data, $res['n_id']);
                                        }else{
                                            NewsModel::getInstance()->saveData($data);
                                        }
                                    }
                                }
                            }
                        }

                        // 国内
                        $arr = Helper_Collect::getContent("http://news.hexun.com/", "/<div class=\"l\".*?>.*?<\/div>/ism", '<div id=toutiao></div>');
                        if($arr){
                            $res = $arr[0][0]; // 获得头条
                            $arr = Helper_Collect::getLiContent($res);
                            $arr[0] = array_reverse($arr[0]);
                            foreach($arr[0] as $val){
                                $con = Helper_Collect::getAContent($val);
                                $con = Helper_Collect::filterDiv($con);
                                if(empty($con)){
                                    continue;
                                }

                                // 获得a标签的href，方便以下获得详情页面的内容
                                $hrefList = Helper_Collect::getAHref($con[0][0]);
                                if($hrefList){
                                    $url = $hrefList[1][0];
                                    $contentArr = Helper_Collect::getContent($url, "/<div class=\"art_contextBox\".*?>.+?<\/div>/ism");
                                    $contentArr = Helper_Collect::filterDiv($contentArr);
                                }

                                if(empty($contentArr[0][0])){
                                    continue;
                                }

                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 2,
                                    'nc_id' => $pid,
//                                    'n_cover' => $imgs ? $imgs[1][0] : '',
                                    'n_source' => '汇宝',
                                    'n_editor' => '毛毛',
                                    'n_title' => $con[1][0],
                                    'n_content' => $contentArr[0][0],
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

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 15: // 外汇
                        $arr = Helper_Collect::getContent("http://news.fx168.com/top/forex/", "/<div class=\"yjl_fx168_news_listName\".*?>.*?<\/div>/ism");
                        $timeList = $arr[0];
                        // 获得标题的div
                        $arr = Helper_Collect::getContent("http://news.fx168.com/top/forex/", "/<div class=\"yjl_fx168_news_listPhoto\".*?>.*?<\/div>/ism");
                        $arr[0] = array_reverse($arr[0]);
                        $titleList = $arr[0];
                        foreach($titleList as $key => $val){
                            // 遍历内容
                            $dayStr = $timeList[$key];
                            $arr = Helper_Collect::getContentByReg($dayStr, "/<h5.*?>.*?<\/h5>/ism");
                            $day = str_replace('<h5>', '', $arr[0][0]);
                            $day = str_replace('</h5>', '', $day);

                            // 获得图片
                            $imgs = Helper_Collect::getImgUrl($val);
                            $con = Helper_Collect::getAContent($val);
                            $con = Helper_Collect::filterDiv($con);
                            if(empty($con)){
                                continue;
                            }

                            $title = $con[1][0];


                            // 获得a标签的href，方便以下获得详情页面的内容
                            preg_match_all('/<a[^>]*href=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im', $val, $hrefList);
                            if($hrefList){
                                $url = $hrefList[1][0];
                                $contentArr = Helper_Collect::getContent($url, "/<div class=\"yjl_fx168_article_zhengwen\".*?>.+?<\/div>/ism");
                                $contentArr = Helper_Collect::filterDiv($contentArr);
                                if(!empty($contentArr[0][0])){
                                    $content = $contentArr[0][0];
                                    // 替换图片链接
                                    $conImg = Helper_Collect::getImgUrl($content);
                                    if($conImg && isset($conImg[1])){
                                        $tmp = explode('/', $url);
                                        unset($tmp[count($tmp) - 1]);
                                        $url = implode('/', $tmp);
                                        foreach($conImg[1] as $kc => $vc){
                                            $content = str_replace($vc, $url . "/" . $vc, $content);
                                        }

                                        $content = str_replace('./', '', $content);
                                    }
                                }else{
                                    $content = $title;
                                }
                            }else{
                                $content = $title;
                            }

//                            $content = $title;
                            $data = array(
                                'nc_type' => $tid,
                                'n_type' => 1,
                                'nc_id' => $pid,
                                'n_cover' => $imgs ? $imgs[1][0] : '',
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
                                // 更新
//                                NewsModel::getInstance()->saveData($data, $res['n_id']);
                            }else{
                                NewsModel::getInstance()->saveData($data);
                            }
                        }

                        Helper_Json::formJson('采集成功', 'y');
                        break;
                    case 16: // 贵金属
                        $leftArr = Helper_Collect::getContent("http://24k99.fx168.com/top/", "/<div class=\"left\".*?>.*?<\/div>/ism");
                        $rightNameArr = Helper_Collect::getContent("http://24k99.fx168.com/top/", "/<div class=\"rightName\".*?>.*?<\/div>/ism");
                        $rightTimeArr = Helper_Collect::getContent("http://24k99.fx168.com/top/", "/<div class=\"rightTime\".*?>.*?<\/div>/ism");
                        $rightNameArr[0] = array_reverse($rightNameArr[0]);
                        $rightTimeArr[0] = array_reverse($rightTimeArr[0]);
                        $leftArr[0] = array_reverse($leftArr[0]);
                        foreach($rightNameArr[0] as $key => $val){
                            // 获得图片url
                            $imgContent = $leftArr[0][$key];
                            $imgs = Helper_Collect::getImgUrl($imgContent);
                            // 获得标题
                            $rightContent = $rightNameArr[0][$key];
                            $timeContent = $rightTimeArr[0][$key];

                            // 获得时间
                            $pattern = "/<span.*?>.*?<\/span>/ism";// 正则
                            $dayList = Helper_Collect::getContentByReg($timeContent, $pattern);
                            $day = $dayList[0][0];
                            $day = str_replace('<span>', '', $day);
                            $day = str_replace('</span>', '', $day);
                            $con = Helper_Collect::getAContent($rightContent);
                            $con = Helper_Collect::filterDiv($con);
                            $title = $con[1][0];
                            preg_match_all('/<a[^>]*href=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im', $rightContent, $hrefList);
                            if($hrefList){
                                $url = $hrefList[1][0];
                                $contentArr = Helper_Collect::getContent($url, "/<div class=TRS_Editor.*?>.+?<\/div>/ism");
                                $contentArr = Helper_Collect::filterDiv($contentArr);
                                if(!isset($contentArr[0][0])){
                                    continue;
                                }

                                $content = $contentArr[0][0];
                                // 替换图片链接
                                $conImg = Helper_Collect::getImgUrl($content);
                                if($conImg && isset($conImg[1])){
                                    $tmp = explode('/', $url);
                                    unset($tmp[count($tmp) - 1]);
                                    $url = implode('/', $tmp);
                                    foreach($conImg[1] as $kc => $vc){
                                        $content = str_replace($vc, $url . "/" . $vc, $content);
                                    }

                                    $content = str_replace('./', '', $content);
                                }
                            }else{
                                $content = $title;
                            }

//
//                            $content = $title;
                            $data = array(
                                'nc_type' => $tid,
                                'n_type' => 1,
                                'nc_id' => $pid,
                                'n_cover' => $imgs ? $imgs[1][0] : '',
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
                    case 17:
                        // 原油
                        try{
                            $leftArr = Helper_Collect::getContent("http://oil.fx168.com/top/", "/<div class=\"left\".*?>.*?<\/div>/ism");
                            $rightNameArr = Helper_Collect::getContent("http://oil.fx168.com/top/", "/<div class=\"rightName\".*?>.*?<\/div>/ism");
                            $leftArr[0] = array_reverse($leftArr[0]);
                            $rightNameArr[0] = array_reverse($rightNameArr[0]);
                            foreach($rightNameArr[0] as $key => $val){
                                // 获得图片url
                                if(!isset($leftArr[0][$key])){
                                    continue;
                                }

                                $imgContent = $leftArr[0][$key];
                                $imgs = Helper_Collect::getImgUrl($imgContent);
                                // 获得标题
                                $rightContent = $rightNameArr[0][$key];
                                $con = Helper_Collect::getAContent($rightContent);
                                $con = Helper_Collect::filterDiv($con);
                                $title = $con[1][0];
                                preg_match_all('/<a[^>]*href=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im', $rightContent, $hrefList);
                                if($hrefList){
                                    $url = $hrefList[1][0];
                                    $contentArr = Helper_Collect::getContent($url, "/<div class=TRS_Editor.*?>.+?<\/div>/ism");
                                    $contentArr = Helper_Collect::filterDiv($contentArr);
                                    if(!isset($contentArr[0][0])){
                                        continue;
                                    }

                                    $content = $contentArr[0][0];
                                    // 替换图片链接
                                    $conImg = Helper_Collect::getImgUrl($content);
                                    if($conImg && isset($conImg[1])){
                                        $tmp = explode('/', $url);
                                        unset($tmp[count($tmp) - 1]);
                                        $url = implode('/', $tmp);
                                        foreach($conImg[1] as $kc => $vc){
                                            $content = str_replace($vc, $url . "/" . $vc, $content);
                                        }

                                        $content = str_replace('./', '', $content);
                                    }
                                }else{
                                    $content = $title;
                                }

//                                $content = $title;
                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => isset($imgs[1][0]) ? $imgs[1][0] : '',
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
//                                    NewsModel::getInstance()->saveData($data, $res['n_id']);
                                }else{
                                    NewsModel::getInstance()->saveData($data);
                                }
                            }

                            Helper_Json::formJson('采集成功', 'y');
                        }catch (Exception $e){
                            Helper_Json::formJson($e->getMessage(), 'y');
                        }

                        break;
                    case 18:
                        // 专家解读
                        $imgArr = Helper_Collect::getContent("http://news.jin10.com/", "/<div class=\"timg col-sm-3 \".*?>.*?<\/div>/ism");
                        $titleArr = Helper_Collect::getContent("http://news.jin10.com/", "/<h4>.*?<\/h4>/ism");
                        if($titleArr && $titleArr[0]){
                            $titleArr[0] = array_reverse($titleArr[0]);
                            $imgArr[0] = array_reverse($imgArr[0]);
                            foreach($titleArr[0] as $key => $val){
                                // 获得a标签里面的内容
                                $con = Helper_Collect::getAContent($val);// 匹配a标签里面的内容
                                $con = Helper_Collect::filterDiv($con);
                                $title = $con[1][0];
                                $hrefList = Helper_Collect::getAHref($val);
                                if($hrefList){
                                    $url = $hrefList[1][0];
                                    $contentArr = Helper_Collect::getContent("http://news.jin10.com" . $url, '/<div id="content-detail".*?>.+?<\/div>/ism');
                                    $contentArr = Helper_Collect::filterDiv($contentArr);
                                    if(!isset($contentArr[0][0])){
                                        continue;
                                    }

                                    $content = $contentArr[0][0];
                                }else{
                                    $content = $title;
                                }

                                $imgs = Helper_Collect::getImgUrl($imgArr[0][$key]);
                                $data = array(
                                    'nc_type' => $tid,
                                    'n_type' => 1,
                                    'nc_id' => $pid,
                                    'n_cover' => isset($imgs[1][0]) ? $imgs[1][0] : '',
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