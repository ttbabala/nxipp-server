<?php
/*
Plugin Name: tab选项卡插件
Plugin URI: http://www.hq-smart.net
Description: 本插件意在解决在wordpress主题首页投放动态选项卡模块的问题
Version: 1.0
Author: zhaoxin
Author URI: http://www.hq-smart.net
*/

/* 这个函数以插件形式展示了首页焦点图及相关栏目的文章调用*/ 
function huandeng_articleList() {  
     ?>
<div id="democon">  
	<div id="p7ssm">
      <div id="p7ssm_cf">&nbsp;</div>
      <div id="p7ssm_loading"><img src="<?php echo plugin_dir_url( __FILE__ );?>/images/loading.gif" alt="" width="78" height="8" /></div>
      <table id="p7ssm_fstbl" border="0" cellpadding="0" cellspacing="0" summary="Fullsize Image">
        <tr>
          <td><div id="p7ssm_fullsize">
              <div id="p7ssm_fsc">
                <div id="p7ssm_fsw">
                  <div id="p7ssm_fsimg"><a href="javascript:;" id="p7ssm_fslink"><img src="<?php echo plugin_dir_url( __FILE__ );?>/images/biaozhi.gif" alt="" name="p7ssm_im" width="390" height="245" border="0" id="p7ssm_im" /></a></div>
                  <div id="p7ssm_description"></div>
                </div>
              </div>
            </div></td>
        </tr>
      </table>
      <div id="p7SSMwhmb">
        <div id="p7ssm_thumbs">
          <div id="p7SSMwp_1">
            <div class="p7ssm_thumb_section">
              <ul><!-- 修改内容开始 -->
                <?php  
                    $args=array(  
                        'category__in' => array(6,7,8),   // 分类ID  
                        'post__in' => get_option('sticky_posts'), // 指定所获取的文章列表属于置顶文章
                        'showposts' => 5,       //显示文章数量
                        'ignore_sticky_posts' => 1
                    );
                    query_posts($args);  
                    if(have_posts()) : while (have_posts()) : the_post();  
                ?>
                <li><a href="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>">
                    <img src="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>" alt="<?php the_title(); ?>" width="390" height="245" /></a>
                  <div class="p7ssm_lk"><a href="<?php the_permalink(); ?>">点击查看详情</a></div>
                  <div class="p7ssm_fd"><?php the_title(); ?></div>
                </li>
                <?php  endwhile; endif; wp_reset_query(); ?>  
              <!-- 修改内容结束 --></ul>
              <br class="p7ssm_clearThumbs" />
            </div>
          </div>
        </div>
      </div>
      <div id="p7ssm_toolbar">
        <div class="p7ssm_sectionTrigger"><a id="p7SSMtp_1" href="#">New Image Set</a></div>
        <div id="p7ssm_dragbar" title="Move"><span>Move</span></div>
        <div id="p7ssm_preview">   
          <table summary="Thumbnail Preview">
            <tr>
              <td><img src="<?php echo plugin_dir_url( __FILE__ );?>/images/biaozhi.gif" alt="" /></td>
            </tr>
          </table>
        </div>
        <div id="p7ssm_tools">
          <table border="0" cellpadding="0" cellspacing="0" summary="Slideshow Toolbar">
            <tr>
              <td><div id="p7ssm_nav_wrapper"><a id="p7SSMtnav" href="#" title="Menu"><em>Navigate</em></a>
                  <div id="p7SSMwnav">
                    <div id="p7ssm_navList">
                      <ul>
                        <li></li>
                      </ul>
                    </div>
                  </div>
                </div></td>
              <td><a href="#" title="Hide or Show Thumbnails" id="p7SSMthmb"><em>Hide Thumbs</em></a></td>
              <td><a href="#" id="p7ssm_first" title="First Image"><em>First</em></a></td>
              <td><a href="#" id="p7ssm_prev" title="Previous Image"><em>Previous</em></a></td>
              <td><a href="#" id="p7ssm_pp" class="p7ssm_pause" title="Pause"><em>Pause</em></a></td>
              <td><a href="#" id="p7ssm_next" title="Next Image"><em>Next</em></a></td>
              <td><a href="#" id="p7ssm_last" title="Last Image"><em>Last</em></a></td>
              <td><div id="p7ssm_slidechannel">
                  <div id="p7ssm_slider"><a href="#" id="p7ssm_slidebar" title="Speed:"><em>Set Speed</em></a></div>
                                  </div></td>
               </tr>
          </table>
        </div>
      </div>
<!--[if IE 7]>
<style>
#p7ssm, #p7ssm div {zoom: 1;}
</style><![endif]-->
<!--[if IE 6]><style>
#p7ssm a, #p7ssm, #p7ssm div, #p7ssm_thumb_wrapper {zoom: 1;}
.p7ssm_thumb_section {padding-right: 0; padding-left: 0;}
.p7ssm_thumb_section a {float: left;}
</style><![endif]-->
<!--[if IE 5]><style>
#p7ssm {}
.p7ssm_sectionTrigger {text-align: left;}
#p7ssm_navList li {float: left; clear:both; width: 100%;}
#p7ssm, #p7ssm_w1, #p7ssm_w2, #p7ssm_description, #p7ssm_preview,
#p7ssm_navList a, .p7ssm_sectionTrigger a, #p7ssm_thumbs,
.p7ssm_thumb_section, #p7ssm_fsw {height: 1%;}
.p7ssm_thumb_section {padding: 0;}
</style><![endif]-->
<!--[if IE 5.5000]><style>
#p7ssm, #p7ssm_w1, #p7ssm_w2 {zoom: 1;}
</style><![endif]-->
<script type="text/javascript">
<!--
P7_SSMinit(1,1,1,1,0,1,1,1,5);
//-->
</script>
</div>
<div class="area-sub">
  <div id="layout-t" class="tab-product tab-sub-3 ui-style-gradient">
    <h2 class="tab-hd"> <span class="tab-hd-con"><a href="javascript:">双创要闻</a></span> <span class="tab-hd-con"><a href="javascript:">政策法规</a></span> <span class="tab-hd-con"><a href="javascript:">获奖项目</a></span> </h2>
    <div class="tab-bd dom-display">
      <div class="tab-bd-con current"> 
        <ul class="m-list list-tweet">
           <?php  
                $args=array(  
                    'cat' => 6,   // 分类ID  
                    'posts_per_page' => 8, // 显示篇数
                    'post__not_in' => get_option( 'sticky_posts' ) //排除置顶文章
                );  
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
           ?>
          <li class="clearfix drink-me"><i>•</i>
              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          </li>
         <?php  endwhile; endif; wp_reset_query(); ?>  
        </ul>
      </div>
      <div class="tab-bd-con"> 
          <ul class="m-list list-tweet">
             <?php  
                $args=array(  
                    'cat' => 7,   // 分类ID  
                    'posts_per_page' => 8, // 显示篇数
                    'post__not_in' => get_option( 'sticky_posts' ) //排除置顶文章
                );  
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
           ?>
          <li class="clearfix drink-me"><i>•</i>
              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          </li>
         <?php  endwhile; endif; wp_reset_query(); ?>  
        </ul>
      </div>
      <div class="tab-bd-con"> 
          <ul class="m-list list-tweet">
           <?php  
                $args=array(  
                    'cat' => 8,   // 分类ID  
                    'posts_per_page' => 8, // 显示篇数
                    'post__not_in' => get_option( 'sticky_posts' ) //排除置顶文章
                );  
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
           ?>
          <li class="clearfix drink-me"><i>•</i>
              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          </li>
         <?php  endwhile; endif; wp_reset_query(); ?>  
        </ul>
      </div>
    </div>
  </div>
</div>    
</div>
<div id="temocon">
    <div class="area-sub-left">
  <div class="tab-product tab-sub-3 ui-style-gradient">
    <h2 class="tab-hd"><span class="tab-hd-con" style="width:169px;border-top:2px solid #DC233E"><a href="javascript:" class="area-sub-title">创新项目</a></span> <span class="tab-hd-con" style="width:230px"><a style="font-size:12px;float:right;margin-right:20px; color:#8f9a9e">更多 ▽</a></span></h2>
    <div class="tab-bd dom-display">
      <div class="tab-bd-con current"> 
        <ul class="m-list list-tweet">
             <?php  
                $args=array(  
                    'category__in' => array(2),   // 分类ID  
                    'post__in' => get_option('sticky_posts'), // 指定所获取的文章列表属于置顶文章：
                    'showposts' => 2,       //显示文章数量
                    'ignore_sticky_posts' => 1
                );
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
            ?>
            <li style="margin-bottom:5px;margin-top:10px;border:none;">
                <a href="<?php the_permalink(); ?>"><img src="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>" width="166" height="75"/></a>
                <div class="li-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
            </li>
             <?php  endwhile; endif; wp_reset_query(); ?>     
            <?php  
                $args=array(  
                    'cat' => 2,   // 分类ID  
                    'showposts' => 10, // 显示篇数
                    'post__not_in' => get_option( 'sticky_posts' ) //排除置顶文章

                );  
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
            ?>
            <li class="clearfix drink-me" style="clear:both;"><i>•</i>
                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            </li>
            <?php  endwhile; endif; wp_reset_query(); ?>     
        </ul>
      </div>
    </div>
  </div>
</div>
    <div class="area-sub-right">
        <div class="tab-product tab-sub-3 ui-style-gradient">
    <h2 class="tab-hd"> <span class="tab-hd-con" style="width:169px;border-top:2px solid #DC233E"><a href="javascript:" class="area-sub-title">创业项目</a></span> <span class="tab-hd-con" style="width:230px"><a style="font-size:12px;float:right;margin-right:20px; color:#8f9a9e">更多 ▽</a></span></h2>
    <div class="tab-bd dom-display">
      <div class="tab-bd-con current"> 
        <ul class="m-list list-tweet">
            <?php  
                $args=array(  
                    'category__in' => array(3),   // 分类ID  
                    'post__in' => get_option('sticky_posts'), // 指定所获取的文章列表属于置顶文章：
                    'showposts' => 2,       //显示文章数量
                    'ignore_sticky_posts' => 1
                );
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
            ?>
            <li style="margin-bottom:5px;margin-top:10px;border:none;">
                <a href="<?php the_permalink(); ?>"><img src="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>" width="166" height="75"/></a>
                <div class="li-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
            </li>
             <?php  endwhile; endif; wp_reset_query(); ?>
            <?php  
                $args=array(  
                    'cat' => 3,   // 分类ID  
                    'showposts' => 10, // 显示篇数
                    'post__not_in' => get_option( 'sticky_posts' ) //排除置顶文章

                );  
                query_posts($args);  
                if(have_posts()) : while (have_posts()) : the_post();  
            ?>
                <li class="clearfix drink-me" style="clear:both;"><i>•</i>
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                </li>
             <?php  endwhile; endif; wp_reset_query(); ?> 
        </ul>
      </div>
    </div>
  </div>
    </div>
</div>
    <?php   
}  

?> 





