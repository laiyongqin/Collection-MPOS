<?php

/**
 * 分类管理
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class NewscategoryModel extends BaseModel {

    public $_field = 'nc_id, nc_parent_id ,nc_alias,nc_name,nc_sort,nc_status,nc_addtime,nc_type';
    public function __construct()
    {
        parent::__construct('www', 't_news_category', 'nc_id');
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
                    ->order('nc_sort', 'ASC')
                    ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
    }

    public function getListArr(){
        $arr = array();
        $res = $this->getList();
        if($res){
            foreach($res as $val){
                $arr[$val['nc_id']] = $val['nc_name'];
            }
        }
        return $arr;
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
     * 通过父分类获得所有子类
     *
     * @param string $p_id
     * @param array $data
     * @return array
     */
    public function getListByPid($t_id = 0,$p_id = 0,&$data = array()){
        $where = array(
            'pid' => $p_id,
            'tid' => $t_id,

        );

        $categoryList = $this->getList($where);
        if($categoryList){
            foreach($categoryList as $val){
                $data[$val['nc_id']] = $val['nc_name'];
                $this->getListByPid($val['nc_type'],$val['nc_id'], $data);
            }
        }
        return $data;
    }

    /**
     * 获得分类
     *
     * @param int $p_id
     * @param string $lang
     * @return array
     */

    public function getCateTree($t_id,$p_id = 0){
        $where = array(
            'pid' => $p_id,
            'tid' => $t_id,
            'status' => 1
        );

        if($p_id){
            $cateInfo = $this->getInfo($p_id);
        }else{
            $cateInfo = array();
        }

        if($cateInfo){
            $cateInfo = array('nc_id' => $cateInfo['nc_id'], 'nc_name' => $cateInfo['nc_name']);
        }

        $sonList = array();
        $sonArr = $this->getList($where);

        if($sonArr){
            foreach($sonArr as $val){
                $sonList[] = $this->getCateTree($val['nc_type'],$val['nc_id']);
            }
        }else{
            $data = array(
                'cateInfo' => $cateInfo,
                'sonList' => '',
            );
            return $data;
        }
        $data = array(
            'cateInfo' => $cateInfo,
            'sonList' => $sonList,
        );

        if($p_id == 0){
            return $data['sonList'];
        }else{
            return $data;
        }
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

        if(isset($where['pid']) ){
            $this->_db->where('nc_parent_id', $where['pid']);
        }

        if(isset($where['name']) && $where['name']){
            $this->_db->where("nc_name like '%{$where['name']}%'");
        }

        if(isset($where['status']) && $where['status']){
            $this->_db->where('nc_status', $where['status']);
        }

        if(isset($where['tid'])){
            $this->_db->where('nc_type', $where['tid']);
        }

        return $this;
    }

}