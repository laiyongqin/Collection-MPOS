<?php /* Smarty version 3.1.27, created on 2016-08-03 14:46:56
         compiled from "/mnt/www/www.huibao.com/application/views/index/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:181473213557a19360ddfa25_32146670%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59db12a4934e7b349edb06e510737b1a9ad9bcb5' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/index/index.html',
      1 => 1470206753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181473213557a19360ddfa25_32146670',
  'variables' => 
  array (
    'pageTitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57a193610ce503_86292578',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57a193610ce503_86292578')) {
function content_57a193610ce503_86292578 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '181473213557a19360ddfa25_32146670';
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
    <!--<?php echo '<script'; ?>
 src="/public/js/jquery.12.0.js"><?php echo '</script'; ?>
>-->
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
        }
        @media (min-width:1440px) {
            .footer{ position:fixed; bottom:0; width:100%;}  }
    </style>
</head>
<body>
<!--轮播背景-->
<div class="bj">
    <ul>
        <li class="on">1</li>
        <li>2</li>
    </ul>
    <div class="bj-list">
        <a><img src="/public/images/bj.jpg"></a>
        <a><img src="/public/images/bj2.jpg"></a>
    </div>
</div>
<div class="logo"><a href="/"><img src="/public/images/logo.png" width="128" height="67"></a></div>
<!-- 登录条 -->
<div class="loginbar block">
    <img src="/public/images/loginbar.png" width="68" height="63">
    <a class="regsiter1_btn" target="_blank" href="http://202.100.202.228:8280/reg.do?ACCOUNT_ID=611">实盘开户</a>
    <a class="regsiter2_btn" target="_blank" href="http://www.hainancec.com:9085/fkhp/regFast.do?BROKER_ID=101611">模拟开户</a>
    <a class="login_btn" href="<?php if (@constant('A_REALNAME')) {?>/index<?php } else { ?>/login<?php }?>"><?php if (@constant('A_REALNAME')) {
echo @constant('A_REALNAME');
} else { ?>会员登录<?php }?></a>
</div>

<!-- 标语 -->
<div class="slogans">
    <h2>金融，从未如此简单</h2>
    <h4>一切从这里开始</h4>
</div>
<!-- 页面主体 -->
<div class="main">
<a href="/novice" class="con1 block">
<div class="tb"><img src="/public/images/tb_1.png" width="165" height="145"></div>
<div class="title">
<h4>新手区</h4>
<p>NEWBIES</p>
</div>
    <div class="text"><p>最详细的金融教学百科</p><p>从零基础开始</p></div>
</a>
<a href="/regal/instant?id=11" class="con2 block">
<div class="tb"><img src="/public/images/tb_2.png" width="165" height="145"></div>
<div class="title">
<h4>富豪区</h4>
<p>EGAL ISTRICT</p>
</div>
    <div class="text"><p>最权威的数据锦囊</p><p>了解最新最全面的行情资讯</p></div>
</a>
    <a href="/service/" class="con3 block"><div class="title2">特色服务</div> <div class="text">引进新智能，24小时全程指导，功能升级 、操作简化，易学，易懂，数据更精确</div></a>
    <a href="/activity/" class="con4 block"><div class="title2">活动专区</div></a>
</div>
<div class="popup-bj"><div class="popup block"><img src="/public/images/activity_banner.jpg" width="920" height="522"><a class="close">关闭</a></div></div>
<?php echo '<script'; ?>
 type="text/javascript">
    var t = n =0, count;
    $(document).ready(function(){
        count=$(".bj-list a").length;
        $(".bj-list a:not(:first-child)").hide();
        $(".bj li").click(function() {
            var i = $(this).text() -1;//获取Li元素内的值，即1，2，3，4
            n = i;
            if (i >= count) return;
            $(".bj-list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
            $(this).toggleClass("on");
            $(this).siblings().removeAttr("class");
        });
        t = setInterval("showAuto()", 2000);
        $(".bj").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
    })

    function showAuto() {
        n = n >=(count -1) ?0 : ++n;
        $(".bj li").eq(n).trigger('click');
    }
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>