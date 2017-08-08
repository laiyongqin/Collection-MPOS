<?php

/**
 * 登陆
 *
 * @author: lindexin
 * @since : 2016/07/12
 */

class AdminModel extends BaseModel {

    public function __construct()
    {
        parent::__construct('www', 't_member', 'm_id');
    }

    /**
     * 用户登录
     *
     * @param $username
     * @param $password
     * @return miexd
     */
    public function login($username, $password) {
        if(Helper_Check::isEmptyString($username)) {
            return $this->result(101, '用户名不能为空');
        }

        if(Helper_Check::isEmptyString($password)) {
            return $this->result(102, '密码不能为空');
        }

        //用户是否存在
        if(! $this->isExistData(array('username'=>$username))) {
            return $this->result(103, '用户名不存在');
        }

        $password = Helper_Secret::encode($password);
        $where    = array('username'=>$username, 'password'=>$password);
        $rows     = $this->_setWhereSQL($where)
                            ->_db->select('m_id,m_username,m_password,m_status,m_addtime')
                            ->from($this->_table)
                            ->fetchOne();

        if(!$rows) {
            return $this->result(104, '密码错误');
        } else {
            if($rows['m_status'] == 2) {
                return $this->result(105, '帐号被禁用');
            }


            Yaf_Session::getInstance()->set('userInfo', $rows);


            return $this->result(1, '登录成功');
        }
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
            $this->_db->where("m_username",$where['username']);
        }

        if (isset($where['password']) AND $where['password']) {
            $this->_db->where("m_password", $where['password']);
        }

        return $this;
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