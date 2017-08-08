<?php

/**
 * 下载专区
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class DownloadController extends BaseController {

    public function init() {
        parent::init();
    }

    public function indexAction() {

        //banner数据
        $where  = array('alias'=>'recommend_sofe');
        $banner = BannerModel::getInstance()->getList($where,array('limit'=>1));

        //软件数据
        $sofe = SofeModel::getInstance()->getList();

        $this->initPageTitle('下载专区');
        $this->getView()->assign(array(
            'banner' =>$banner,
            'sofe' =>$sofe
        ));
    }
}