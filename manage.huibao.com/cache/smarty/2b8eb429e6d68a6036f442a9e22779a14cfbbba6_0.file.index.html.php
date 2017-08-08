<?php /* Smarty version 3.1.27, created on 2016-07-18 17:30:11
         compiled from "/mnt/www/manage.huibao.com/application/views/default/ads/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:1240013276578ca1a3452802_29027307%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b8eb429e6d68a6036f442a9e22779a14cfbbba6' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/ads/index.html',
      1 => 1468834210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1240013276578ca1a3452802_29027307',
  'variables' => 
  array (
    'title' => 0,
    'statusOption' => 0,
    'data' => 0,
    'row' => 0,
    'baseUrl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578ca1a34b9e26_95310354',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578ca1a34b9e26_95310354')) {
function content_578ca1a34b9e26_95310354 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1240013276578ca1a3452802_29027307';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">广告管理 </a></li>
            <li class="active">广告管理列表</li>
        </ol>

        <div class="right_con">
            <!--搜索区域-->
            <form class="form-inline pull-left" id="searchForm">
                <div class="form-group">标题：
                    <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" placeholder="标题" style="width: 300px;">
                </div>
                <div class="form-group">
                    状态：
                    <select name="status" id="status" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                    </select>
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();">刷新界面</button>
            <button type="button" class="btn btn-primary pull-right"  onclick="location.href='/ads/form/'">添加广告</button>
            <div class="clear10"></div>

            <!-- 表格 -->
            <table class="table table-bordered table-striped">
                <tr>
                    <td>广告名称</td>
                    <td>别名</td>
                    <td>图片</td>
                    <td>链接</td>
                    <td>状态</td>
                    <td>添加时间</td>
                    <td>操作</td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_alias'];?>
</td>
                    <td>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_picture'];?>
" style="width: 100px;height: 100px;">
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_link'];?>
</td>
                    <td>
                        <a href="javascript:void(0);" data-json="确认要更改状态吗？" data-href="/news/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_status'];?>
">
                            <i class="glyphicon <?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 1) {?>glyphicon-eye-open<?php } else { ?>glyphicon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['a_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-warning">禁用</span><?php }?>
                        </a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['a_addtime'];?>
</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" title="编辑"></a>&nbsp;&nbsp;
                    </td>
                </tr>
                <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
                <?php }?>
            </table>
            <!-- 分页 -->

            <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
            <nav>
                <ul class="pagination pull-right"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</ul>
            </nav>
            <?php }?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $('#tid').bind('change', function(){
            var tid = $(this).val();
            $.post('/newscategory/getType', {tid,tid}, function(data){
                if(data.code == 1){
                    $('#pid').html(data.data);
                }
            }, 'json')
        })

        $('#collectNews').click(function(){
            var tid = $('#tid').val();
            var pid = $('#pid').val();
            $.post('/ajax/collect/news', {tid : tid, pid : pid}, function(data){
                if(data.status == 'y'){
                    alert(data.info);
                    $('#searchForm').submit();
                }else{
                    alert(data.info);
                }
            }, 'json')
        })

        $('#changeStatus').click(function(){
            var ids = '';
            $('.checkList').each(function(){
                if($(this).is(":checked")){
                    ids += $(this).val();
                    ids += ',';
                }
            })

            if(ids){
                ids = ids.substring(0, ids.length - 1);
            }else{
                alert('请选择需要操作的列表');return;
            }

            $.post('/news/changeMulti', {ids : ids}, function(data){
                if(data.status == 'y'){
                    alert(data.info);
                    $('#searchForm').submit();
                }else{
                    alert(data.info);
                }
            }, 'json');
        })
    })
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>