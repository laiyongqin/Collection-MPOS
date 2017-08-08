<?php /* Smarty version 3.1.27, created on 2016-07-18 09:46:30
         compiled from "/mnt/www/manage.huibao.com/application/views/default/sofe/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:306035302578c34f64f77b1_75656904%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dd96a9ba30df09763704d95c6a8c3db23ffc60a' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/sofe/index.html',
      1 => 1468468049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '306035302578c34f64f77b1_75656904',
  'variables' => 
  array (
    'title' => 0,
    'data' => 0,
    'row' => 0,
    'baseUrl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578c34f6712d83_65065781',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578c34f6712d83_65065781')) {
function content_578c34f6712d83_65065781 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '306035302578c34f64f77b1_75656904';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">特色服务 </a></li>
            <li class="active">软件列表</li>
        </ol>

        <div class="right_con">
            <!--搜索区域-->
            <form class="form-inline pull-left">
                <div class="form-group" >
                    标题： <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" placeholder="标题" style="width: 400px;">
                </div>
                  <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();">刷新界面</button>
            <button type="button" class="btn btn-primary pull-right"  onclick="location.href='/sofe/form/'">添加软件</button>

            <div class="clear10"></div>

            <!-- 表格 -->
            <table class="table table-bordered table-striped">
                <tr>
                    <td>软件名称</td>
                    <td>下载链接</td>
                    <td>排序</td>
                    <!--<td>是否推荐</td>-->
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
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['s_name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['s_download_link'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['s_sort'];?>
</td>
                    <!--<td>-->
                        <!--<a href="#" data-json="确认要推荐状态吗？" data-href="/sofe/status/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['s_id'];?>
/status/<?php echo $_smarty_tpl->tpl_vars['row']->value['s_recommend'];?>
">-->
                            <!--<i class="glyphicon <?php if ($_smarty_tpl->tpl_vars['row']->value['s_recommend'] == 1) {?>glyphicon-eye-open<?php } else { ?>glyphicon-eye-close<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['row']->value['s_recommend'] == 2) {?>已推荐<?php } else { ?>未推荐<?php }?>"></i>-->
                            <!--<?php if ($_smarty_tpl->tpl_vars['row']->value['s_recommend'] == 1) {?><span class="label label-success">已推荐</span><?php } else { ?><span class="label label-warning">未推荐</span><?php }?>-->
                        <!--</a>-->
                    <!--</td>-->
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['s_addtime'];?>
</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['s_id'];?>
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

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>