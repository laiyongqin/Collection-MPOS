<?php /* Smarty version 3.1.27, created on 2016-07-28 17:10:26
         compiled from "/mnt/www/www.huibao.com/application/views/service/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:18669343015799cc021518b0_81815086%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6842369be12a2bafbc3e3d9e161e33b1f61824a' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/service/index.html',
      1 => 1469697024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18669343015799cc021518b0_81815086',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799cc021a2781_26038049',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799cc021a2781_26038049')) {
function content_5799cc021a2781_26038049 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18669343015799cc021518b0_81815086';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<style>
    html, body { font-family:"微软雅黑";
        margin: 0;
        padding: 0;
    }
    @media (min-width:1440px) {
        .footer{ position:fixed; bottom:0; width:100%;}  }
</style>
<!-- 页面主体 -->
<div class="main">
    <a class="con5 block">
        <div class="tb"><img src="/public/images/tb_5.png" width="165" height="145"></div>
        <div class="title">
            <h4><?php echo $_smarty_tpl->tpl_vars['data']->value['f_title'];?>
</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['data']->value['f_desc'];?>
</p>
        </div>
    </a>
    <a class="con6 block">
        <div class="tb"><img src="/public/images/tb_6.png" width="165" height="145"></div>
        <div class="title">
            <h4>微信公众号</h4>
            <p>PUBLIC NUMBER</p>
        </div>
    </a>
    <a href="/download" class="con7 block">
        <div class="tb"><img src="/public/images/tb_7.png" width="165" height="145"></div>
        <div class="title">
            <h4>软件下载</h4>
            <p>SW DOWNLOAD</p>
        </div>
    </a>
</div>
<!-- 六大优势 -->
<div class="frame2">
    <a class="close">关闭</a>
    <h4>汇&nbsp;宝&nbsp;特&nbsp;色</h4>

    <div class="ts one">
        <img src="/public/images/ts_1.png" width="128" height="191">
    </div>

    <div class="ts two">
        <img src="/public/images/ts_2.png" width="128" height="191">
    </div>

    <div class="ts three">
        <img src="/public/images/ts_3.png" width="128" height="191">
    </div>

    <div class="ts four">
        <img src="/public/images/ts_4.png" width="128" height="191">
    </div>

</div>
<!-- 六大优势 end -->
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="/public/js/activity.js"><?php echo '</script'; ?>
><?php }
}
?>