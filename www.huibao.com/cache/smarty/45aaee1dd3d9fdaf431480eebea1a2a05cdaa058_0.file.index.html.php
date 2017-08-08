<?php /* Smarty version 3.1.27, created on 2016-07-19 11:58:36
         compiled from "/mnt/www/www.huibao.com/application/views/regal/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:1532368567578da56c895df1_44379680%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45aaee1dd3d9fdaf431480eebea1a2a05cdaa058' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/regal/index.html',
      1 => 1468900715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1532368567578da56c895df1_44379680',
  'variables' => 
  array (
    'id' => 0,
    'cateInfo' => 0,
    'regalCategory' => 0,
    'vo' => 0,
    'voson' => 0,
    'first' => 0,
    'picData' => 0,
    'key' => 0,
    'fv1' => 0,
    'testData' => 0,
    'key2' => 0,
    'fv2' => 0,
    'data' => 0,
    'v' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578da56c90f847_46539145',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578da56c90f847_46539145')) {
function content_578da56c90f847_46539145 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1532368567578da56c895df1_44379680';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<style>
    .pagination{width:100%; margin:0 auto 20px; text-align: center;}
    .pagination a{color:#fff; display: inline-block;width:25px;height:25px; line-height:25px; margin:0 5px;border:solid 1px #fff; border-radius:3px; background: rgba(0,0,0,.5); text-align: center; background: #1f2e5b; font-size: 13px;}
    .pagination .current{ background: #ff6519 ;}
    .pagination a:hover{ background: #ff6519;}
    .on{color:#ef3e39!important;}
</style>
<!-- 页面主体 -->
<div class="main_vb">
    <div class="news block2">
        <div class="nav-title">
            <div class="crumb"><a href="/index"><i><img src="/public/images/home.png" width="14" height="13"></i>首页</a> > <a href="/regal?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_name'];?>
</a></div>
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['regalCategory']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['regalCategory']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                <li>
                    <a <?php if ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 13) {?>href="/regal/strategy?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
} elseif ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 11) {?>href="/regal/instant?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
} elseif ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 12) {?>href="/regal?id=14<?php } else { ?>href="/regal?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
}?>" <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id']) {?>class='on'<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_name'];?>
<i></i></a>
                    <ul class="menu">
                        <?php if ($_smarty_tpl->tpl_vars['vo']->value['sonList']) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['vo']->value['sonList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['voson'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['voson']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['voson']->value) {
$_smarty_tpl->tpl_vars['voson']->_loop = true;
$foreach_voson_Sav = $_smarty_tpl->tpl_vars['voson'];
?>
                        <li><a <?php if ($_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 19 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 20 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 20 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 21 || $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'] == 22) {?> href="/regal/strategylist?id=<?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'];?>
"<?php } else { ?>href="/regal/?id=<?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_name'];?>
</a></li>
                        <?php
$_smarty_tpl->tpl_vars['voson'] = $foreach_voson_Sav;
}
?>
                        <?php }?>
                    </ul>
                </li>
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                <?php }?>
                <li><a href="/financeDate">财经日历</a><i></i>
            </ul>
            <div class="menu-bj"></div>
        </div>
    <?php if ($_smarty_tpl->tpl_vars['first']->value) {?>
        <div class="news-tit">国际新闻<a href="/regal/firstinfo?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">more<i><img src="/public/images/more.png" width="5" height="9"></i></a></div>
        <div class="list2">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['picData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['picData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['fv1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['fv1']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['fv1']->value) {
$_smarty_tpl->tpl_vars['fv1']->_loop = true;
$foreach_fv1_Sav = $_smarty_tpl->tpl_vars['fv1'];
?>
                <?php if ($_smarty_tpl->tpl_vars['key']->value < 3) {?>
                <li>
                    <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['fv1']->value['n_id'];?>
&nc_id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <div class="img"><img src="<?php if ($_smarty_tpl->tpl_vars['fv1']->value['n_cover']) {
echo $_smarty_tpl->tpl_vars['fv1']->value['n_cover'];
} else { ?>/public/images/list_img.jpg<?php }?>" width="134" height="94"></div>
                        <div class="right">
                            <h4><?php echo $_smarty_tpl->tpl_vars['fv1']->value['n_title'];?>
</h4>
                            <div class="text">
                                <?php echo $_smarty_tpl->tpl_vars['fv1']->value['n_content'];?>
<span><?php echo $_smarty_tpl->tpl_vars['fv1']->value['n_addtime'];?>
</span>
                            </div>
                        </div>
                    </a>
                </li>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['fv1'] = $foreach_fv1_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
        <div class="news-tit">国内新闻<a href="/regal/firsttest?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">more<i><img src="/public/images/more.png" width="5" height="9"></i></a></div>
        <div class="list4">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['testData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['testData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['fv2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['fv2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['fv2']->value) {
$_smarty_tpl->tpl_vars['fv2']->_loop = true;
$foreach_fv2_Sav = $_smarty_tpl->tpl_vars['fv2'];
?>
                <?php if ($_smarty_tpl->tpl_vars['key2']->value < 5) {?>
                <li><a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['fv2']->value['n_id'];?>
&nc_id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['fv2']->value['n_title'];?>
<span><?php echo $_smarty_tpl->tpl_vars['fv2']->value['n_addtime'];?>
</span></a></li>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['fv2'] = $foreach_fv2_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
    <?php } else { ?>
        <div class="list2">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                <li>
                    <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['n_id'];?>
&nc_id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <div class="img"><img src="<?php if ($_smarty_tpl->tpl_vars['v']->value['n_cover']) {
echo $_smarty_tpl->tpl_vars['v']->value['n_cover'];
} else { ?>/public/images/list_img.jpg<?php }?>" width="134" height="94"></div>
                        <div class="right">
                            <h4><?php echo $_smarty_tpl->tpl_vars['v']->value['n_title'];?>
</h4>
                            <div class="text">
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['n_content'];?>
<span><?php echo $_smarty_tpl->tpl_vars['v']->value['n_addtime'];?>
</span>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
        <!-- 分页 -->
        <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
        <nav>
            <ul class="pagination pull-right"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</ul>
        </nav>
        <?php }?>
    <?php }?>
</div>

    <?php echo $_smarty_tpl->getSubTemplate ("common/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="clear"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>