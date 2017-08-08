<?php /* Smarty version 3.1.27, created on 2016-07-07 11:24:41
         compiled from "/mnt/www/manage.huibao.com/application/views/default/newscategory/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:1512438180577dcb79e86aa6_07702892%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9525f4259782703a9e4aa51578130895c3becdf0' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/newscategory/form.html',
      1 => 1467861825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1512438180577dcb79e86aa6_07702892',
  'variables' => 
  array (
    'id' => 0,
    'nc_id' => 0,
    'typeOption' => 0,
    'categoryOption' => 0,
    'nc_name' => 0,
    'nc_alias' => 0,
    'nc_sort' => 0,
    'statusOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577dcb79ed9ef1_34539589',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577dcb79ed9ef1_34539589')) {
function content_577dcb79ed9ef1_34539589 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1512438180577dcb79e86aa6_07702892';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['id']->value) {?>修改分类<?php } else { ?>添加分类<?php }?></h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['nc_id']->value;?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">类型</label>
                <div class="col-sm-6">
                    <select name="nc_type" id="nc_type" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['typeOption']->value;?>

                    </select>
                </div>
                <label style="color:red;"></label>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">上级分类</label>
                <div class="col-sm-6">
                    <select name="nc_parent_id" id="nc_parent_id" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>

                    </select>
                </div>
                <label style="color:red;"></label>
                <span class="help-inline"></span>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">分类名称</label>
                <div class="col-sm-6">
                    <input type="text" name="nc_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nc_name']->value;?>
" placeholder="分类名称" datatype="*" nullmsg="请填写分类名称" />
                </div>
                <label style="color:red;">*</label>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">别名</label>
                <div class="col-sm-6">
                    <input type="text" name="nc_alias" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nc_alias']->value;?>
" placeholder="分类别名" datatype="*" nullmsg="请填写分类别名" />
                </div>
                <label style="color:red;">*</label>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="text" name="nc_sort" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nc_sort']->value;?>
" placeholder="排序" datatype="*" nullmsg="请填写排序" />
                </div>
                <label style="color:red;">*</label>
                <span class="help-inline"></span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                    <select name="nc_status" id="nc_status" datatype="*" nullmsg="请选择状态" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                    </select>
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
</div>
<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $('#nc_type').bind('change', function(){
            var tid = $(this).val();
            $.post('/newscategory/getType', {tid,tid}, function(data){
                if(data.code == 1){
                    $('#nc_parent_id').html(data.data);
                }
            }, 'json')
        })
    })
<?php echo '</script'; ?>
><?php }
}
?>