<?php /* Smarty version 3.1.27, created on 2016-07-28 16:04:31
         compiled from "/mnt/www/www.huibao.com/application/views/common/right.html" */ ?>
<?php
/*%%SmartyHeaderCode:18871741235799bc8f1fa7b2_11381857%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b524a4b421ba7e89ef8e5fe4b43db6c3783b8bb4' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/common/right.html',
      1 => 1469667545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18871741235799bc8f1fa7b2_11381857',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799bc8f211d91_94920256',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799bc8f211d91_94920256')) {
function content_5799bc8f211d91_94920256 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18871741235799bc8f1fa7b2_11381857';
?>
<div class="sidebar" id="fixedMenu">
    <div class="box data1">
        <div class="title">国际市场数据</div>

        <div class="con"><iframe id="bottomprice" name="bottomprice" src="http://www.jin10.com/bottomprice/indexp.html" scrolling="no" width="342" frameborder="0" height="253"></iframe></div>
    </div>
    <div class="box data2">
        <div class="title">海南大宗市场数据</div>
        <div class="con"><iframe width="372px" height="180px" frameborder="0" src="http://www.hainancec.com/otc/otc/index/list.jsp" scrolling="no"></iframe> </div>
    </div>
    <div class="box" style="height:250px;">
        <div class="title">全球指数</div>
        <div class="con" style="padding-left: 50px;"><iframe width="372px" height="430px" frameborder="0" src="http://stock.10jqka.com.cn/api/stock_10.html" scrolling="no"></iframe> </div>
    </div>
</div><?php }
}
?>