<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<body> 
    <div id="main">
         <div id="logo"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/balloon_fdb9722.png" /></div>
         <div id="logo-text"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/logo-text_0f1b4c4.png" /></div>
         <div id="callboard"> 
               <ul>                     
                    <?php 
                                $args = array(
                                   'cat' => 4,
                                   'showposts' => 3,
                                );
                                query_posts($args);
                                if(have_posts()) : while (have_posts()) : the_post();  
                            ?>                       
                            <li> 
                                <span style="color: moccasin"><img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/notice-icon.png" width="15px" height="15px"/><a href="javascript:;" value="<?php the_ID();?>" title="<?php the_title(); ?>" content="<?php the_content()?>" style="margin-left:10px;padding-top:10px;"><?php the_title(); ?></a></span> 
                            </li> 
                           <!-- <li style="margin-top: 0px;"> 
                                <a href="http://www.jb51.net"><img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/notice-icon.png" width="15px" height="15px"/>：前端组主题正在整理�?..有需要用的朋友请留个�?，以方便及时通知�?</a> 
                            </li>  -->
                            <?php  endwhile; endif; wp_reset_query(); ?>   

               </ul> 
         </div>
         <div id="button-download">
                <a href="javascript:;" target="_blank" class="i-bbt" id="pop-layer">关于我们</a> 
                <a href="javascript:;" target="_blank" class="i-bbt" id="pop-contact">联系我们</a> 
         </div>
         <div id="nav"> 
                <ul> 
                 <li> <a href="http://www.nxipp.com/zysx/" target="_blank" id="link-about"> <span class="link-text-wrapper"> <span class="link-text"> <em class="link-icon"></em>专业实训 </span> </span> </a> </li> 
                 <li> <a href="http://www.nxipp.com/yxzy/" target="_blank" id="link-log"> <span class="link-text-wrapper"> <span class="link-text"> <em class="link-icon"></em>优秀作业 </span> </span> </a> </li> 
                 <li> <a href="http://www.nxipp.com/cxcy/" target="_blank" id="link-guide"> <span class="link-text-wrapper"> <span class="link-text"> <em class="link-icon"></em>创新创业 </span> </span> </a> </li> 
                 <li> <a href="http://www.nxipp.com/yczp/" id="link-app" target="_blank"> <span class="link-text-wrapper"> <span class="link-text"> <em class="link-icon"></em>学科竞赛 </span> </span> </a> </li> 
                 <li> <a href="http://www.nxipp.com/gygg/" id="link-comment" target="_blank"> <span class="link-text-wrapper"> <span class="link-text"> <em class="link-icon"></em>公益广告 </span> </span> </a> </li> 
                </ul> 
                <div id="nav-overlay"></div> 
         </div>
        <div class="side-bar"> 
            <a href="#" class="icon-chat">学院公众号<div class="chat-tips"><i></i><img style="width:138px;height:138px;" src="<?php echo get_stylesheet_directory_uri() ?>/img/code.jpg" alt="微信订阅�?"></div></a> 
            <a href="http://xwcbxy.nxu.edu.cn/" class="icon-qq">返回学院站</a>
            <a href="http://www.nxipp.com" class="icon-mail">工作站</a> 
            <a target="_blank" href="#" class="icon-blog">友情链接</a> 
        </div>  
    </div>
         <script type="text/javascript">
            $('.pop-notice').on('click', function(){
                 var nid = $(this).attr("value");
                 var ntitle = $(this).attr("title");
                 var content = $(this).attr("content");
                 layer.open({
                        type: 1,
                        skin: 'layui-layer-lan',
                        title: '<img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/notice-icon.png" width="15px" height="15px"/>&nbsp;'+ ntitle,
                        area: ['600px', '233px'],
                        shadeClose: true, //点击遮罩关闭
                        content: '<div class="notice-pop">'+ content +'</div>'
                 });

            });
        </script>
<?php get_footer();
