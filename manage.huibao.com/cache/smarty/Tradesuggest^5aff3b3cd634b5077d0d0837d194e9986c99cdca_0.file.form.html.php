<?php /* Smarty version 3.1.27, created on 2016-07-13 15:20:20
         compiled from "/mnt/www/manage.huibao.com/application/views/default/tradesuggest/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:8715045505785ebb40207e2_54371830%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aff3b3cd634b5077d0d0837d194e9986c99cdca' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/tradesuggest/form.html',
      1 => 1468393144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8715045505785ebb40207e2_54371830',
  'variables' => 
  array (
    'row' => 0,
    'typeOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5785ebb407b322_72826831',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5785ebb407b322_72826831')) {
function content_5785ebb407b322_72826831 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8715045505785ebb40207e2_54371830';
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="passportModalLabel"><?php if ($_smarty_tpl->tpl_vars['row']->value['ts_id']) {?>修改建议<?php } else { ?>添加建议<?php }?></h4>
        </div>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ts_id'];?>
" />
        <div class="modal-body">
            <div class="alert alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong></strong>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">分类</label>
                <div class="col-sm-6">
                    <select name="tt_id" id="tt_id" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['typeOption']->value;?>

                    </select>
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">封面</label>
                <div class="col-sm-4">
                    <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload();" />
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['ts_cover']) {?>
                    <div style="padding-top:10px;"><img src="<?php echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['row']->value['ts_cover'];?>
" id="upload-img" style="max-width:200px;"/></div>
                    <input type="hidden" name="ts_cover" id="file"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ts_cover'];?>
" datatype="*" nullmsg="请上传封面"/>
                    <?php } else { ?>
                    <input type="hidden" name="ts_cover" id="file" datatype="*" nullmsg="请上传封面" />
                    <div style="padding-top:10px;"><img src="" id="upload-img" style="max-width:200px; display:none"/></div>
                    <?php }?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">目标金额</label>
                <div class="col-sm-6">
                    <input type="text" name="ts_target" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ts_target'];?>
" placeholder="目标金额" datatype="*" nullmsg="请填写目标金额" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">止损金额</label>
                <div class="col-sm-6">
                    <input type="text" name="ts_loss" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ts_loss'];?>
" placeholder="止损金额" datatype="*" nullmsg="请填写止损金额" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">买入金额</label>
                <div class="col-sm-6">
                    <input type="text" name="ts_purchase" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ts_purchase'];?>
" placeholder="买入金额" datatype="*" nullmsg="请填写买入金额" />
                </div>
                <span class="help-inline" style="color:red;">*</span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary btn-submit">确认修改</button>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="/public/js/jquery.ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

    $(function(){
        $("#upload").customFileInput();
    });

    var processing = false;
    function ajaxFileUpload() {
        if ( processing == true ) {
            return false;
        }

        var dialog = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/tradesuggest/upload/',
            secureuri:false,
            fileElementId:'upload',
            dataType: 'json',
            success: function (data, status){
                setTimeout( function() {
                    processing = false;
                }, 500);
                dialog.close();

                if ( data.status == 'y' ) {
                    $("#upload-img").attr('src', data.info.url).show();
                    $('#file').val(data.info.fileName);
                    return;
                }

                $.dialog.error(data.info);
                return false;
            },
            error: function (data, status, e){
                $.dialog.error(e);
            }
        });
    }
<?php echo '</script'; ?>
><?php }
}
?>