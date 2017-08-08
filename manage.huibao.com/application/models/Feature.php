<?php

/**
 * 特色文章管理
 *
 * @author: lindexin
 * @since : 2016/07/13
 */

class FeatureModel extends BaseModel {

    public $_field = 'f_id,f_title,f_content,f_status,f_addtime,f_desc';
    public function __construct()
    {
        parent::__construct('www', 't_feature', 'f_id');
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
            return $this->_db->insert($this->_table)->rows($data)->execute();
        }
    }

}