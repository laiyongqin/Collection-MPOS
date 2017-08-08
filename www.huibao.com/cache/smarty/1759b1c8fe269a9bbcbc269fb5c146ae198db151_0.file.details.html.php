<?php /* Smarty version 3.1.27, created on 2016-07-15 14:48:50
         compiled from "/mnt/www/www.huibao.com/application/views/news/details.html" */ ?>
<?php
/*%%SmartyHeaderCode:819359695578887526a1041_30205628%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1759b1c8fe269a9bbcbc269fb5c146ae198db151' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/news/details.html',
      1 => 1468565329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '819359695578887526a1041_30205628',
  'variables' => 
  array (
    'cateInfo' => 0,
    'regalCategory' => 0,
    'vo' => 0,
    'id' => 0,
    'voson' => 0,
    'data' => 0,
    'beforeInfo' => 0,
    'nextInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57888752720f27_22939460',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57888752720f27_22939460')) {
function content_57888752720f27_22939460 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '819359695578887526a1041_30205628';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<!-- 页面主体 -->
<div class="main_vb">
    <div class="news block">
        <div class="nav-title">
            <div class="crumb"><a href="/index"><i><img src="/public/images/home.png" width="14" height="13"></i>首页</a> > <a <?php if ($_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'] == 11) {?>href="/regal/firstinfo?id=<?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'];?>
"<?php } elseif ($_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'] == 19 || $_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'] == 20 || $_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'] == 21 || $_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'] == 22) {?>href="/regal/strategylist?id=<?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'];?>
"<?php } else { ?>href="/regal?id=<?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_id'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_name'];?>
</a> > <a>新闻详情</a></div>
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
                        <li><a <?php if ($_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 19 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 20 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 20 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 21) {?> href="/regal/strategylist?id=<?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'];?>
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
        <div class="news-show">
            <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['n_title'];?>
</h2>
            <div class="details"><?php echo $_smarty_tpl->tpl_vars['data']->value['n_addtime'];?>
  来源：<?php echo $_smarty_tpl->tpl_vars['data']->value['n_source'];?>
  编辑：<?php echo $_smarty_tpl->tpl_vars['data']->value['n_editor'];?>
</div>
            <div class="text">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['n_des']) {?><div class="introduction">导读：<?php echo $_smarty_tpl->tpl_vars['data']->value['n_des'];?>
</div><?php }?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['n_content'];?>

            </div>
            <div class="single">
                <?php if ($_smarty_tpl->tpl_vars['beforeInfo']->value['n_title']) {?><a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['beforeInfo']->value['n_id'];?>
" class="previous">上一篇：<?php echo $_smarty_tpl->tpl_vars['beforeInfo']->value['n_title'];?>
</a><?php } else { ?><a class="previous">上一篇：没有了</a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['nextInfo']->value['n_title']) {?><a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['nextInfo']->value['n_id'];?>
" class="next">下一篇：<?php echo $_smarty_tpl->tpl_vars['nextInfo']->value['n_title'];?>
</a><?php } else { ?><a class="next">下一篇：没有了</a><?php }?>
        </div>
    </div>
</div>
    <?php echo $_smarty_tpl->getSubTemplate ("common/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="clear"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>