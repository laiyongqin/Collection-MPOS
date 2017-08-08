<?php /* Smarty version 3.1.27, created on 2016-07-11 14:23:01
         compiled from "/mnt/www/manage.huibao.com/application/views/default/finance/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:133589019257833b4585a939_11875559%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '294d3a6be00292b98917f00108367f99580739a3' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/finance/form.html',
      1 => 1468218138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133589019257833b4585a939_11875559',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57833b458cc6a8_52622712',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57833b458cc6a8_52622712')) {
function content_57833b458cc6a8_52622712 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '133589019257833b4585a939_11875559';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<link href="/public/js/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="/finance/index">财经日历列表管理 </a></li>
            <li class="active">日历详情</li>
        </ol>

        <div class="right_con">

            <form class="form-horizontal" id="form-save" action="/finance/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fc_id'];?>
" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-4">
                            <textarea name="fc_content" id="fc_content" style="width:600px;overflow-y:auto;max-height:200px;" ><?php echo $_smarty_tpl->tpl_vars['row']->value['fc_content'];?>
</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">时间</label>
                        <div class="col-sm-4">
                            <input type="text" style="width:200px;" class="form-control" id="fc_date" name="fc_date" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fc_date'];?>
" placeholder="时间"datatype="*" nullmsg="请填写时间" />
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
 src="/public/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var editor =  '';

    $(function(){
        editor = UM.getEditor('fc_content');
        $('#fc_date').datetimepicker({
            format: "yyyy-mm-dd",
            autoclose: 1,
            minView:3,
            pickerPosition: "bottom-left"
        });
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