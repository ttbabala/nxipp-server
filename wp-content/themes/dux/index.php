<?php 
	get_header(); 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $blog_id = get_current_blog_id();
?>
<section class="container">
	<div class="content-wrap">
	<div class="content">
                <?php
                     if(function_exists('huandeng_articleList')) {  
                        echo huandeng_articleList();  
                    }  
                ?>
		<?php 
			if( $paged==1 && _hui('focusslide_s') ){ 
				_moloader('mo_slider', false);
				mo_slider('focusslide');
			} 
		?>
		<?php 
			$pagedtext = ''; 
			if( $paged > 1 ){
				$pagedtext = ' <small>第'.$paged.'页</small>';
			}
		?>
		<?php  
			if( in_array($blog_id,array(6,7)) == false ){
                            if( _hui('minicat_home_s') ){
                                    _moloader('mo_minicat');
                            }
                        }
		?>
		<?php _the_ads($name='ads_index_01', $class='asb-index asb-index-01');?>
		<?php if(in_array($blog_id,array(6,7,2,5,4)) == false){ ?><div class="title">
			<h3 style="margin-left:20px;">
				<?php echo _hui('index_list_title') ? _hui('index_list_title') : '最新发布' ?>
				<?php echo $pagedtext ?>
			</h3>
			<?php 
				if( _hui('index_list_title_r') ){
					echo '<div class="more">'._hui('index_list_title_r').'</div>';
				} 
			?>
		</div>
                <?php } ?>
                <?php if(in_array($blog_id,array(6)) == false) {?>
                    <?php  
                            $args = array(
                                'ignore_sticky_posts' => 1,
                                'paged' => $paged
                            );

                            if( _hui('notinhome') ){
                                    $pool = array();
                                    foreach (_hui('notinhome') as $key => $value) {
                                            if( $value ) $pool[] = $key;
                                    }
                                    $args['cat'] = '-'.implode($pool, ',-');
                            }

                            if( _hui('notinhome_post') ){
                                    $pool = _hui('notinhome_post');
                                    $args['post__not_in'] = explode("\n", $pool);
                            }

                            //query_posts('cat=26,27&showposts=5');
                            $limit = get_option('posts_per_page');
                            query_posts('cat=26,27&showposts=5&paged='.$paged);
                    ?> 
                    <?php if(in_array($blog_id,array(2,4,7)) == false){ ?>
                    <?php get_template_part( 'excerpt' ); ?>
                    <?php } ?>
                    <?php _the_ads($name='ads_index_02', $class='asb-index asb-index-02') ?>
                    <?php
                        if(function_exists('sxy_articleList')) {  
                                echo sxy_articleList();
                        }  
                    ?>
                    <?php
                        if(function_exists('yxzy_articleList')) {  
                                echo yxzy_articleList();
                        }  
                    ?>
                    <?php
                        if(function_exists('xkjs_articleList')) {  
                                echo xkjs_articleList();
                        }  
                    ?>
                    <?php
                        if(function_exists('gygg_articleList')) {  
                                echo gygg_articleList();
                        }  
                    ?>
                <?php }; ?>
	</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer();?>