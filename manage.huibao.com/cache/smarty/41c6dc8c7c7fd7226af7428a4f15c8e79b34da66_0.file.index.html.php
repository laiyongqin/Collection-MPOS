<?php /* Smarty version 3.1.27, created on 2016-08-16 09:56:30
         compiled from "/mnt/www/manage.huibao.com/application/views/default/news/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:89741864957b272ce5e7d90_72015373%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41c6dc8c7c7fd7226af7428a4f15c8e79b34da66' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/news/index.html',
      1 => 1471222947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89741864957b272ce5e7d90_72015373',
  'variables' => 
  array (
    'typeOption' => 0,
    'categoryOption' => 0,
    'title' => 0,
    'statusOption' => 0,
    'data' => 0,
    'row' => 0,
    'cateList' => 0,
    'baseUrl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b272ce7a10c3_44570714',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b272ce7a10c3_44570714')) {
function content_57b272ce7a10c3_44570714 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '89741864957b272ce5e7d90_72015373';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">新闻列表管理 </a></li>
            <li class="active">新闻列表</li>
        </ol>

        <div class="right_con">
            <!--搜索区域-->
            <form class="form-inline pull-left" id="searchForm">
                <div class="form-group">类型：
                    <select name="tid" id="tid" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['typeOption']->value;?>

                    </select>
                </div>
                <div class="form-group">分类：
                    <select name="pid" id="pid" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['categoryOption']->value;?>

                    </select>
                </div>
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
            <button type="button" class="btn btn-primary pull-right"  onclick="location.href='/news/form/'">添加新闻</button>
            <button type="button" class="btn btn-primary pull-right"  id="collectNews">采集</button>
            <div class="clear10"></div>

            <!-- 表格 -->
            <table class="table table-bordered table-striped">
                <tr>
                    <td><input type="checkbox" data-choose="all" > <input type="button" class="btn btn-default" name="改为正常" value="改为正常" id="changeStatus"></td>
                    <td>序号</td>
                    <td>类型</td>
                    <td>所在分类</td>
                    <td>标题</td>
                    <td>排序</td>
                    <td>状态</td>
                    <td>添加时间</td>
                    <!--<td>是否推荐</td>-->
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
                    <td><input type="checkbox"  class="checkList" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
"></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['row']->value['nc_type'] == 1) {?><span class="label label-success">新手区</span><?php } else { ?><span class="label label-danger">富豪区</span><?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cateList']->value[$_smarty_tpl->tpl_vars['row']->value['nc_id']];?>
</td>
                    <td>
						<?php if ($_smarty_tpl->tpl_vars['cateList']->value[$_smarty_tpl->tpl_vars['row']->value['nc_id']] == '头条') {?>
						<?php echo $_smarty_tpl->tpl_vars['row']->value['n_title'];?>
---<?php if ($_smarty_tpl->tpl_vars['row']->value['n_type'] == 2) {?><span class="label label-success">国内新闻</span><?php } else { ?><span class="label label-danger">国际新闻</span><?php }?>
						<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['row']->value['nc_id'] != 11) {?>
						<?php echo $_smarty_tpl->tpl_vars['row']->value['n_title'];?>

						<?php }?>
						<?php }?></td>

                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['n_sort'];?>
</td>
                    <td>
                        <a href="javascript:void(0);" data-json="确认要更改状态吗？" data-href="/news/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_status'];?>
">
                            <i class="glyphicon <?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 1) {?>glyphicon-eye-open<?php } else { ?>glyphicon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 1) {?><span class="label label-success">正常</span><?php } else { ?><span class="label label-warning">禁用</span><?php }?>
                        </a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['n_addtime'];?>
</td>
                    <!--<td>-->
                        <!--<a href="javascript:void(0);" data-json="确认要更改状态吗？" data-href="/news/recommend/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_status'];?>
">-->
                            <!--<i class="glyphicon <?php if ($_smarty_tpl->tpl_vars['row']->value['n_recommend'] == 1) {?>glyphicon-eye-open<?php } else { ?>glyphicon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['n_status'] == 2) {?>禁用<?php } else { ?>正常<?php }?>"></i>-->
                            <!--<?php if ($_smarty_tpl->tpl_vars['row']->value['n_recommend'] == 1) {?><span class="label label-success">推荐</span><?php } else { ?><span class="label label-warning">未推荐</span><?php }?>-->
                        <!--</a>-->
                    <!--</td>-->
                    <td>
                        <a class="glyphicon glyphicon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
" title="编辑"></a>&nbsp;&nbsp;
                        <a class="glyphicon glyphicon-remove" data-json="确认要删除吗？" href="javascript:void(0);" title="删除" data-href="/news/delete/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['n_id'];?>
/"></a>&nbsp;&nbsp;
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