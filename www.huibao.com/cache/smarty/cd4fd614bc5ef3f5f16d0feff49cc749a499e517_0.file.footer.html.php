<?php /* Smarty version 3.1.27, created on 2016-07-28 16:26:24
         compiled from "/mnt/www/www.huibao.com/application/views/common/footer.html" */ ?>
<?php
/*%%SmartyHeaderCode:25967185799c1b07b4299_34647980%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd4fd614bc5ef3f5f16d0feff49cc749a499e517' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/common/footer.html',
      1 => 1469694381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25967185799c1b07b4299_34647980',
  'variables' => 
  array (
    'categoryOne' => 0,
    'dataOne' => 0,
    'v1' => 0,
    'categoryTwo' => 0,
    'dataTwo' => 0,
    'v2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799c1b07bc654_01533288',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799c1b07bc654_01533288')) {
function content_5799c1b07bc654_01533288 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '25967185799c1b07b4299_34647980';
?>
<!-- 底部 -->
<div class="clear"></div>
<div class="frame-bj"></div>
<div class="frame"><a class="close">关闭</a><img src="/public/images/ewm.jpg" width="430" height="430"><div class="text">
    全新升级
    给你不一样的金融领域</div>
</div></div>

<div class="robot"></div>
<!-- 底部 -->
<div class="sidebar-menu block">
    <a href="/" title="首页"><img src="/public/images/bottom_menu_1.png" width="50" height="50"></a>
    <a class="weixin" title="微信"><img src="/public/images/bottom_menu_2.png" width="50" height="50"></a>
    <a class="return fb7-home" title="返回上级" href="javascript:history.go(-1)"><img src="/public/images/bottom_menu_3.png" width="50" height="50"></a>
</div>

<!-- 底部 -->
<div class="footer block" style="line-height: 30px;">
    版权所有© 2016-2017 汇宝网
</div>

<!--<div class="footer">-->
    <!--<div class="footer-news">-->
        <!--<div class="list">-->
            <!--<strong><?php echo $_smarty_tpl->tpl_vars['categoryOne']->value['nc_name'];?>
：</strong>-->
            <!--<ul>-->
                <!--<?php if ($_smarty_tpl->tpl_vars['dataOne']->value) {?>-->
                <!--<?php
$_from = $_smarty_tpl->tpl_vars['dataOne']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v1']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->value) {
$_smarty_tpl->tpl_vars['v1']->_loop = true;
$foreach_v1_Sav = $_smarty_tpl->tpl_vars['v1'];
?>-->
                <!--<li><a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['v1']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v1']->value['n_title'];?>
</a></li>-->
                <!--<?php
$_smarty_tpl->tpl_vars['v1'] = $foreach_v1_Sav;
}
?>-->
                <!--<?php }?>-->
            <!--</ul>-->
        <!--</div>-->
        <!--<div class="list">-->
            <!--<strong><?php echo $_smarty_tpl->tpl_vars['categoryTwo']->value['nc_name'];?>
：</strong>-->
            <!--<ul>-->
                <!--<?php if ($_smarty_tpl->tpl_vars['dataTwo']->value) {?>-->
                <!--<?php
$_from = $_smarty_tpl->tpl_vars['dataTwo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->value) {
$_smarty_tpl->tpl_vars['v2']->_loop = true;
$foreach_v2_Sav = $_smarty_tpl->tpl_vars['v2'];
?>-->
                <!--<li>  <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['v2']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v2']->value['n_title'];?>
</a></li>-->
                <!--<?php
$_smarty_tpl->tpl_vars['v2'] = $foreach_v2_Sav;
}
?>-->
                <!--<?php }?>-->
            <!--</ul>-->
        <!--</div>-->
        <!--<div class="switch"><strong>语音开关：</strong><label><input class="mui-switch mui-switch-animbg" type="checkbox" checked></label></div>-->
    <!--</div>-->
<!--</div>-->
</body>
</html><?php }
}
?>