<?php /* Smarty version 3.1.27, created on 2016-07-27 17:54:39
         compiled from "/mnt/www/www.huibao.com/application/views/login/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:847531188579884dfaeb3d5_91523496%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7d86d9076718368f2bf40d4c90232a9fa440972' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/login/index.html',
      1 => 1468465733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '847531188579884dfaeb3d5_91523496',
  'variables' => 
  array (
    'pageTitle' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_579884dfb6ab34_20108706',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_579884dfb6ab34_20108706')) {
function content_579884dfb6ab34_20108706 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '847531188579884dfaeb3d5_91523496';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
<link rel="stylesheet" type="text/css" href="/public/css/style.css">
<link rel="stylesheet" type="text/css" href="/public/css/plugs.css">
<?php echo '<script'; ?>
 src="/public/js/jquery.12.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/Validform_v5.3.2_min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/jquery.artDialog-4.1.7.min.js"><?php echo '</script'; ?>
>
</head>

<body>
<div class="bj-vb"></div>
<div class="logo"><a href="/"><img src="/public/images/logo.png" width="128" height="67"></a></div>

<!-- 登录条 -->
<div class="loginbar block">
    <img src="/public/images/loginbar.png" width="68" height="63">
    <a class="regsiter1_btn" href="http://202.100.202.228:8280/reg.do?ACCOUNT_ID=611">实盘开户</a>
    <a class="regsiter2_btn" href="http://www.hainancec.com:9085/fkhp/regFast.do?BROKER_ID=101611">虚拟开户</a>
    <a class="login_btn" href="/login">用户登录</a>
</div>

<!-- 标语 -->
<div class="slogans">
    <h2>金融，从未如此简单</h2>
    <h4>一切从这里开始</h4>
</div>
<div class="login_box block">
<div class="title">用户登录</div>
    <form action="/login/passport/" class="form-process">
        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
<input type="text" class="accounts block" placeholder="- 在此输入您的用户名" name="username" aria-describedby="sizing-addon2" datatype="*" nullmsg="请输入登录用户名" >
<input type="password" class="password block" placeholder="- 在此输入您的登录密码" name="password" aria-describedby="sizing-addon2" datatype="*" nullmsg="请输入登录密码">
<button type="submit" class="btn btn-primary btn btn-block">用户登录</button>
        </form>
<p>
<a href="#">如何获取帐号？</a>
<a class="home" href="/index/index"><i><img src="/public/images/return.png" width="15" height="13"></i>返回首页</a>
</p>
</div>
</body>
<?php echo '<script'; ?>
 type="application/javascript">
    $(".form-process").Validform({
        btnSubmit: '.btn',
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3) {
                $.dialog.tips(msg);
            }

        },
        callback:function(json){
            $.dialog.tips(json.info);
            if ( json.status == 'y' ) {
                window.location.href = '/';
            }
            return false;
        }
    });
<?php echo '</script'; ?>
>
</html>
<?php }
}
?>