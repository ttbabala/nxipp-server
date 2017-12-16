$(document).ready(function(){
$("#layout-t span:first").addClass("current");
$("#layout-t .tab-bd-con:gt(0)").hide();
$("#layout-t span").mouseover(function(){//mouseover 改为 click 将变成点击后才显示，mouseover是滑过就显示
$(this).addClass("current").siblings("span").removeClass("current");
$("#layout-t .tab-bd-con:eq("+$(this).index()+")").show().siblings(".tab-bd-con").hide().addClass("current");
});
});

