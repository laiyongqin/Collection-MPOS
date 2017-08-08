<?php /* Smarty version 3.1.27, created on 2016-07-28 17:10:05
         compiled from "/mnt/www/www.huibao.com/application/views/activity/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:13978640945799cbed9c4a16_46866888%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcd6a53d8a936d2d05669a2ecb03966ddcb296aa' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/activity/index.html',
      1 => 1469667545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13978640945799cbed9c4a16_46866888',
  'variables' => 
  array (
    'adList' => 0,
    'row' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799cbeda4df71_73308123',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799cbeda4df71_73308123')) {
function content_5799cbeda4df71_73308123 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13978640945799cbed9c4a16_46866888';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="activity block2">
    <div class="nav-title">
        <div class="crumb"><a href="/"><i><img src="/public/images/home.png" width="14" height="13"></i>首页</a> > <a href="service.html">活动专区</a></div>
        <b>活动专区</b>
    </div>

    <div class="banner">
        <div class="bd">
            <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['adList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
                <li>
                    <div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_picture'];?>
" /></div>
                    <!--<div class="title"><?php echo $_smarty_tpl->tpl_vars['row']->value['a_title'];?>
</div>-->
                </li>
                <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
            </ul>
        </div>
        <div class="hd">
            <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['adList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
                <li <?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?>class="on"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_picture'];?>
"/></li>
                <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>
            </ul>
        </div>
    </div>


</div>
<?php echo '<script'; ?>
 src="/public/js/jquery.SuperSlide.2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">jQuery(".activity .banner").slide({ mainCell:".bd ul",effect:"left",autoPlay:true });<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>