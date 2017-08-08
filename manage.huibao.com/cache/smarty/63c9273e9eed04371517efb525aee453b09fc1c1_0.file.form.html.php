<?php /* Smarty version 3.1.27, created on 2016-07-18 10:45:12
         compiled from "/mnt/www/manage.huibao.com/application/views/default/feature/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:827650788578c42b878ff17_99143996%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63c9273e9eed04371517efb525aee453b09fc1c1' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/feature/form.html',
      1 => 1468809537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '827650788578c42b878ff17_99143996',
  'variables' => 
  array (
    'row' => 0,
    'statusOption' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578c42b87eae01_60888815',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578c42b87eae01_60888815')) {
function content_578c42b87eae01_60888815 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '827650788578c42b878ff17_99143996';
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
            <li><a href="/news/index">特色服务文章管理 </a></li>
            <li class="active">特色服务文章详情</li>
        </ol>
        <div class="right_con">
            <form class="form-horizontal" id="form-save" action="/feature/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['f_id'];?>
" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="f_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['f_title'];?>
" placeholder="标题" datatype="*" nullmsg="请填写标题" style="width: 400px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">副标题</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="f_desc" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['f_desc'];?>
" placeholder="副标题" datatype="*" nullmsg="请填写副标题" style="width: 400px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-4">
                            <textarea name="f_content" id="f_content" style="width:800px;overflow-y:auto;max-height:200px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['f_content'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">状态</label>
                        <div class="col-sm-6">
                            <select name="f_status" id="f_status" class="form-control" style="width: 200px;">
                                <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                            </select>
                        </div>
                        <label style="color:red;"></label>
                        <span class="help-inline"></span>
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
 src="/public/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var editor =  '';

    $(function(){
        editor = UM.getEditor('f_content');
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

<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>