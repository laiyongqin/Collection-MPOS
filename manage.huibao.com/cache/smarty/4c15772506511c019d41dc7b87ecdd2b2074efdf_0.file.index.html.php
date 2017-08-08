<?php /* Smarty version 3.1.27, created on 2016-07-13 15:20:15
         compiled from "/mnt/www/manage.huibao.com/application/views/default/finance/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:5439526805785ebaf355714_93144356%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c15772506511c019d41dc7b87ecdd2b2074efdf' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/finance/index.html',
      1 => 1468374704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5439526805785ebaf355714_93144356',
  'variables' => 
  array (
    'date' => 0,
    'data' => 0,
    'row' => 0,
    'baseUrl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5785ebaf3d2886_83066002',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5785ebaf3d2886_83066002')) {
function content_5785ebaf3d2886_83066002 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5439526805785ebaf355714_93144356';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">富豪区 </a></li>
            <li class="active">日历列表</li>
        </ol>

        <div class="right_con">
            <!--搜索区域-->
            <form class="form-inline pull-left" id="searchFrom">
                <div class="form-group">
                    日期：<input type="text" id="date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" class="form-control" placeholder="日期" />
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();">刷新界面</button>
            <button type="button" class="btn btn-primary pull-right"  onclick="location.href='/finance/form/'">添加新闻</button>
            <button type="button" class="btn btn-primary pull-right"  id="collectNews">采集</button>
            <div class="clear10"></div>

            <!-- 表格 -->
            <table class="table table-bordered table-striped">
                <tr>
                    <td>序号</td>
                    <td>日期</td>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['fc_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['fc_date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['fc_addtime'];?>
</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/form/id/<?php echo $_smarty_tpl->tpl_vars['row']->value['fc_id'];?>
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
?>

<?php echo '<script'; ?>
 src="/public/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="application/javascript">
    $('#date').datetimepicker({
        format: "yyyy-mm-dd",
        autoclose: 1,
        minView:3,
        pickerPosition: "bottom-left"
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $('#collectNews').click(function(){
            var date = $('#date').val();
            $.post('/ajax/collect/calendar', {date:date}, function(data){
                if(data.status == 'y'){
                    alert(data.info);
                    $('#searchFrom').submit();
                }else{
                    alert(data.info);
                }
            }, 'json')
        })
    })
<?php echo '</script'; ?>
><?php }
}
?>