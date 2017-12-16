<?php
/*
Plugin Name: 优秀作业模块tab选项卡插件
Plugin URI: http://www.hq-smart.net
Description: 本插件意在解决在优秀作业站点首页投放动态选项卡模块的问题
Version: 1.0
Author: zhaoxin
Author URI: http://www.hq-smart.net
*/

/* 这个函数以插件形式展示了首页焦点图及相关栏目的文章调用*/ 
function yxzy_articleList() {  
     ?>
<div id="democon">  
	<div id="p7ssm">
            <div class="p7ssm-video">
                <?php  
                    $args=array(  
                        'cat' => 5,   // 分类ID  
                        'showposts' => 1, // 显示篇数
                        'post__in' => get_option( 'sticky_posts' ), //置顶文章
                        'ignore_sticky_posts' => 1
                    );  
                    query_posts($args);  
                    if(have_posts()) : while (have_posts()) : the_post(); 
                ?>
               <video width="390" height="170" controls autobuffer poster="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>" preload="auto">
                   <source src="<?php $media = get_attached_media('video', $post->ID); echo $media[52]->guid;?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
               </video>
                <?php  endwhile; endif; wp_reset_query(); ?>  
            </div>
            <div class="p7ssm-img">
                <ul>
                    <?php  
                    $args=array(  
                        'cat' => 4,   // 分类ID  
                        'showposts' => 2, // 显示篇数
                        'post__in' => get_option( 'sticky_posts' ), //置顶文章
                        'ignore_sticky_posts' => 1
                    );  
                    query_posts($args);  
                    if(have_posts()) : while (have_posts()) : the_post(); 
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><image src="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>" title="" width="170" height="80px" style="margin-bottom: 5px;"/></a>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    </li>
                 <?php  endwhile; endif; wp_reset_query(); ?>  
                </ul>
            </div>
        </div>
<div class="area-sub">
  <div id="layout-t" class="tab-product tab-sub-3 ui-style-gradient">
    <h2 class="tab-hd"> <span class="tab-hd-con"><a href="javascript:">新闻作品</a></span> <span class="tab-hd-con"><a href="javascript:">广告作品</a></span> <span class="tab-hd-con"><a href="javascript:">自主作品</a></span> </h2>
    <div class="tab-bd dom-display">
      <div class="tab-bd-con current"> 
        <ul class="m-list list-tweet">
           <?php  
                $args=array(  
                    'cat' => 9,   // 分类ID  
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
                    'cat' => 10,   // 分类ID  
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
                    'cat' => 11,   // 分类ID  
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
   <div class="area-sub">
  <div id="layout-x" class="tab-product tab-sub-3 ui-style-gradient">
      <h2 class="tab-hd-new"> 
        <?php   
                // 得到所有标签列表（8为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）  
                $args=array(
                    'orderby' => 'name',
                    'order' => 'ASC'
                );
                $tags = get_tags($args);  
                // 循环所有标签   
                foreach ($tags as $tag) {   
                    // 得到标签ID   
                    $tagid = $tag->term_id;
                    // 得到标签下所有文章   
                    query_posts("showposts=-1&tag_id=$tagid");
        ?>
        <span class="tab-hd-con-new"><a href="javascript:" title="<?php echo $tag->name?>"><?php echo $tag->name?></a></span>
        <?php } ?>
       </h2>
    <div class="tab-bd-new dom-display">
        <?php 
                // 循环所有标签   
                foreach ($tags as $tag) {   
                    // 得到标签ID   
                    $tagid = $tag->term_id;
        ?>
        <div class="tab-bd-con-new current"> 
              <ul class="m-list list-tweet">
                  <div class="rightbox">
                        <?php query_posts("showposts=9&tag_id=$tagid"); if(have_posts()) : while (have_posts()) : the_post(); ?> 
                            <li class="clearfix drink-me"><i>•</i>
                              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                            </li>
                        <?php  endwhile; endif; wp_reset_query(); ?> 
                  </div>
                  <div class ="leftbox">
                      <ul>
                        <?php 
                          $args_sticky = array(
                              'showposts' => 3,
                              'tag_id' => $tagid,
                              'post__in' => get_option('sticky_posts'),
                              'ignore_sticky_posts' => 1
                          );
                         query_posts($args_sticky); if(have_posts()) : while (have_posts()) : the_post(); ?> 
                              <li style="margin-bottom:10px;">                            
                                    <div class="img-td">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); echo $imgsrc[0];?>" width="150" height="90"/></a>
                                    </div>
                                    <div class="article-td">
                                        <h3 style="font-weight:bold;"><a href="<?php the_permalink(); ?>"><?php customTitle(20); ?></a></h3>
                                        <div class="article-text"><?php the_author(); ?></div>
                                        <div class="article-text"><?php the_time('Y-m-d');?></div>
                                        <div class="article-text"><?php echo '评论(', comments_number('', '1', '%'), ')'; ?></div>
                                        <article class="article-content" style="clear:both"><?php the_excerpt(__('(more…)')); ?></article>
                                    </div>
                              </li>
                        <?php  endwhile; endif; wp_reset_query(); ?> 
                      </ul>
                  </div>
         
              </ul>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>

    <?php   
}  

?> 




