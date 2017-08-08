<?php /* Smarty version 3.1.27, created on 2016-07-18 10:02:09
         compiled from "/mnt/www/manage.huibao.com/application/views/default/common/menu.html" */ ?>
<?php
/*%%SmartyHeaderCode:1383172512578c38a15cccb3_21158466%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d4e01014d74599fe2f4a4aa31591b1f4cb5994c' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/common/menu.html',
      1 => 1468806959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1383172512578c38a15cccb3_21158466',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578c38a15da794_97502029',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578c38a15da794_97502029')) {
function content_578c38a15da794_97502029 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1383172512578c38a15cccb3_21158466';
?>
<div id="left">
    <div class="btn-group-vertical" id="km_ment" role="group" aria-label="...">

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>系统管理
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <?php if (@constant('A_ROLE') == 1) {?><li><a href="/admin/index/">系统管理员</a></li><?php }?>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>新闻管理
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/newscategory/index">新闻分类</a></li>
                <li><a href="/news/index">新闻列表</a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>交易管理
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/tradetype/index">交易类型</a></li>
                <li><a href="/tradesuggest/index">交易建议</a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>富豪区
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/finance/index">财经日历</a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>特色服务
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/sofe/index">软件管理</a></li>
                <li><a href="/sofe/feature">单篇管理</a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>用户系统
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/member/index/">会员管理</a></li>
            </ul>
        </div>
    </div>
</div><?php }
}
?>