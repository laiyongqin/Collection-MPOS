<?php /* Smarty version 3.1.27, created on 2016-07-11 14:12:05
         compiled from "/mnt/www/manage.huibao.com/application/views/default/tradetype/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:1860141092578338b556d821_25682453%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca7553a0745dfa934405cb4d2448c63624e12e68' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/tradetype/form.html',
      1 => 1468199356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1860141092578338b556d821_25682453',
  'variables' => 
  array (
    'row' => 0,
    'statusOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578338b55fa5f9_92133449',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578338b55fa5f9_92133449')) {
function content_578338b55fa5f9_92133449 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1860141092578338b556d821_25682453';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['row']->value['tt_id']) {?>修改类型<?php } else { ?>添加类型<?php }?></h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tt_id'];?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">类型名称</label>
                <div class="col-sm-6">
                    <input type="text" name="tt_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tt_name'];?>
" placeholder="分类名称" datatype="*" nullmsg="请填写分类名称" />
                </div>
                <label style="color:red;">*</label>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                    <select name="tt_status" id="tt_status" datatype="*" nullmsg="请选择状态" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                    </select>
                </div>
                <label style="color:red;">*</label>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="text" name="tt_sort" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tt_sort'];?>
" placeholder="排序" datatype="n" nullmsg="请填写排序" />
                </div>
                <label style="color:red;">*</label>
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