<?php /* Smarty version 3.1.27, created on 2016-07-11 11:23:12
         compiled from "/mnt/www/manage.huibao.com/application/views/default/index/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:38758985257831120c01d31_62494428%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21dce32cf5bf4ff9a72c7fb873746008ae445e29' => 
    array (
      0 => '/mnt/www/manage.huibao.com/application/views/default/index/index.html',
      1 => 1468207392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38758985257831120c01d31_62494428',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57831120c5ca55_97970289',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57831120c5ca55_97970289')) {
function content_57831120c5ca55_97970289 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '38758985257831120c01d31_62494428';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="/">管理首页 </a></li>
            <li class="active">商家概况</li>
        </ol>

        <!--<div class="right_con">-->
            <!--<div class="row">-->
                <!--<div class="col-md-4">-->
                    <!--<table class="table table-bordered">-->
                        <!--<tr> <th colspan="2">订单统计信息</th></tr>-->
                        <!--<tr>-->
                            <!--<td>已支付订单</td>-->
                            <!--<td><a href="/order/index?tid=3">0</a></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>交易成功订单</td>-->
                            <!--<td><a href="/order/index?tid=5">0</a></td>-->
                        <!--</tr>-->
                    <!--</table>-->
                <!--</div>-->
                <!--<div class="col-md-4">-->
                    <!--<table class="table table-bordered">-->
                        <!--<tr><th colspan="2">商品统计信息</th></tr>-->
                        <!--<tr>-->
                            <!--<td>商品总数</td>-->
                            <!--<td><a href="product/index/">0</a></td>-->
                        <!--</tr>-->
                    <!--</table>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

        <!--弹窗区域-->
        <?php echo $_smarty_tpl->getSubTemplate ("index/modal.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <div class="clear"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>