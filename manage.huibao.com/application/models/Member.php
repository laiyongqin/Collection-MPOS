<?php

/**
 * 用户管理
 *
 * @author: lindexin
 * @since : 2016/1/29 10:36
 */

class MemberModel extends BaseModel {

    public function __construct()
    {
        parent::__construct('www', 't_member', 'm_id');
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
                    ->_db->select('m_id,m_username,m_realname,m_password,m_status,m_addtime')
                    ->from($this->_table)
                    ->order($this->_primary_key, 'ASC')
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
     * 改变状态
     *
     * @param $id
     * @param array $data 修改数据
     * @return mixed
     */
    public function changeData($id, $data) {
        return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
    }

    /**
     * 修改密码
     *
     * @param $id
     * @param $password
     * @return mixed
     */
    public function editPassword($id, $password) {
        return $this->_db->update($this->_table)->set('m_password', $password)->where($this->_primary_key, $id)->execute();
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
        if (isset($where['id']) AND $where['id']) {
            $this->_db->where("m_id", $where['id']);
        }

        if (isset($where['username']) AND $where['username']) {
            $this->_db->where('m_realname',$where['username']);
        }

        if (isset($where['status']) AND $where['status']) {
            $this->_db->where('m_status',$where['status']);
        }

        return $this;
    }

    /**
     * 保存数据
     *
     * @param array $data
     * @param int   $id
     * @return mixed
     */
    public function saveData($data, $id=0) {
        $data['m_username'] = Helper_Filter::format($data['m_username'], true);

        if ( $id > 0 ) {

            if($this->isExistData(array('username'=>$data['m_username'], 'm_id'=>$id)) ) {
                return $this->result(101, '登录用户名已经存在');
            }
            $result = $this->_db->update($this->_table)->rows( $data )->where($this->_primary_key, $id)->execute();
        } else {
//            if($this->isExistData(array('phone'=>$data['a_phone'])) ) {
//                return $this->result(100, '手机号码已经存在');
//            }

            if($this->isExistData(array('username'=>$data['m_username'])) ) {
                return $this->result(101, '登录用户名已经存在');
            }

            $data['m_password'] = Helper_Secret::encode($data['m_password']);
            $data['m_addtime']  = date('Y-m-d H:i:s');
            $result = $this->_db->insert($this->_table)->rows( $data )->execute();
        }

        if($result) {
            return $this->result(1, '操作成功');
        } else {
            return $this->result(102, '没有修改');
        }
    }

    /**
     * @param $id
     */
    public function getInfo($id) {
        return $this->_db->select('m_id,m_username,m_realname,m_password,m_status,m_addtime')->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    /**
     * 是否存在用户
     *
     * @param $username
     * @return mixed
     */
    private function isExistData($where) {
        return $this->_setWhereSQL($where)->_db->select($this->_primary_key)->from($this->_table)->fetchValue();
    }

}