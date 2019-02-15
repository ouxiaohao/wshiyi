$(function(){
    // 文章列表缩略图
    $('article section div.image').hover(function(){
        $(this).find('img').stop().animate({'height':'100%'},500);
        $(this).stop().animate({'padding':'0'},500);
    },function(){
        $(this).stop().animate({'padding':'0.05rem'},500);
        $(this).find('img').stop().animate({'height':'1.58rem'},500);
    });

    // sidebar定位
    var aside = $('#aside');
    var startTop = aside.offset().top;// aside到顶部的初始距离
    var asideWidth = aside.width();

    $(window).bind("scroll",function(){

        var moveTop=$(this).scrollTop();//当前窗口的滚动距离

        var fixedTop = 75;
        if (moveTop<fixedTop) {
            aside.css({
                'position': 'static'
            })
        }else{
            aside.css({
                'position': 'fixed',
                'top': startTop - fixedTop,
                'width': asideWidth,
                'margin-top':0
            })
        }
    })




});
















// 百度统计
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?917d8aa23a16f6c3f29f0f072661b69e";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();
