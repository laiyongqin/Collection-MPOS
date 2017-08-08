<?php /* Smarty version 3.1.27, created on 2016-07-11 09:31:57
         compiled from "/mnt/www/manage.huibao.com/application/views/default/tradesuggest/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:4369763975782f70d29a138_97980185%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52265fa3bbddcee613126382a6c25e8dd534cf23' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/tradesuggest/index.html',
      1 => 1468199356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4369763975782f70d29a138_97980185',
  'variables' => 
  array (
    'typeOption' => 0,
    'data' => 0,
    'row' => 0,
    'type' => 0,
    'baseUrl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5782f70d332366_29121866',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5782f70d332366_29121866')) {
function content_5782f70d332366_29121866 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4369763975782f70d29a138_97980185';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">交易建议管理 </a></li>
            <li class="active">交易建议列表</li>
        </ol>

        <div class="right_con">
            <!--搜索区域-->
            <form class="form-inline pull-left">
                <div class="form-group">交易分类：
                    <select name="type" id="type" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['typeOption']->value;?>

                    </select>
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();">刷新界面</button>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#adminModal" href="/tradesuggest/form/">添加交易建议</button>

            <div class="clear10"></div>

            <!-- 表格 -->
            <table class="table table-bordered table-striped">
                <tr>
                    <td>分类名称</td>
                    <td>目标金额</td>
                    <td>止损金额</td>
                    <td>买入金额</td>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['type']->value[$_smarty_tpl->tpl_vars['row']->value['tt_id']];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ts_target'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ts_loss'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['ts_purchase'];?>
</td>
                    <td>
                        <a  data-toggle="modal" data-target="#adminModal" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['ts_id'];?>
" title="编辑分类">编辑</a>&nbsp;&nbsp;
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

        <!--弹窗-->
        <form class="form-horizontal" action="/tradesuggest/save" method="post">
            <div class="modal fade" id="adminModal" tabindex="-1" role="dialog"></div>
        </form>
    </div>
    <div class="clear"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>