<?php

/**
 * 交易建议管理
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class TradesuggestModel extends BaseModel {

    public $_field = 'ts_id,tt_id,ts_cover ,ts_target,ts_loss,ts_purchase';
    public function __construct()
    {
        parent::__construct('www', 't_trade_suggest', 'ts_id');
    }

    /**
     * 整合公司信息
     *
     * @param $data
     * @return mixed
     */
    public function mergData($data) {
        if ( ! is_array( $data ) )
            return $data;

        $ids = Helper_Array::setIds($data, 'tt_id', TRUE);
        if ( ! $ids) {return $data;}

        //公司信息
        $info = $this->_db->select('ts_id,tt_id,ts_cover ,ts_target,ts_loss,ts_purchase')->from($this->_table)->where("tt_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'tt_id');
        foreach ( $data AS &$row ) {
            $row['ts_cover']   = isset($info[ $row['tt_id'] ]) ? $info[ $row['tt_id'] ]['ts_cover'] : '';
            $row['ts_target']   = isset($info[ $row['tt_id'] ]) ? $info[ $row['tt_id'] ]['ts_target'] : '';
            $row['ts_loss']   = isset($info[ $row['tt_id'] ]) ? $info[ $row['tt_id'] ]['ts_loss'] : '';
            $row['ts_purchase']   = isset($info[ $row['tt_id'] ]) ? $info[ $row['tt_id'] ]['ts_purchase'] : '';
        }
        return $data;
    }

}