<?php /* Smarty version 3.1.27, created on 2016-07-11 10:45:57
         compiled from "/mnt/www/manage.huibao.com/application/views/default/member/formpassword.html" */ ?>
<?php
/*%%SmartyHeaderCode:466943488578308658dff98_89790683%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83dadcfcbe2fa73934ffb9a1db53eb308967cf31' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/member/formpassword.html',
      1 => 1468205047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '466943488578308658dff98_89790683',
  'variables' => 
  array (
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578308659232e3_79091160',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578308659232e3_79091160')) {
function content_578308659232e3_79091160 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '466943488578308658dff98_89790683';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel">修改密码</h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
            <div class="form-group">
                <label class="col-sm-2 control-label">用户密码</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" value="" placeholder="登录密码" datatype="*6-18" nullmsg="请填写登录密码" />
                </div>
                <span class="help-inline"></span>
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