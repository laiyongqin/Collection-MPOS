<?php
/**
 * 采集类
 *
 * @category Helper
 * @package  Helper_Collect
 * @author   monyyip <lancer.he@gmail.com>
 * @version  1.0 
 */
class Helper_Collect{

    /**
     * 获得网站内容
     *
     * @param $url
     * @param $pattern
     * @return mixed
     */
	public static function getContent($url, $pattern, $replace = ''){
		$conn = self::httpGet($url);// 获取页面内容
        $encode = mb_detect_encoding($conn, array("ASCII",'UTF-8',"GB2312","GBK"));
        if($encode != 'UTF-8'){
            $conn = iconv($encode, "utf-8",$conn);
        }

        if($replace){
            $conn = str_replace($replace, '', $conn);
        }

		preg_match_all($pattern, $conn, $arr);// 匹配内容到arr数组
        return $arr;
	}

    /**
     * 根据正则匹配内容
     *
     * @param $content
     * @param $pattern
     * @return mixed
     */
    public static function getContentByReg($content, $pattern){
        preg_match_all($pattern, $content, $contentArr);// 匹配内容到arr数组
        return $contentArr;
    }

    /**
     * 获得td里面的内容
     *
     * @param $data
     * @return mixed
     */
    public static function getTdContent($data){
        preg_match_all('#<td.+?>(.+?)</td>#', $data, $tds);
        return $tds;
    }

    /**
     * 获得li里面的内容
     *
     * @param $data
     * @return mixed
     */
    public static function getLiContent($data){
        $pattern = "/<li.*?>.*?<\/li>/ism";// 正则
        preg_match_all($pattern, $data, $arr);// 匹配内容到arr数组
        return $arr;
    }
    /**
     * 获得div里面的内容
     *
     * @param $data
     * @return mixed
     */
    public static function getDivContent($data){
        $pattern = '#<div.+?>(.+?)</div>#';// 正则
        preg_match_all($pattern, $data, $contents);// 匹配内容到arr数组
        return $contents;
    }

    /**
     * 获得img中的图片url
     *
     * @param $data
     * @return mixed
     */
    public static function getImgUrl($data){
        preg_match_all('/<img[^>]*src=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im', $data, $imgs);
        return $imgs;
    }

    /**
     * 获得img中的图片lazy-src
     *
     * @param $data
     * @return mixed
     */
    public static function getLazyImgUrl($data){
        preg_match_all('/<img[^>]*lazy-src=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im', $data, $imgs);
        return $imgs;
    }

    /**
     * 获得a标签里面的内容
     *
     * @param $data
     */
    public static function getAContent($data){
        preg_match_all('#<a.+?>(.+?)</a>#', $data, $con); // 匹配a标签里面的内容
        return $con;
    }

    /**
     * 获得a标签标签里面的内容
     *
     * @param $data
     */
    public static function getAHref($data){
        preg_match_all('/<a[^>]*href=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im', $data, $hrefList);
        return $hrefList;
    }


    public static function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    public static function socket($url){
        $fp = fsockopen($url, 80, $errno, $errstr, 30);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        } else {
            while (!feof($fp)) {
                echo fgets($fp, 128);
            }

            fclose($fp);
        }
    }

    /**
     * 过滤div标签
     *
     * @param array $data
     * @return array
     */
    public static function filterDiv($data = array()){
        if($data){
            foreach($data as &$val){
                if(is_array($val)){
                    foreach($val as &$v){
                        $v = preg_replace("/<div[^>]*>/i", "", $v);
                        $v = preg_replace("/<\/div>/i", "", $v);
                    }
                }else{
                    $val = preg_replace("/<div[^>]*>/i", "", $val);
                    $val = preg_replace("/<\/div>/i", "", $val);
                }
            }
        }

        return $data;
    }
}