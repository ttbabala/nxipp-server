$(document).ready(function(){
$("#layout-t span:first").addClass("current");
$("#layout-x span:first").addClass("current");
$("#layout-t .tab-bd-con:gt(0)").hide();
$("#layout-x .tab-bd-con-new:gt(0)").hide();
$("#layout-t span").mouseover(function(){//mouseover 改为 click 将变成点击后才显示，mouseover是滑过就显示
$(this).addClass("current").siblings("span").removeClass("current");
$("#layout-t .tab-bd-con:eq("+$(this).index()+")").show().siblings(".tab-bd-con").hide().addClass("current");
$("#layout-t .tab-bd-con-new:eq("+$(this).index()+")").show().siblings(".tab-bd-con-new").hide().addClass("current");
});
$("#layout-x span").mouseover(function(){//mouseover 改为 click 将变成点击后才显示，mouseover是滑过就显示
$(this).addClass("current").siblings("span").removeClass("current");
$("#layout-x .tab-bd-con:eq("+$(this).index()+")").show().siblings(".tab-bd-con").hide().addClass("current");
$("#layout-x .tab-bd-con-new:eq("+$(this).index()+")").show().siblings(".tab-bd-con-new").hide().addClass("current");
});
});

