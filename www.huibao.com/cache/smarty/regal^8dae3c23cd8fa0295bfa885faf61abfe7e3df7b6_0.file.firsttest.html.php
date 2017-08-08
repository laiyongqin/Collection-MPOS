<?php /* Smarty version 3.1.27, created on 2016-07-18 14:58:34
         compiled from "/mnt/www/www.huibao.com/application/views/regal/firsttest.html" */ ?>
<?php
/*%%SmartyHeaderCode:1014099852578c7e1a546b63_10255190%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dae3c23cd8fa0295bfa885faf61abfe7e3df7b6' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/regal/firsttest.html',
      1 => 1468825084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1014099852578c7e1a546b63_10255190',
  'variables' => 
  array (
    'id' => 0,
    'cateInfo' => 0,
    'regalCategory' => 0,
    'vo' => 0,
    'voson' => 0,
    'data' => 0,
    'v' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578c7e1a5b7184_45557192',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578c7e1a5b7184_45557192')) {
function content_578c7e1a5b7184_45557192 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1014099852578c7e1a546b63_10255190';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<style>
    .pagination{width:100%; margin:0 auto 20px; text-align: center;}
    .pagination a{color:#fff; display: inline-block;width:25px;height:25px; line-height:25px; margin:0 5px;border:solid 1px #fff; border-radius:3px; background: rgba(0,0,0,.5); text-align: center; background: #1f2e5b; font-size: 13px;}
    .pagination .current{ background: #ff6519 ;}
    .pagination a:hover{ background: #ff6519;}
    .on{color:#ef3e39!important;}
</style>
<!-- 页面主体 -->
<div class="main_vb">
    <div class="news block2">
        <div class="nav-title">
            <div class="crumb"><a href="/index"><i><img src="/public/images/home.png" width="14" height="13"></i>首页</a> > <a href="/regal?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_name'];?>
</a> > <a>国内新闻</a></div>
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['regalCategory']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['regalCategory']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                <li>
                    <a <?php if ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 13) {?>href="/regal/strategy?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
} elseif ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 11) {?> href="/regal/instant?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
} elseif ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 12) {?>href="/regal?id=14<?php } else { ?>href="/regal/firstinfo?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
}?>" <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id']) {?>class='on'<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_name'];?>
<i></i></a>
                    <ul class="menu">
                        <?php if ($_smarty_tpl->tpl_vars['vo']->value['sonList']) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['vo']->value['sonList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['voson'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['voson']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['voson']->value) {
$_smarty_tpl->tpl_vars['voson']->_loop = true;
$foreach_voson_Sav = $_smarty_tpl->tpl_vars['voson'];
?>
                        <li><a <?php if ($_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 19 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 20 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 20 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 21 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 22) {?> href="/regal/strategylist?id=<?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'];?>
"<?php } else { ?>href="/regal?id=<?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_name'];?>
</a></li>
                        <?php
$_smarty_tpl->tpl_vars['voson'] = $foreach_voson_Sav;
}
?>
                        <?php }?>
                    </ul>
                </li>
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                <?php }?>
                <li><a href="/financeDate">财经日历</a><i></i>
            </ul>
            <div class="menu-bj"></div>
        </div>
        <div class="list4">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                <li> <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['n_id'];?>
&nc_id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['n_title'];?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
        <!-- 分页 -->
        <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
        <nav>
            <ul class="pagination pull-right"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</ul>
        </nav>
        <?php }?>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("common/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="clear"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>