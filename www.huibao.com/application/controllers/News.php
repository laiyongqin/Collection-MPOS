<?php

/**
 * 新闻详情
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class NewsController extends BaseController {

    protected function init() {
        parent::init();
    }

    public function detailsAction() {

        $ncid   = isset($_GET['nc_id']) ? intval($_GET['nc_id']) : 0;

        $this->initPageTitle('新闻详情');

        $id = intval($_GET['id']);

        $data = NewsModel::getInstance()->getInfo($id);

        $cateInfo = NewscategoryModel::getInstance()->getInfo($data['nc_id']);
        $data['n_addtime'] = date('Y-m-d',strtotime($data['n_addtime']));
        $data['n_title'] = Helper_Filter::cutString($data['n_title'], 80);

        // 获得上一篇
        $beforeInfo = NewsModel::getInstance()->getBeforeInfo($id);
        $beforeInfo['n_title'] = Helper_Filter::cutString($beforeInfo['n_title'], 35);
        $nextInfo = NewsModel::getInstance()->getNextInfo($id);
        $nextInfo['n_title'] = Helper_Filter::cutString($nextInfo['n_title'], 35);

        $this->getView()->assign('beforeInfo', $beforeInfo);
        $this->getView()->assign('nextInfo', $nextInfo);
        $this->getView()->assign('data', $data);
        $this->getView()->assign('id', $id);
        $this->getView()->assign('ncid', $ncid);
        $this->getView()->assign('cateInfo', $cateInfo);
    }
}