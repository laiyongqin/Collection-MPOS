<?php /* Smarty version 3.1.27, created on 2016-08-08 15:23:20
         compiled from "/mnt/www/manage.huibao.com/application/views/default/news/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:939047157a833689fb9e7_46136863%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d5ce845f5ac3e892c61923a9d970d63c24159b0' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/news/form.html',
      1 => 1470640984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '939047157a833689fb9e7_46136863',
  'variables' => 
  array (
    'row' => 0,
    'typeOption' => 0,
    'categoryOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57a83368aa2565_54032768',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57a83368aa2565_54032768')) {
function content_57a83368aa2565_54032768 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '939047157a833689fb9e7_46136863';
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
            <li><a href="/news/index">新闻列表管理 </a></li>
            <li class="active">新闻详情</li>
        </ol>

        <div class="right_con">

            <form class="form-horizontal" id="form-save" action="/news/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="n_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_title'];?>
" placeholder="新闻名称" datatype="*" nullmsg="请填写新闻名称" style="width: 400px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">导读</label>
                        <div class="col-sm-4">
                            <textarea  name="n_des" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_des'];?>
" placeholder="新闻导读" style="width: 500px;height:80px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['n_des'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">类型</label>
                        <div class="col-sm-6">
                            <select name="nc_type" id="nc_type" class="form-control" style="width: 200px;">
                                <?php echo $_smarty_tpl->tpl_vars['typeOption']->value;?>

                            </select>
                        </div>
                        <label style="color:red;"></label>
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">所在分类</label>
                        <div class="col-sm-4">
                            <select datatype="*"  nullmsg="请选择所在分类" id="nc_id" name="nc_id" class="form-control" style="width:200px;">
                                <?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">来源</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="n_source" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_source'];?>
" placeholder="来源" datatype="*" nullmsg="请填写来源" style="width: 200px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">小编</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="n_editor" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_editor'];?>
" placeholder="编辑" datatype="*" nullmsg="请填写n_editor" style="width: 200px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-4">
                            <textarea name="n_content" id="n_content" style="width:800px;overflow-y:auto;max-height:200px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['n_content'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">封面图</label>
                        <div class="col-sm-4 ">
                            <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload();" />
                            <div style="padding-top:10px;"><img src="<?php if ($_smarty_tpl->tpl_vars['row']->value['n_cover']) {
echo $_smarty_tpl->tpl_vars['row']->value['n_cover'];
}?>" id="upload-img" style="max-width:200px;<?php if (!$_smarty_tpl->tpl_vars['row']->value['n_cover']) {?>display:none;<?php }?>"/></div>
                            <input type="hidden" name="n_cover" id="file" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_cover'];?>
"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序</label>
                        <div class="col-sm-4">
                            <input type="text" style="width:100px;" class="form-control" name="n_sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_sort'];?>
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