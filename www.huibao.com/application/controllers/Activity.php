<?php

/**
 * 活动专区
 *
 * @author: moxiaobai
 * @since : 2016/7/22 11:11
 */

class ActivityController extends BaseController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->initPageTitle('活动专区');

        $adList = AdModel::getInstance()->getAdGroupByName('active');
        $this->getView()->assign('adList', $adList);
    }
}