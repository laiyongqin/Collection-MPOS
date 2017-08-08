<?php /* Smarty version 3.1.27, created on 2016-07-11 11:22:51
         compiled from "/mnt/www/manage.huibao.com/application/views/default/index/password.html" */ ?>
<?php
/*%%SmartyHeaderCode:3252342945783110b786fa0_97270534%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ab1579b47de191d50ccf91f8173e47b6401c1f6' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/index/password.html',
      1 => 1467768890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3252342945783110b786fa0_97270534',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5783110b8049b9_03960806',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5783110b8049b9_03960806')) {
function content_5783110b8049b9_03960806 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3252342945783110b786fa0_97270534';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel">修改密码</h4>
        </div>

        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <div class="form-group" >
                <label class="col-sm-2 control-label">原密码</label>
                <div class="col-sm-6">
                    <input type="password" name="oldPassword" class="form-control"  placeholder="原密码" datatype="*6-15" nullmsg="请填写旧密码" errormsg="密码范围在6~15位之间！" />
                </div>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">新密码</label>
                <div class="col-sm-6">
                    <input type="password" name="newPassword" class="form-control"  placeholder="新密码" datatype="*6-15" nullmsg="请填写新密码" errormsg="密码范围在6~15位之间！" />
                </div>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-6">
                    <input type="password" name="confirmPassword" class="form-control"  placeholder="确认密码" datatype="*" nullmsg="请确认新密码" recheck="newPassword" errormsg="您两次输入的账号密码不一致！" />
                </div>
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary">确认修改</button>
        </div>
    </div>
</div><?php }
}
?>