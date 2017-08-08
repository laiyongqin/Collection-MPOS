<?php /* Smarty version 3.1.27, created on 2016-07-27 09:47:31
         compiled from "/mnt/www/www.huibao.com/application/views/common/right.html" */ ?>
<?php
/*%%SmartyHeaderCode:377534576579812b3a99d54_49334301%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b524a4b421ba7e89ef8e5fe4b43db6c3783b8bb4' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/common/right.html',
      1 => 1469433297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '377534576579812b3a99d54_49334301',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_579812b3abdc98_67607546',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_579812b3abdc98_67607546')) {
function content_579812b3abdc98_67607546 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '377534576579812b3a99d54_49334301';
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
        <div class="con"><iframe width="372px" height="420px" frameborder="0" src="http://stock.10jqka.com.cn/api/stock_10.html" scrolling="no"></iframe> </div>
    </div>
</div><?php }
}
?>