<?php /* Smarty version 3.1.27, created on 2016-07-19 10:32:00
         compiled from "/mnt/www/manage.huibao.com/application/views/default/adsgroup/form.html" */ ?>
<?php
/*%%SmartyHeaderCode:357157764578d9120085568_71879647%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad3f889dfbf5f8f003c759bffdcf6646ace7415f' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/adsgroup/form.html',
      1 => 1468895519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '357157764578d9120085568_71879647',
  'variables' => 
  array (
    'row' => 0,
    'adsData' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578d91200ec444_96619608',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578d91200ec444_96619608')) {
function content_578d91200ec444_96619608 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '357157764578d9120085568_71879647';
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
            <li><a href="/adsgroup/index">广告组管理 </a></li>
            <li class="active">广告组详情</li>
        </ol>

        <div class="right_con">
            <form class="form-horizontal" id="form-save" action="/adsgroup/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_id'];?>
" />
                    <div class="form-group">
                    <label class="col-sm-2 control-label">广告组名</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" name="ag_name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_name'];?>
" placeholder="广告组名" datatype="*" nullmsg="请填写广告组名" style="width: 400px;"/>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">广告别名</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="ag_cname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ag_cname'];?>
" placeholder="广告别名" datatype="*" nullmsg="请填写广告别名" style="width: 400px;" <?php if ($_smarty_tpl->tpl_vars['row']->value['ag_id']) {?>readonly<?php }?>/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">广告列表</label>
                        <div class="col-sm-10">
                            <?php if ($_smarty_tpl->tpl_vars['adsData']->value) {?>
                            <?php
$_from = $_smarty_tpl->tpl_vars['adsData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                <div style="margin:5px 10px;"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['ag_id']) {
if (in_array($_smarty_tpl->tpl_vars['v']->value['a_id'],$_smarty_tpl->tpl_vars['row']->value['a_ids'])) {?>checked="true"<?php }
}?>name="banner" >&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['a_title'];?>
</div>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            <?php }?>
                            <input type="hidden" id="a_ids" name="a_ids" value="" />
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
        
    $('.btn').click(function () {
        var id_array=new Array();
        $('input[name="banner"]:checked').each(function(){
            id_array.push($(this).attr('value'));
        });
        var idstr=id_array.join(',');
        $("#a_ids").attr('value',idstr);
    })

<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>