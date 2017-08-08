<?php

/**
 * 首页
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class IndexController extends BaseController {

    public function init() {
        parent::init();
    }

    public function indexAction() {

        $this->initPageTitle('首页');
        $this->getView()->assign(array(
        ));
    }
}