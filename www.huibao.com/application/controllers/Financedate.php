<?php

/**
 * 财经日历
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class FinancedateController extends BaseController {
    private $_weekList = array(
        '周一','周二','周三','周四','周五','周六','周天',
    );

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->initPageTitle('财经日历');
        $day = isset($_GET['day']) ? Helper_Filter::format($_GET['day']) : date('Y-m-d');
        $id   = isset($_GET['id']) ? intval($_GET['id']) : 0;

        $week = date('w', strtotime($day));
        $minus = $week > 0 ? $week - 1 : 6;
        // 获得周一
        $weekOne = date('Y-m-d', strtotime("-{$minus} day", strtotime($day)));
        // 遍历获得周一到周天
        $list = array();
        for($i = 0; $i < 7; $i++){
            if($i == 0){
                $today = $weekOne;
            }else{
                $today = date('Y-m-d', strtotime("+{$i} days", strtotime($weekOne)));
            }

            $show = date('m/d', strtotime($today));
            $list[] = array(
                'tip' => $this->_weekList[$i],
                'day' => $today,
                'show' => $show
            );
        }

        // 获得上周周一
        $lastWeekOne = date('Y-m-d', strtotime('-7 days', strtotime($weekOne)));
        // 获得下周周一
        $nextWeekOne = date('Y-m-d', strtotime('+7 days', strtotime($weekOne)));
        // 获得日历详情
        $calendarInfo = CalendarModel::getInstance()->getInfoByDay($day);

        $this->getView()->assign(array(
            'list' => $list,
            'today' => $day,
            'id' => $id,
            'lastWeekOne' => $lastWeekOne,
            'nextWeekOne' => $nextWeekOne,
            'calendarInfo' => $calendarInfo,
        ));
    }
}