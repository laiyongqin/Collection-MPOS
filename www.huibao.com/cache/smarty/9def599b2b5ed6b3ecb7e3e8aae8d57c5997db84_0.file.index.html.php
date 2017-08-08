<?php /* Smarty version 3.1.27, created on 2016-07-28 16:26:24
         compiled from "/mnt/www/www.huibao.com/application/views/financedate/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:19469426445799c1b0728484_34929144%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9def599b2b5ed6b3ecb7e3e8aae8d57c5997db84' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/financedate/index.html',
      1 => 1469694282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19469426445799c1b0728484_34929144',
  'variables' => 
  array (
    'regalCategory' => 0,
    'vo' => 0,
    'id' => 0,
    'voson' => 0,
    'today' => 0,
    'lastWeekOne' => 0,
    'list' => 0,
    'nextWeekOne' => 0,
    'calendarInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799c1b079a9a5_32498936',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799c1b079a9a5_32498936')) {
function content_5799c1b079a9a5_32498936 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19469426445799c1b0728484_34929144';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<link href="/public/css/lq.datetimepick.css" rel="stylesheet">
<link href="/public/css/rili.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="/public/js/selectUi.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/lq.datetimepick.js"><?php echo '</script'; ?>
>
<style>
    html, body { font-family:"微软雅黑";
        margin: 0;
        padding: 0;
    }
</style>
<!-- 页面主体 -->
<div class="calendar block2">
    <div class="nav-title news">
        <div class="nav-title">
            <div class="crumb"><a href="/index"><i><img src="/public/images/home.png" width="14" height="13"></i>首页</a></div>
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
                <li><a href="/financeDate" style="color:#c33;">财经日历</a><i></i></li>
            </ul>
            <div class="menu-bj"></div>
        </div>
    </div>

    <div class="con">
        <div class="select-time block" ><a><input name="date" id="date" type="text" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" ><span id="selectDate">选择日期</span></a></div>
        <div class="week">
            <ul>
                <li><a href="/financeDate?day=<?php echo $_smarty_tpl->tpl_vars['lastWeekOne']->value;?>
"><span>上一周</span></a></li>
                <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                <li <?php if ($_smarty_tpl->tpl_vars['vo']->value['day'] == $_smarty_tpl->tpl_vars['today']->value) {?>class="on"<?php }?>>
                    <a href="/financeDate?day=<?php echo $_smarty_tpl->tpl_vars['vo']->value['day'];?>
">
                        <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['tip'];?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['show'];?>
</p>
                    </a>
                </li>
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                   <li><a href="/financeDate?day=<?php echo $_smarty_tpl->tpl_vars['nextWeekOne']->value;?>
"><span>下一周</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="time-tit"><?php echo $_smarty_tpl->tpl_vars['today']->value;?>
  财经数据一览</div>
        <div class="calendar-embed">
        <?php echo $_smarty_tpl->tpl_vars['calendarInfo']->value['fc_content'];?>

        </div>

    </div>
</div>
<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $("#date").on("click",function(e){
            e.stopPropagation();
            var object = $(this);
            $(this).lqdatetimepicker({
                css : 'datetime-day',
                dateType : 'D',
                selectback : function(){
                    location.href = '/financeDate?day=' + object.val();
                }
            });

        });

        $('#date').change(function(){
            location.href = '/financeDate?day=' + $(this).val();
        });

        $('#selectDate').click(function(){
            $('#date').click();
        });
    })

    function getMore(that){
        if($('#moreData').is(':hidden')){
            $('#moreData').show();
            $(that).html("点击收起");
        }else{
            $('#moreData').hide();
            $(that).html("查看完整交易日数据");
        }
    }
    function getEventMore(that){
        if($('#next_event').is(':hidden')){
            $('#next_event').show();
            $(that).html("点击收起");
        }else{
            $('#next_event').hide();
            $(that).html("查看完整交易日大事�");
        }
    }
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>