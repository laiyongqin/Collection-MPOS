<?php /* Smarty version 3.1.27, created on 2016-07-06 10:07:30
         compiled from "/mnt/www/manage.huibao.com/application/views/default/admin/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:1459538729577c67e2b52680_40653808%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa366a55a1ff3d11c35b9b564d35fb906ee80b84' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/admin/form.html',
      1 => 1467768890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1459538729577c67e2b52680_40653808',
  'variables' => 
  array (
    'id' => 0,
    'username' => 0,
    'realname' => 0,
    'phone' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577c67e2ba2c01_30227309',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577c67e2ba2c01_30227309')) {
function content_577c67e2ba2c01_30227309 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1459538729577c67e2b52680_40653808';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['id']->value) {?>修改管理员<?php } else { ?>添加管理员<?php }?></h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-6">
                    <input type="text" name="a_username" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" placeholder="用户名" datatype="s6-18" nullmsg="请填写用户名"  />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
            <div class="form-group">
                <label class="col-sm-2 control-label">登录密码</label>
                <div class="col-sm-6">
                    <input type="password" name="a_password" class="form-control" value="" placeholder="登录密码" datatype="*6-18" nullmsg="请填写登录密码" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <?php }?>
            <div class="form-group">
                <label class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-6">
                    <input type="text" name="a_realname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['realname']->value;?>
" placeholder="真实姓名" datatype="*" nullmsg="请填写真实姓名" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-6">
                    <input type="text" name="a_phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" placeholder="联系电话" datatype="m" nullmsg="请填写联系电话" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary btn-submit">确认修改</button>
        </div>
    </div>
</div><?php }
}
?>