<?php

/**
 * 新闻列表管理
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class NewsModel extends BaseModel {

    public $_field = 'n_id,nc_id, n_source ,n_editor,n_title,n_cover,n_content,n_sort,n_status,n_addtime,nc_type,n_type,n_des';
    public function __construct()
    {
        parent::__construct('www', 't_news', 'n_id');
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
                    ->order('n_sort', 'ASC')
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
     * @param $id
     */
    public function getCidInfo($ncid) {
        return $this->_db->select($this->_field)->from($this->_table)->where('nc_id', $ncid)->order('n_sort','ASC')->fetchOne();
    }

    public function getInfoByTitle($title) {
        return $this->_db->select($this->_field)->from($this->_table)->where('n_title', $title)->fetchOne();
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

        $this->_db->where('n_status', 1);

        if(isset($where['pid']) && $where['pid']){
            $this->_db->where('nc_id', $where['pid']);
        }
        if(isset($where['tid'])){
            $this->_db->where('nc_type', $where['tid']);
        }

        if(isset($where['ntid']) && $where['ntid']){
            $this->_db->where('n_type', $where['ntid']);
        }

        if(isset($where['title']) && $where['title']){
            $this->_db->where("n_title like '%{$where['title']}%'");
        }

        if(isset($where['cateID']) && $where['cateID']){
            $this->_db->where('nc_id in(' . implode(',', $where['cateID']) . ')');
        }

        return $this;
    }

    public function getBeforeInfo($id = 0){
        $info = $this->_db->select($this->_field)->from($this->_table)->where('n_id<' . $id)->limit(1)->order('n_id', 'DESC')->fetchOne();
        return $info;
    }


    public function getNextInfo($id = 0){
        $info = $this->_db->select($this->_field)->from($this->_table)->where('n_id>' . $id)->limit(1)->order('n_id', 'ASC')->fetchOne();
        return $info;
    }

}