<?php /* Smarty version 3.1.27, created on 2016-07-11 10:25:09
         compiled from "/mnt/www/manage.huibao.com/application/views/default/common/footer.html" */ ?>
<?php
/*%%SmartyHeaderCode:94884039457830385a972c8_34969082%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ecd7e8894542fd4417b706bb76d54b194877993' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/common/footer.html',
      1 => 1467768890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94884039457830385a972c8_34969082',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57830385aa1870_72284368',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57830385aa1870_72284368')) {
function content_57830385aa1870_72284368 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '94884039457830385a972c8_34969082';
?>
<div class="bottom">Copyright © 2016-2017 福州华闽易家网络科技有限公司. All Rights Reserved</div>

<?php echo '<script'; ?>
>
    window.onload=function() {
        var Aleft=document.getElementById('left');
        var Aright=document.getElementById('right');

        Aleft.style.minHeight=window.innerHeight-130+"px";
        Aright.style.minHeight=window.innerHeight-130+"px";
        Aright.style.width=window.innerWidth-207+"px";

    };
    window.onresize=function() {
        var Aleft=document.getElementById('left');
        var Aright=document.getElementById('right');

        Aleft.style.minHeight=window.innerHeight-130+"px";
        Aright.style.minHeight=window.innerHeight-130+"px";
        Aright.style.width=window.innerWidth-207+"px";

    };
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>