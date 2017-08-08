<?php /* Smarty version 3.1.27, created on 2016-08-08 16:04:20
         compiled from "/mnt/www/www.huibao.com/application/views/regal/strategy.html" */ ?>
<?php
/*%%SmartyHeaderCode:138797235057a83d04920ae2_86104668%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1991be2f9ca77f6626dee1f21842a547b4370e66' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/regal/strategy.html',
      1 => 1470643458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138797235057a83d04920ae2_86104668',
  'variables' => 
  array (
    'id' => 0,
    'cateInfo' => 0,
    'regalCategory' => 0,
    'vo' => 0,
    'voson' => 0,
    'data' => 0,
    'tradeData' => 0,
    'type' => 0,
    'v' => 0,
    'v2' => 0,
    'cateList' => 0,
    'sunData' => 0,
    'sk' => 0,
    'sv' => 0,
    'nightData' => 0,
    'nk1' => 0,
    'nv' => 0,
    'weekData' => 0,
    'wk' => 0,
    'wv' => 0,
    'monData' => 0,
    'nk2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57a83d049baf26_65521291',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57a83d049baf26_65521291')) {
function content_57a83d049baf26_65521291 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/mnt/www/www.huibao.com/application/library/Smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '138797235057a83d04920ae2_86104668';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<style>
    .pagination{width:100%; margin:0 auto 20px; text-align: center;}
    .pagination a{color:#fff; display: inline-block;width:25px;height:25px; line-height:25px; margin:0 5px;border:solid 1px #fff; border-radius:3px; background: rgba(0,0,0,.5); text-align: center; background: #1f2e5b; font-size: 13px;}
    .pagination .current{ background: #ff6519 ;}
    .pagination a:hover{ background: #ff6519;}

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
} elseif ($_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'] == 11) {?> href="/regal/instant?id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_id'];
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
"<?php } else { ?>href="/regal?id=<?php echo $_smarty_tpl->tpl_vars['voson']->value['cateInfo']['nc_id'];?>
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
        <div class="strategy-tit">智能预测交易走向   让交易变得简单</div>

        <div class="list1">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                <li>
                    <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['n_id'];?>
">
                        <div class="time"><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['n_addtime'];?>
</div>
                        <div class="text"><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['n_des'];?>
</div>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- 选项卡 -->
        <div class="strategy-tab">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['tradeData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['tradeData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                <li <?php if ($_smarty_tpl->tpl_vars['type']->value == $_smarty_tpl->tpl_vars['v']->value['tt_id']) {?>class="cur"<?php }?>><a href="strategy?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['v']->value['tt_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['tt_name'];?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                <?php }?>
            </ul>
            <div class="con block">
                <?php if ($_smarty_tpl->tpl_vars['tradeData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['tradeData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->value) {
$_smarty_tpl->tpl_vars['v2']->_loop = true;
$foreach_v2_Sav = $_smarty_tpl->tpl_vars['v2'];
?>
                <p <?php if ($_smarty_tpl->tpl_vars['type']->value == $_smarty_tpl->tpl_vars['v2']->value['tt_id']) {?>class="on"<?php }?>>
                    <span class="date_time"><?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M');?>
</span>
                    <span class="img"><img src="<?php echo @constant('IMAGE_URL');
echo $_smarty_tpl->tpl_vars['v2']->value['ts_cover'];?>
" width="15" height="15"></span>
                    <span><i><img src="/public/images/strategy_tb1.png" width="15" height="15"></i>目标：<?php echo $_smarty_tpl->tpl_vars['v2']->value['ts_target'];?>
</span>
                    <span><i><img src="/public/images/strategy_tb2.png" width="15" height="15"></i>止损：<?php echo $_smarty_tpl->tpl_vars['v2']->value['ts_loss'];?>
</span>
                    <span class="red"><i><img src="/public/images/strategy_tb3.png" width="15" height="15"></i>买入：<?php echo $_smarty_tpl->tpl_vars['v2']->value['ts_purchase'];?>
</span>
                </p>
                <?php
$_smarty_tpl->tpl_vars['v2'] = $foreach_v2_Sav;
}
?>
                <?php }?>
                <div style="text-align: center;color:#fff;margin-bottom: 10px; font-size: 12px;padding-top:30px;">个人建议，仅供参考，投资有风险，入市需谨慎。</div>
            </div>

        </div>

        <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
        <!--早评-->
        <div class="news-tit"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[0]['nc_name'];?>
<a href="strategylist?id=<?php echo $_smarty_tpl->tpl_vars['cateList']->value[0]['nc_id'];?>
">more<i><img src="/public/images/more.png" width="5" height="9"></i></a></div>
        <div class="list3">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['sunData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['sunData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sv']->_loop = false;
$_smarty_tpl->tpl_vars['sk'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['sk']->value => $_smarty_tpl->tpl_vars['sv']->value) {
$_smarty_tpl->tpl_vars['sv']->_loop = true;
$foreach_sv_Sav = $_smarty_tpl->tpl_vars['sv'];
?>
                <?php if ($_smarty_tpl->tpl_vars['sk']->value < 2) {?>
                <li><a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['sv']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[0]['nc_name'];?>
：<?php echo $_smarty_tpl->tpl_vars['sv']->value['n_title'];?>
<span><?php echo $_smarty_tpl->tpl_vars['sv']->value['n_addtime'];?>
</span></a></li>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['sv'] = $foreach_sv_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
        <!--晚评-->
        <div class="news-tit"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[1]['nc_name'];?>
<a href="strategylist?id=<?php echo $_smarty_tpl->tpl_vars['cateList']->value[1]['nc_id'];?>
">more<i><img src="/public/images/more.png" width="5" height="9"></i></a></div>
        <div class="list3">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['nightData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['nightData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['nv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['nv']->_loop = false;
$_smarty_tpl->tpl_vars['nk1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['nk1']->value => $_smarty_tpl->tpl_vars['nv']->value) {
$_smarty_tpl->tpl_vars['nv']->_loop = true;
$foreach_nv_Sav = $_smarty_tpl->tpl_vars['nv'];
?>
                <?php if ($_smarty_tpl->tpl_vars['nk1']->value < 2) {?>
                <li><a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['nv']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[1]['nc_name'];?>
：<?php echo $_smarty_tpl->tpl_vars['nv']->value['n_title'];?>
<span><?php echo $_smarty_tpl->tpl_vars['nv']->value['n_addtime'];?>
</span></a></li>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['nv'] = $foreach_nv_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
        <!--周评-->
        <div class="news-tit"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[2]['nc_name'];?>
<a href="strategylist?id=<?php echo $_smarty_tpl->tpl_vars['cateList']->value[2]['nc_id'];?>
">more<i><img src="/public/images/more.png" width="5" height="9"></i></a></div>
        <div class="list3">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['weekData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['weekData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['wv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['wv']->_loop = false;
$_smarty_tpl->tpl_vars['wk'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['wk']->value => $_smarty_tpl->tpl_vars['wv']->value) {
$_smarty_tpl->tpl_vars['wv']->_loop = true;
$foreach_wv_Sav = $_smarty_tpl->tpl_vars['wv'];
?>
                <?php if ($_smarty_tpl->tpl_vars['wk']->value < 2) {?>
                <li> <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['wv']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[2]['nc_name'];?>
：<?php echo $_smarty_tpl->tpl_vars['wv']->value['n_title'];?>
<span><?php echo $_smarty_tpl->tpl_vars['wv']->value['n_addtime'];?>
</span></a></li>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['wv'] = $foreach_wv_Sav;
}
?>
                <?php }?>
            </ul>
        </div>
        <!--月评-->
        <div class="news-tit"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[3]['nc_name'];?>
<a href="strategylist?id=<?php echo $_smarty_tpl->tpl_vars['cateList']->value[3]['nc_id'];?>
">more<i><img src="/public/images/more.png" width="5" height="9"></i></a></div>
        <div class="list3">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['monData']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['monData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['nv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['nv']->_loop = false;
$_smarty_tpl->tpl_vars['nk2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['nk2']->value => $_smarty_tpl->tpl_vars['nv']->value) {
$_smarty_tpl->tpl_vars['nv']->_loop = true;
$foreach_nv_Sav = $_smarty_tpl->tpl_vars['nv'];
?>
                <?php if ($_smarty_tpl->tpl_vars['nk2']->value < 2) {?>
                <li> <a href="/news/details?id=<?php echo $_smarty_tpl->tpl_vars['nv']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cateList']->value[3]['nc_name'];?>
：<?php echo $_smarty_tpl->tpl_vars['nv']->value['n_title'];?>
<span><?php echo $_smarty_tpl->tpl_vars['nv']->value['n_addtime'];?>
</span></a></li>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['nv'] = $foreach_nv_Sav;
}
?>
                <?php }?>
            </ul>
        </div>


        <?php }?>
    </div>

    <div class="sidebar">
        <div class="box data1">
            <div class="title">国际市场数据</div>
            <div class="con"><iframe id="bottomprice" name="bottomprice" src="http://www.jin10.com/bottomprice/indexp.html" scrolling="no" width="342" frameborder="0" height="253"></iframe></div>
        </div>
        <div class="box data2">
            <div class="title">海南大宗市场数据</div>
            <div class="con"><iframe width="372px" height="180px" frameborder="0" src="http://www.hainancec.com/otc/otc/index/list.jsp" scrolling="no"></iframe> </div></div>
        <div class="box" style="height:250px;">
            <div class="title">全球指数</div>
            <div class="con" style="padding-left: 50px;"><iframe width="372px" height="430px" frameborder="0" src="http://stock.10jqka.com.cn/api/stock_10.html" scrolling="no"></iframe> </div>
        </div>
    </div>


</div>
<div class="clear"></div>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>