<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<script type="text/javascript">
$('#pop-layer').on('click', function(){
    layer.open({
      type: 1,
      skin: 'layui-layer-lan',
      title:'| 关于我们-AboutUs ',
      area: ['600px', '403px'],
      shadeClose: true, //点击遮罩关闭
      content: '<div class="aboutus-pop"><?php
$array_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(14), 'full'); ?>
<img src=<?php echo $array_image_url[0]; ?> /><?php echo get_post(14)->post_content; ?></div>'
    });
  });
</script>
<script type="text/javascript">
    $('#pop-contact').on('click', function(){
    layer.open({
      type: 1,
      skin: 'layui-layer-lan',
      title:'| 联系我们-ContactUs ',
      area: ['600px', '378px'],
      shadeClose: true, //点击遮罩关闭
      content: '<div class="contactus-pop"><?php
$array_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(20), 'full'); ?>
<img src=<?php echo $array_image_url[0];?> /><?php echo get_post(20)->post_content; ?></div>'
    });
  });
</script>
<!--公告板滚动--> 
<script type="text/javascript"> 
(function (win){ 
var callboarTimer; 
var callboard = $('#callboard'); 
var callboardUl = callboard.find('ul'); 
var callboardLi = callboard.find('li'); 
var liLen = callboard.find('li').length; 
var initHeight = callboardLi.first().outerHeight(true); 
win.autoAnimation = function (){ 
if (liLen <= 1) return; 
var self = arguments.callee; 
var callboardLiFirst = callboard.find('li').first(); 
callboardLiFirst.animate({ 
marginTop:-initHeight 
}, 500, function (){ 
clearTimeout(callboarTimer); 
callboardLiFirst.appendTo(callboardUl).css({marginTop:0}); 
callboarTimer = setTimeout(self, 5000); 
}); 
} 
callboard.mouseenter( 
function (){ 
clearTimeout(callboarTimer); 
}).mouseleave(function (){ 
callboarTimer = setTimeout(win.autoAnimation, 5000); 
}); 
}(window)); 
setTimeout(window.autoAnimation, 5000); 
</script> 
 </body>
</html>
