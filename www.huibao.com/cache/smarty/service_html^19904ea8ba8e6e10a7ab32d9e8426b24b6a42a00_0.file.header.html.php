<?php /* Smarty version 3.1.27, created on 2016-07-25 11:47:03
         compiled from "/mnt/www/www.huibao.com/application/views/common/header.html" */ ?>
<?php
/*%%SmartyHeaderCode:121138467357958bb77b14f1_98849062%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19904ea8ba8e6e10a7ab32d9e8426b24b6a42a00' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/common/header.html',
      1 => 1469004762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121138467357958bb77b14f1_98849062',
  'variables' => 
  array (
    'pageTitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57958bb77dd629_93265433',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57958bb77dd629_93265433')) {
function content_57958bb77dd629_93265433 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '121138467357958bb77b14f1_98849062';
?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <!-- add css -->
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/googleapis_Play.css">
    <link rel="stylesheet" type="text/css" href="/public/css/googleapis_Nunito.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/jquery-2.1.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/lp.js"><?php echo '</script'; ?>
>
    <style>
        html, body { font-family:"微软雅黑";
            margin: 0;
            padding: 0;
            overflow:auto !important;
        }
    </style>
</head>

<body>
<div class="bj-vb"></div>
<div class="logo"><a href="/"><img src="/public/images/logo.png" width="128" height="67"></a></div>

<!-- 登录条 -->
<div class="loginbar block">
    <img src="/public/images/loginbar.png">
    <a class="regsiter1_btn" target="_blank" href="http://202.100.202.228:8280/reg.do?ACCOUNT_ID=611">实盘开户</a>
    <a class="regsiter2_btn" target="_blank" href="http://www.hainancec.com:9085/fkhp/regFast.do?BROKER_ID=101611">模拟开户</a>
    <a class="login_btn" href="<?php if (@constant('A_REALNAME')) {?>/index<?php } else { ?>/login<?php }?>"><?php if (@constant('A_REALNAME')) {
echo @constant('A_REALNAME');
} else { ?>会员登录<?php }?></a>
</div>

<!-- 标语 -->
<div class="slogans">
    <h2>权威金融  &nbsp;&nbsp;&nbsp;&nbsp;炙手可得</h2>
<!--     <h4>一切从这里开始</h4> -->
</div><?php }
}
?>