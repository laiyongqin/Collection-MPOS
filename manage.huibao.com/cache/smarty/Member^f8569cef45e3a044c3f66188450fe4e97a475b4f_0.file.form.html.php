<?php /* Smarty version 3.1.27, created on 2016-07-11 14:59:54
         compiled from "/mnt/www/manage.huibao.com/application/views/default/member/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:841522357578343ea077d05_08972971%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8569cef45e3a044c3f66188450fe4e97a475b4f' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/member/form.html',
      1 => 1468220391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '841522357578343ea077d05_08972971',
  'variables' => 
  array (
    'id' => 0,
    'username' => 0,
    'statusOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578343ea0cb874_55582910',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578343ea0cb874_55582910')) {
function content_578343ea0cb874_55582910 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '841522357578343ea077d05_08972971';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['id']->value) {?>修改用户<?php } else { ?>添加用户<?php }?></h4>
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
                    <input type="text" name="m_username" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" placeholder="用户名" datatype="*" nullmsg="请填写用户名"  />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-6">
                    <input type="password" name="m_password" class="form-control" value="" placeholder="登录密码" datatype="*6-18" nullmsg="请填写密码" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <?php }?>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-4">
                    <select name="m_status" datatype="*" null="请选择状态" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                    </select>
                </div>
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