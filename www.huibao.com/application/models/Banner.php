<?php

/**
 * 广告管理
 *
 * @author: lindexin
 * @since : 2016/07/03
 */

class BannerModel extends BaseModel {

    public $_field = 'a_id,a_title,a_alias,a_picture,a_link,a_status,a_addtime';
    public function __construct()
    {
        parent::__construct('www', 't_ad', 'a_id');
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
                    ->order('a_id', 'ASC')
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
         $this->_db->where('a_status', 1);

        if(isset($where['alias']) && $where['alias']){
            $this->_db->where('a_alias', $where['alias']);
        }

        return $this;
    }

}