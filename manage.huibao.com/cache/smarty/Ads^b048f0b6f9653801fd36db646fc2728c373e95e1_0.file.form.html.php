<?php /* Smarty version 3.1.27, created on 2016-07-18 17:33:28
         compiled from "/mnt/www/manage.huibao.com/application/views/default/ads/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:1934933196578ca26842ddf0_91518286%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b048f0b6f9653801fd36db646fc2728c373e95e1' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/ads/form.html',
      1 => 1468825774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1934933196578ca26842ddf0_91518286',
  'variables' => 
  array (
    'row' => 0,
    'statusOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578ca2684908f5_83996263',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578ca2684908f5_83996263')) {
function content_578ca2684908f5_83996263 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1934933196578ca26842ddf0_91518286';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<link href="/public/js/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<style></style>
<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="/ads/index">广告管理 </a></li>
            <li class="active">广告详情</li>
        </ol>

        <div class="right_con">
            <form class="form-horizontal" id="form-save" action="/ads/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" />
                    <div class="form-group">
                    <label class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="a_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_title'];?>
" placeholder="banner名称" datatype="*" nullmsg="请填写banner名称名称" style="width: 400px;"/>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">封面图</label>
                        <div class="col-sm-4 ">
                            <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload();" />
                            <div style="padding-top:10px;"><img src="<?php if ($_smarty_tpl->tpl_vars['row']->value['a_picture']) {
echo $_smarty_tpl->tpl_vars['row']->value['a_picture'];
}?>" id="upload-img" style="max-width:200px;<?php if (!$_smarty_tpl->tpl_vars['row']->value['n_cover']) {?>display:none;<?php }?>"/></div>
                            <input type="hidden" name="a_picture" id="file" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_picture'];?>
"  />
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['a_id'] <= 0) {?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">别名</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="a_alias" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_alias'];?>
" placeholder="别名" datatype="*" nullmsg="请填写别名" style="width: 400px;"/>
                        </div>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">链接地址</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="a_link" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_link'];?>
" placeholder="链接地址" datatype="*" nullmsg="请填写链接地址" style="width: 400px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">状态</label>
                        <div class="col-sm-4">
                            <select datatype="*"  nullmsg="请选择状态" id="a_status" name="a_status" class="form-control" style="width:200px;">
                                <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button class="btn btn-primary" type="submit">保存</button>
                    </div>
                </div>
            </form>
        </div>

        <!--&lt;!&ndash;弹窗&ndash;&gt;-->
        <!--<form class="form-horizontal" action="/ajax/productlight/save/" method="post">-->
        <!--<div class="modal fade" id="adminModal" tabindex="-1" role="dialog"></div>-->
        <!--</form>-->
    </div>
    <div class="clear"></div>
</div>
<?php echo '<script'; ?>
 src="/public/js/umeditor/umeditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/umeditor/umeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/umeditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/jquery.ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var editor =  '';

    $(function(){
        editor = UM.getEditor('n_content');
    });

    $("#form-save").Validform({
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3)
                $.dialog.tips(msg);
        },
        beforeSubmit:function(curform){
        },
        callback:function(response){
            $.dialog.tips(response.info);
            if ( response.status == 'y' ) {
                window.setTimeout(function(){
                    location.reload();
                }, 2000)
            }
        }
    });

    /*初始化上传文件*/
    $("#upload").customFileInput();
    var processing = false;
    function ajaxFileUpload() {
        if ( processing == true ) {
            return false;
        }

        var dialog     = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/news/upload/',
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
                    $('#file').val(data.info.url);
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
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>