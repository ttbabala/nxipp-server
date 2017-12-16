<?php
/*
Plugin Name: 实训营标签tab选项卡插件
Plugin URI: http://www.hq-smart.net
Description: 本插件意在解决在实训营标签动态选项卡切换的问题
Version: 1.0
Author: zhaoxin
Author URI: http://www.hq-smart.net
*/

/* 这个函数以插件形式展示了实训营tab标签选项卡切换的功能*/ 
function sxy_articleList() {  
     ?>
<div id="democon">  
<div class="area-sub">
  <div id="layout-t" class="tab-product tab-sub-3 ui-style-gradient">
      <h2 class="tab-hd"> 
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
        <span class="tab-hd-con"><a href="javascript:" title="<?php echo $tag->name?>"><?php echo $tag->name?></a></span>
        <?php } ?>
       </h2>
    <div class="tab-bd dom-display">
        <?php 
                // 循环所有标签   
                foreach ($tags as $tag) {   
                    // 得到标签ID   
                    $tagid = $tag->term_id;
        ?>
        <div class="tab-bd-con current"> 
              <ul class="m-list list-tweet">
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
                                        <h3 style="font-weight:bold;"><a href="<?php the_permalink(); ?>"><?php customTitle(15); ?></a></h3>
                                        <div class="article-text"><?php the_author(); ?></div>
                                        <div class="article-text"><?php the_time('Y-m-d');?></div>
                                        <div class="article-text"><?php echo '评论(', comments_number('', '1', '%'), ')'; ?></div>
                                        <article class="article-content" style="clear:both"><?php the_excerpt(__('(more…)')); ?></article>
                                    </div>
                              </li>
                        <?php  endwhile; endif; wp_reset_query(); ?> 
                      </ul>
                  </div>
                  <div class="rightbox">
                        <?php query_posts("showposts=9&tag_id=$tagid"); if(have_posts()) : while (have_posts()) : the_post(); ?> 
                            <li class="clearfix drink-me"><i>•</i>
                              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                            </li>
                        <?php  endwhile; endif; wp_reset_query(); ?> 
                  </div>            
              </ul>
        </div>
      <?php } ?>
    </div>
  </div>
</div>    
</div>
<?php } ?> 