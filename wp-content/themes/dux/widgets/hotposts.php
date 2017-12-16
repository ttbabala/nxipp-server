

<?php
/*
Plugin Name:显示获赞最多的新闻类5篇文章
Description:获赞最多
Version:1.0
*/

class AshuPostViews extends WP_Widget{
    function AshuPostViews(){
        $widget_ops = array('classname'=>'widget_ui_posts','description'=>'获赞最多的新闻类5篇文章');
        $this->WP_Widget('AshuPostViews','新闻类获赞最多',$widget_ops);
    }
    //表单
    function form($instance){
        $instance = wp_parse_args((array)$instance,array(
            'title'=>'新闻类获赞最多的作品','showPosts'=>5
        ));
        $title = htmlspecialchars($instance['title']);
        $showPosts = htmlspecialchars($instance['showPosts']);
        $output = '<table>';
        $output .= '<tr><td>标题:</td><td>';
        $output .= '<input id="'.$this->get_field_id('title') .'" name="'.$this->get_field_name('title').'" type="text" value="'.$instance['title'].'" />';
        $output .= '</td></tr><tr><td>文章数量：</td><td>';
        $output .= '<input id="'.$this->get_field_id('showPosts') .'" name="'.$this->get_field_name('showPosts').'" type="text" value="'.$instance['showPosts'].'" />';
        $output .= '</td></tr></table>';
        echo $output;
    }

    function update($new_instance,$old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        $instance['showPosts'] = strip_tags(stripslashes($new_instance['showPosts']));
        return $instance;
    }

    function widget($args,$instance){
        extract($args);
        $title = apply_filters('widget_name',$instance['title']);
        $showPosts = empty($instance['showPosts']) ? 5 : $instance['showPosts'];
        echo $before_widget;
        echo $before_title . $title . $after_title;
        echo '<ul class="nopic">';
        $this -> ashu_get_hotpost($showPosts);
        echo '</ul>';
        echo $after_widget;

    }
    function ashu_get_hotpost($showPosts){
        global $wpdb;
        $obj_array = $wpdb->get_results("SELECT post_id, count( * ) AS nums
                                    FROM zs_zan AS z, $wpdb->term_relationships AS r
                                    WHERE z.post_id = r.object_id
                                    AND r.term_taxonomy_id in (28,29,30,31)
                                    GROUP BY post_id
                                    ORDER BY nums DESC
                                    LIMIT 0,$showPosts");
        if(count($obj_array) == '0'){
            $oupout = '统计记录还未产生,系统随后将更新';
        }
        else {
            for ($i = 0; $i < count($obj_array); $i++) {
                while ($i < count($obj_array)) {
                    if ($i == 0) {
                        $objArray = array($obj_array[$i]->post_id);
                        break;
                    } else if ($i > 0) {
                        $objArray = array_merge($objArray, array($obj_array[$i]->post_id));
                        break;
                    }
                }
            }
            $objStr = implode(',', $objArray);
            $result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE id in ($objStr)");
            $output = '';
            foreach ($result as $post) {

                $postid = $post->ID;
                $postdate = $post->post_date;
                if (mb_strlen($post->post_title, "UTF-8") > 18) {
                    $title = strip_tags($post->post_title);
                    $short_title = trim(mb_substr($title, 0, 20, "UTF-8"));
                    $short_title .= '...';
                } else {
                    $short_title = $post->post_title;
                }
                $nums = $wpdb->get_results("SELECT count( * ) as count FROM zs_zan WHERE post_id = $postid");
                $output .= '<li><a ' . _post_target_blank() . ' href="' . get_permalink($postid) . '"><span class="text">' . $short_title . '</span><span class="muted">' . $postdate . '&nbsp;获赞('.$nums[0]->count.')</span></a></li>';
                $i++;
            }
        }
       echo $output;
    }
}

function AshuPostViews(){
    register_widget('AshuPostViews');
}
add_action('widgets_init','AshuPostViews');
?>

