<?php /* Smarty version 3.1.27, created on 2016-07-13 15:02:24
         compiled from "/mnt/www/manage.huibao.com/application/views/default/common/header.html" */ ?>
<?php
/*%%SmartyHeaderCode:19784536815785e7803af188_88031915%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a6ae94d370dc02552bc4815679b8125e3f825a2' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/common/header.html',
      1 => 1468393342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19784536815785e7803af188_88031915',
  'variables' => 
  array (
    'pageTitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5785e7804abf84_63211471',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5785e7804abf84_63211471')) {
function content_5785e7804abf84_63211471 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19784536815785e7803af188_88031915';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/public/css/bootstrap-customfile.css" />
    <link rel="stylesheet" href="/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/public/css/bootstrap-datetimepicker.css" />
    <?php echo '<script'; ?>
 src="/public/js/jquery.12.0.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/Headroom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/jquery.artDialog-4.1.7.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/common.js"><?php echo '</script'; ?>
>
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="/public/js/jquery.12.0.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <?php echo '<script'; ?>
 src="/public/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/bootstrap-datetimepicker.zh-CN.js"><?php echo '</script'; ?>
>
</head>


<body>
<div class="nav">
    <a href="/"><div class="logo"></div></a>
    <div class="btn-group pull-right" id="yonghu">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            管理员：<?php echo @constant('A_REALNAME');?>
 <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="/index/password/" data-toggle="modal" data-target="#passportModal">修改密码</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/login/logout/">退出系统</a></li>
        </ul>
    </div>
</div>

<form class="form-horizontal" action="/ajax/passport/password/" method="post">
    <div class="modal fade" id="passportModal" tabindex="-1" role="dialog" aria-labelledby="passportModalLabel"></div>
</form><?php }
}
?>