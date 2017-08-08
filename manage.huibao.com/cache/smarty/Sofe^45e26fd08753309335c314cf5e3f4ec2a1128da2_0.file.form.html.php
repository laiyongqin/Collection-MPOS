<?php /* Smarty version 3.1.27, created on 2016-07-11 14:11:44
         compiled from "/mnt/www/manage.huibao.com/application/views/default/sofe/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:412596003578338a0cf4280_48324726%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45e26fd08753309335c314cf5e3f4ec2a1128da2' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/sofe/form.html',
      1 => 1468217502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '412596003578338a0cf4280_48324726',
  'variables' => 
  array (
    'row' => 0,
    'recommendOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578338a0d5be77_80557405',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578338a0d5be77_80557405')) {
function content_578338a0d5be77_80557405 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '412596003578338a0cf4280_48324726';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="/sofe/index">特色服务 </a></li>
            <li class="active">软件详情</li>
        </ol>

        <div class="right_con">

            <form class="form-horizontal" id="form-save" action="/sofe/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['s_id'];?>
" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="s_name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['s_name'];?>
" placeholder="标题" datatype="*" nullmsg="请填写标题" style="width: 400px;"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">下载链接</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="s_download_link" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['s_download_link'];?>
" placeholder="下载链接" datatype="url" nullmsg="请填写下载链接" style="width: 398px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">封面图</label>
                        <div class="col-sm-4">
                            <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload();" />
                            <div style="padding-top:10px;"><img src="<?php if ($_smarty_tpl->tpl_vars['row']->value['s_cover']) {
echo @constant('APP_IMAGE_URL');
echo $_smarty_tpl->tpl_vars['row']->value['s_cover'];
}?>" id="upload-img" style="max-width:200px;<?php if (!$_smarty_tpl->tpl_vars['row']->value['s_cover']) {?>display:none;<?php }?>"/></div>
                            <input type="hidden" name="s_cover" id="file" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['s_cover'];?>
"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">推荐状态</label>
                        <div class="col-sm-4">
                            <select name="s_recommend" datatype="*" null="请选择状态" class="form-control" style="width:200px;">
                                <?php echo $_smarty_tpl->tpl_vars['recommendOption']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序</label>
                        <div class="col-sm-4">
                            <input type="text" style="width:100px;" class="form-control" name="s_sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['s_sort'];?>
" placeholder="排序" datatype="n" nullmsg="请填写排序" />
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
    </div>
    <div class="clear"></div>
</div>
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
            url:'/sofe/upload/',
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

    $(document).ready(function(){
        $('#nc_type').bind('change', function(){
            var tid = $(this).val();
            $.post('/newscategory/getType', {tid,tid}, function(data){
                if(data.code == 1){
                    $('#nc_id').html(data.data);
                }
            }, 'json')
        })
    })
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>