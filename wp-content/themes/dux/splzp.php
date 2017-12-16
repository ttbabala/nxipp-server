<?php

/*
Template Name:视频类作品
*/

get_header();



// paging

$pagedtext = '';

if( $paged && $paged > 1 ){

    $pagedtext = ' <small>第'.$paged.'页</small>';

}



_moloader('mo_is_minicat', false);



$description = trim(strip_tags(category_description()));

?>

<?php if( mo_is_minicat() ){ ?>

    <div class="pageheader">

        <div class="container">

            <div class="share bdsharebuttonbox">

                <?php _moloader('mo_share', false); mo_share('renren'); ?>

            </div>

            <h1><?php single_cat_title(); echo $pagedtext; ?></h1>

            <div class="note"><?php echo $description ? $description : '去分类设置中添加分类描述吧' ?></div>

        </div>

    </div>

<?php } ?>


<section class="container">

    <div class="content-wrap">

        <div class="content">

            <?php
            /**

             * Used for index/archive/search/author/catgory/tag.

             *

             */

            $ii = 0;

            $p_meta = _hui('post_plugin');

            query_posts('cat=31,35&showposts=5&paged='.$paged);

            while ( have_posts() ) : the_post();

                $ii++;

                echo '<article class="excerpt excerpt-'.$ii.(_hui('list_type')=='text'?' excerpt-text':'').'">';

                if( _hui('list_type')!=='text' ){

                    echo '<a'._post_target_blank().' class="focus" href="'.get_permalink().'">'._get_post_thumbnail().'</a>';

                }

                echo '<header>';

                if( $p_meta && $p_meta['cat'] && !is_category() ) {

                    $category = get_the_category();

                    if($category[0]){

                        echo '<a class="cat" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'<i></i></a> ';

                    }

                };

                echo '<h2><a'._post_target_blank().' href="'.get_permalink().'" title="'.get_the_title()._get_delimiter().get_bloginfo('name').'">'.get_the_title().'</a></h2>';

                echo '</header>';

                echo '<p class="meta">';


                if( $p_meta && $p_meta['date'] ){

                    echo '<time><i class="fa fa-clock-o"></i>'.get_the_time('Y-m-d').'</time>';

                }



                if( $p_meta && $p_meta['author'] ){

                    $author = get_the_author();

                    if( _hui('author_link') ){

                        $author = '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.$author.'</a>';

                    }

                    echo '<span class="author"><i class="fa fa-user"></i>'.$author.'</span>';

                }



                if( $p_meta && $p_meta['view'] ){

                    echo '<span class="pv"><i class="fa fa-eye"></i>'._get_post_views().'</span>';

                }



                if ( comments_open() && $p_meta && $p_meta['view'] ) {

                    echo '<a class="pc" href="'.get_comments_link().'"><i class="fa fa-comments-o"></i>评论('.get_comments_number('0', '1', '%').')</a>';

                }



                echo '</p>';



                echo '<div class="article-content">'; if(!is_single()) { the_excerpt(); } else { the_content(__('(more…)'));
                } echo '</div>';

                echo '</article>';



            endwhile;

            _moloader('mo_paging');

            ?>

        </div>

    </div>

    <?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>


