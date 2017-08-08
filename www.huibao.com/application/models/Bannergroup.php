<?php

/**
 * 广告组管理
 *
 * @author: lindexin
 * @since : 2016/07/25
 */

class BannergroupModel extends BaseModel {

    public $_field = 'ag_id,ag_name,ag_cname,a_ids,ag_addtime';
    public function __construct()
    {
        parent::__construct('www', 't_ad_group', 'ag_id');
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
                    ->order('ag_id', 'ASC')
                    ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
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
        if(isset($where['ag_cname']) && $where['ag_cname']){
            $this->_db->where('ag_cname', $where['ag_cname']);
        }

        return $this;
    }


}