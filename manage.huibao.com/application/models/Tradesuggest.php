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
     * 获取列表
     *
     * @param array $where
     * @param array $pagination
     * @return bool
     */
    public function getList($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
                    ->_setPaginationSQL($pagination)
                    ->_db->select($this->_field)
                    ->from($this->_table)
                    ->order($this->_primary_key, 'DESC')
                    ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
    }

    /**
     * 统计数量
     *
     * @param array $where
     */
    public function countData($where=array()) {
        return $this->_setWhereSQL($where)->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }


    /**
     * @param $id
     */
    public function getInfo($id) {
        return $this->_db->select($this->_field)->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    /**
     * 保存数据
     *
     * @param array $data
     * @param int   $id
     * @return mixed
     */
    public function saveData($data, $id=0) {
        if($id){
            return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
        }else{
            //判断是否已经存在该类型
            $count = $this->_db->select('COUNT(*)')->from($this->_table)->where('tt_id', $data['tt_id'])->fetchValue();
            if($count > 0) {
                return false;
            }
            return $this->_db->insert($this->_table)->rows($data)->execute();
        }
    }


    /**
     * SQL分页查询
     */
    private function _setPaginationSQL( $pagination = array() ) {
        if ( isset($pagination['page']) AND isset($pagination['pagesize']) ) {
            $page      = isset( $pagination['page'] ) ? intval($pagination['page']) : 1;
            $pagesize  = isset( $pagination['pagesize']  ) ? intval($pagination['pagesize'])  : 10;
            $this->_db->page($page, $pagesize);
        } elseif ( isset($pagination['limit']) ) {
            $this->_db->limit( intval($pagination['limit']) );
        }
        return $this;
    }

    /**
     * SQL Where条件
     * @param array $where
     * @return $this
     */
    private function _setWhereSQL ($where = array()) {
        if(isset($where['type']) && $where['type']){
            $this->_db->where('tt_id', $where['type']);
        }

        return $this;
    }

}