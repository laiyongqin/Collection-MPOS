<?php

/**
 * 特色服务
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class ServiceController extends BaseController {

    public function init() {
        parent::init();
    }

    public function indexAction() {

        $this->initPageTitle('特色服务');
        $id = 1;//特色文章id
        $data = FeatureModel::getInstance()->getInfo($id);

        $this->getView()->assign(array(
            'data'=>$data
        ));
    }
}