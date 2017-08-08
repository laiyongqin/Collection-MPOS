<?php /* Smarty version 3.1.27, created on 2016-07-28 16:28:06
         compiled from "/mnt/www/www.huibao.com/application/views/download/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:4618156285799c216d7f874_13466587%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2125eba5c015b4798d6ecf1ce0fb2cba00c84632' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/download/index.html',
      1 => 1469667545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4618156285799c216d7f874_13466587',
  'variables' => 
  array (
    'banner' => 0,
    'v' => 0,
    'sofe' => 0,
    'v2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799c216df6b15_53238176',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799c216df6b15_53238176')) {
function content_5799c216df6b15_53238176 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4618156285799c216d7f874_13466587';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<!-- 页面主体 -->
<div class="download block2">
    <div class="nav-title">
        <div class="crumb"><a href="/"><i><img src="/public/images/home.png" width="14" height="13"></i>首页</a> > <a href="/service">特色服务</a> > <a>软件下载</a></div>
        <b>软件下载</b>
    </div>
    <div class="con">
        <?php
$_from = $_smarty_tpl->tpl_vars['banner']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
        <div class="large block"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['a_link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['a_picture'];?>
"></a></div>
        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
        <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['sofe']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->value) {
$_smarty_tpl->tpl_vars['v2']->_loop = true;
$foreach_v2_Sav = $_smarty_tpl->tpl_vars['v2'];
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['v2']->value['s_download_link'];?>
"><img src="<?php echo @constant('IMAGE_URL');
echo $_smarty_tpl->tpl_vars['v2']->value['s_cover'];?>
" style="width:100%;"></a></li>
            <?php
$_smarty_tpl->tpl_vars['v2'] = $foreach_v2_Sav;
}
?>
        </ul>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>