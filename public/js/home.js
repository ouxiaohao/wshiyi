$(function(){
    $('article section div.image').hover(function(){
        $(this).find('img').stop().animate({'height':'100%'},500);
        $(this).stop().animate({'padding':'0'},500);
    },function(){
        $(this).stop().animate({'padding':'0.05rem'},500);
        $(this).find('img').stop().animate({'height':'1.58rem'},500);
    })
})
















// 百度统计
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?b7e35726054a0a3babd1b4228b453b3b";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();