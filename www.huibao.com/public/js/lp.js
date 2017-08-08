$(document).ready(function() {

//下拉菜单
    $('.nav-title li').hover(function() {
        var menuList = $(this).find('.menu li').html().length;
        if(menuList){
            $(this).find('.menu').show();
            $(this).find('i').show();
        }
        $(this).find('.menu').fadeIn(300); $(this).find('i').fadeIn();
    }, function() {
        $(this).find('.menu').fadeOut(200); $(this).find('i').fadeOut();
    });

    var popup_height=$(".popup").height();
    $(".popup-bj").fadeIn(500);
    $(".popup").animate({left:'50%',bottom:'50%'},"slow");


//弹出框
    $(".weixin,.con6").click(function(){
        $(".frame,.frame-bj").fadeIn();
    });
    $(".con5").click(function(){
        $(".frame2,.frame-bj").fadeIn();
    });
    $(".close").click(function(){
        $(".frame,.frame2,.frame-bj,.popup,.popup-bj").fadeOut();
    });

//
    $(".con1,.con2,.con3").mouseover(function(){
        $(this).children(".title,.title2").hide()
        $(this).children(".text").css("display","block");
    });
    $(".main a").mouseleave(function(){
        $(this).children(".text").hide();
        $(this).children(".title,.title2").fadeIn();
    });



//选项卡
    $(".strategy-tab ul li").click(function(){
        $(".strategy-tab ul li").eq($(this).index()).addClass("cur").siblings().removeClass('cur');
        $(".strategy-tab .con p").hide().eq($(this).index()).css("display","table");
    });

    $("#bb-nav-first").click(function(){
        $(".catalog").fadeIn(500);
    });
    $("#bb-nav-next").click(function(){
        $(".catalog").fadeOut(500);
    });
    $("#bb-nav-prev").click(function(){
        $(".catalog").fadeOut(500);
    });

    /*拖拽
     $(document).ready(function()
     {
     $(".novice-data").mousedown(function(e)//e鼠标事件
     {
     $(this).css("cursor","move");//改变鼠标指针的形状

     var offset = $(this).offset();//DIV在页面的位置
     var x = e.pageX - offset.left;//获得鼠标指针离DIV元素左边界的距离
     var y = e.pageY - offset.top;//获得鼠标指针离DIV元素上边界的距离
     $(document).bind("mousemove",function(ev)//绑定鼠标的移动事件，因为光标在DIV元素外面也要有效果，所以要用doucment的事件，而不用DIV元素的事件
     {
     $(".novice-data").stop();//加上这个之后

     var _x = ev.pageX - x;//获得X轴方向移动的值
     var _y = ev.pageY - y;//获得Y轴方向移动的值

     $(".novice-data").animate({left:_x+"px",top:_y+"px"},10);
     });
     });
     $(document).mouseup(function()
     {
     $(".novice-data").css("cursor","default");
     $(this).unbind("mousemove");
     })
     })


     $(document).ready(function(){
     $(".novice-data a").click(function(){
     $(".novice-data .con").slideToggle("slow");
     });
     });
     */

//六大优势
    $(".frame2 .list a").hover(function(){
        $(this).children(".clone1").children("img").animate({left:'160px',opacity:'0'});
        $(this).children(".clone1").children(".words").animate({left:'-160px',opacity:'0'});
        $(this).children(".clone2").children("img").animate({left:'0px',opacity:'1'});
        $(this).children(".clone2").children(".words").animate({left:'0px',opacity:'1'});
    });

    $(".frame2 .list a").mouseleave(function(){
        $(this).children(".clone1").children("img").animate({left:'0',opacity:'1'});
        $(this).children(".clone1").children(".words").animate({left:'0',opacity:'1'});
        $(this).children(".clone2").children("img").animate({left:'-160px',opacity:'0'});
        $(this).children(".clone2").children(".words").animate({left:'160px',opacity:'0'});
    });


}); 


