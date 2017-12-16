<?php
/*
Plugin Name: 公益广告标签tab选项卡插件
Plugin URI: http://www.hq-smart.net
Description: 本插件意在解决在公益广告站点动态选项卡切换的问题
Version: 1.0
Author: zhaoxin
Author URI: http://www.hq-smart.net
*/

/* 这个函数以插件形式展示了公益广告tab标签选项卡切换的功能*/ 
function gygg_articleList() {  
     ?>
<div id="democon"> 
<div class="area-sub">
  <div id="layout-t" class="tab-product tab-sub-3 ui-style-gradient">
        <div class="tab-bd-title">最新作品</div>
        <h2 class="tab-hd">
        <span class="tab-hd-con"><a href="javascript:" title="图形类作品">视频广告</a></span>
        <span class="tab-hd-con"><a href="javascript:" title="图形类作品">广播广告</a></span>
        <span class="tab-hd-con current" style="border-left: 1px solid #CFCFCF"><a href="javascript:" title="文字类作品">平面广告</a></span>
       </h2>
    <div class="tab-bd dom-display">
        <div class="tab-bd-con"> 
                <?php  
                           $args=array(  
                               'cat' => 4,   // 分类ID  
                               'showposts' => 2,       //显示文章数量
                           );
                           query_posts($args); 
                           get_template_part( 'excerpt' );
                  ?>
        </div>
        <div class="tab-bd-con"> 
                    <?php  
                               $args=array(  
                                   'cat' => 3,   // 分类ID  
                                   'showposts' => 2,       //显示文章数量
                               );
                               query_posts($args); 
                               get_template_part( 'excerpt' );
                      ?>
        </div>
        <div class="tab-bd-con current">
                    <?php  
                             $args=array(  
                                 'cat' => 2,   // 分类ID  
                                 'showposts' => 2,       //显示文章数量
                             );
                             query_posts($args); 
                             get_template_part( 'excerpt' );
                    ?>
        </div>
    </div>
  </div>
</div>    
</div>
<?php } ?>

