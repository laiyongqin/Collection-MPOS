<?php /* Smarty version 3.1.27, created on 2016-07-28 16:26:48
         compiled from "/mnt/www/www.huibao.com/application/views/novice/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:17640595305799c1c8732216_18633465%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ae56487023198b14245bb6f16358f79205dcf8e' => 
    array (
      0 => '/mnt/www/www.huibao.com/application/views/novice/index.html',
      1 => 1469694407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17640595305799c1c8732216_18633465',
  'variables' => 
  array (
    'pageContent' => 0,
    'key' => 0,
    'pageTotal' => 0,
    'noviceCateList' => 0,
    'vo' => 0,
    'v' => 0,
    'cateInfo' => 0,
    'data' => 0,
    'page' => 0,
    'articleInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5799c1c879df46_92376871',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5799c1c879df46_92376871')) {
function content_5799c1c879df46_92376871 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17640595305799c1c8732216_18633465';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<link type="text/css" href="/public/css/novice.css" rel="stylesheet">

<style>
    html, body { font-family:"微软雅黑"; width:100%; height:100%; overflow:hidden;
        margin: 0;
        padding: 0;
        overflow:auto !important;
    }
    .footer   { margin-top:0;}
    #fb7 #fb7-about a{color:#333;}
</style>


<!-- BEGIN FLIPBOOK STRUCTURE -->
<div data-template="true" data-cat="book7" id="fb7-ajax" style="margin-top:3%;">
    <!-- BEGIN HTML BOOK -->
    <div data-current="book7" class="fb7" id="fb7">
        <!-- preloader -->
        <div class="fb7-preloader">
            <div id="wBall_1" class="wBall">
                <div class="wInnerBall">
                </div>
            </div>
            <div id="wBall_2" class="wBall">
                <div class="wInnerBall">
                </div>
            </div>
            <div id="wBall_3" class="wBall">
                <div class="wInnerBall">
                </div>
            </div>
            <div id="wBall_4" class="wBall">
                <div class="wInnerBall">
                </div>
            </div>
            <div id="wBall_5" class="wBall">
                <div class="wInnerBall">
                </div>
            </div>
        </div>



        <!-- BEGIN CONTAINER BOOK -->
        <div id="fb7-container-book">

            <!-- 分页链接 -->
            <section id="fb7-deeplinking">
                <ul>
                    <li data-address="page1" data-page="1"></li>
                    <?php if ($_smarty_tpl->tpl_vars['pageContent']->value) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['pageContent']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                    <li data-address="page<?php echo $_smarty_tpl->tpl_vars['key']->value+2;?>
" data-page="<?php echo $_smarty_tpl->tpl_vars['key']->value+2;?>
"></li>
                    <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                    <?php }?>
                    <li data-address="page<?php echo $_smarty_tpl->tpl_vars['pageTotal']->value+2;?>
" data-page="<?php echo $_smarty_tpl->tpl_vars['pageTotal']->value+2;?>
"></li>
                </ul>
            </section>
            <!-- END deep linking -->


            <!-- 目录 -->
            <section id="fb7-about" style=" left:2%; width:57% !importan; z-index:9999 !important;">


                <!-- 分级目录 -->
                <div class="fb7-menu">
                    <?php if ($_smarty_tpl->tpl_vars['noviceCateList']->value) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['noviceCateList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                    <div class="hang">
                        <div class="tit">
                            <strong><?php echo $_smarty_tpl->tpl_vars['vo']->value['cateInfo']['nc_name'];?>
</strong>
                        </div>
                        <div class="con">
                            <?php if ($_smarty_tpl->tpl_vars['vo']->value['sonList']) {?>
                            <?php
$_from = $_smarty_tpl->tpl_vars['vo']->value['sonList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                            <a href="/novice?cate=<?php echo $_smarty_tpl->tpl_vars['v']->value['cateInfo']['nc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['cateInfo']['nc_name'];?>
</a>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            <?php }?>
                        </div>
                    </div>
                    <div class="clear10"></div>
                    <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                    <?php }?>

                </div>

                <!-- 列表 -->
                <div class="fb7-news">
                    <div class="tit"><?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['nc_name'];?>
</div>
                    <div id="list">
                    <ul class="fb7-list" >
                        <?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                        <li><a href="/novice/index/?cate=<?php echo $_smarty_tpl->tpl_vars['vo']->value['nc_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['n_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['n_title'];?>
</a></li>
                        <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                        <?php }?>
                    </ul>
                    <div class="clear"></div>
                    <div class="page-updown">
                        <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                    </div>
                        </div>
                </div>

                <div class="novice-data">
                    <iframe width="658px" height="180px" frameborder="0" src="http://www.hainancec.com/otc/otc/index/list.jsp" scrolling="no"></iframe>
                </div>

            </section>
            <!-- END ABOUT -->


            <!-- BEGIN PAGES -->
            <div id="fb7-book" style="background:#fff;">
                <!-- BEGIN PAGE 1 -->
                <div style="background-image:url(/public/images/1.jpg)" class="fb7-noshadow">
                    <div class="tit"><?php echo $_smarty_tpl->tpl_vars['articleInfo']->value['n_title'];?>
</div>
                    <!-- begin container page book -->
                    <div class="fb7-cont-page-book">
                        <!-- description for page -->
                        <div class="fb7-page-book">
                        </div>
                    </div>
                    <!-- end container page book -->
                </div>
                <!-- END PAGE 1 -->


                <?php if ($_smarty_tpl->tpl_vars['pageContent']->value) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['pageContent']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vo']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['vo']->value) {
$_smarty_tpl->tpl_vars['vo']->_loop = true;
$foreach_vo_Sav = $_smarty_tpl->tpl_vars['vo'];
?>
                <!-- BEGIN PAGE 2 -->
                <div style="background-image:url(/public/images/3.jpg)">
                    <!-- begin container page book -->
                    <div class="fb7-cont-page-book">
                        <!-- description for page  -->
                        <div class="fb7-page-book">
                            <?php echo $_smarty_tpl->tpl_vars['vo']->value;?>

                        </div>
                        <!-- begin number page -->
                        <!--<div class="fb7-meta">-->
                        <!--<span class="fb7-num"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span>-->
                        <!--</div>-->
                        <!-- end number page -->
                    </div>
                    <!-- end container page book -->
                </div>
                <!-- END PAGE 2 -->
                <?php
$_smarty_tpl->tpl_vars['vo'] = $foreach_vo_Sav;
}
?>
                <?php }?>
                <!-- BEGIN PAGE 12 -->
                <div style="background-image:url(/public/images/end.jpg)">
                    <a href="/" target="_blank"><div class="fb7-cont-page-book">
                        <div class="fb7-page-book">
                        </div>
                    </div></a>
                </div>
                <!-- END PAGE 12 -->
            </div>
            <!-- END PAGES -->


            <!-- 翻页 -->
            <a class="fb7-nav-arrow prev"></a>
            <a class="fb7-nav-arrow next"></a>

            <!-- shadow -->
            <div class="fb7-shadow"></div>

        </div>
        <!-- END CONTAINER BOOK -->

        <!-- 底部内容 -->
        <div id="fb7-footer" style="display:none;">

            <div class="fb7-bcg-tools"></div>

            <div class="fb7-menu" id="fb7-center">
                <ul>

                    <!-- margin left -->
                    <li></li>

                    <!-- icon_zoom_in -->
                    <li>
                        <a title="放大" class="fb7-zoom-in"></a>
                    </li>


                    <!-- icon_zoom_out -->
                    <li>
                        <a title="缩小" class="fb7-zoom-out"></a>
                    </li>


                    <!-- icon_zoom_auto -->
                    <li>
                        <a title="自动" class="fb7-zoom-auto"></a>
                    </li>


                    <!-- icon_zoom_original -->
                    <li>
                        <a title="还原" class="fb7-zoom-original"></a>
                    </li>


                    <!-- icon_home -->
                    <li>
                        <a title="目录" class="fb7-home"></a>
                    </li>

                    <!-- icon fullscreen -->
                    <li>
                        <a title="全屏" class="fb7-fullscreen"></a>
                    </li>

                    <!-- margin right -->
                    <li></li>

                </ul>
            </div>

        </div>
        <!-- END FOOTER -->

    </div>
    <!-- END HTML BOOK -->


</div>
<!-- END FLIPBOOK STRUCTURE -->

<!-- END FLIPBOOK STRUCTURE -->
<!-- END FLIPBOOK STRUCTURE -->
<?php echo '<script'; ?>
 src="/public/js/turn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/jquery.fullscreen.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/jquery.address-1.6.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/onload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/public/js/lp.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $('#fb7-ajax').data('config',
            {
                "page_width":"800",
                "page_height":"920",
                "go_to_page":"Page",
                "gotopage_width":"45",
                "zoom_double_click":"1",
                "zoom_step":"0.06",
                "tooltip_visible":"true",
                "toolbar_visible":"true",
                "deeplinking_enabled":"true",
                "double_click_enabled":"true",
                "rtl":"false"
            })
    function getList(url){
        $.ajax({
            type: 'POST',
            data : {type : 'load'},
            url : url,
            dataType: 'html',
            success: function(data) {
                if (data) {
                    //赋值数据
                    $("#list").html(data);
                }
            }
        });
    }

    $(document).ready(function(){
        $(".novice-data a").click(function(){
            $(".novice-data .con").slideToggle("slow");
        });
    })

    $(document).ready(function(){
        $("#fb7 .fb7-menu .hang").hover(function(){
            $(this).children("#fb7 .fb7-menu .hang .con").fadeToggle("slow");
        });
    });

<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>