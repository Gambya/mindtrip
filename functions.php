<?php
if ( function_exists( 'add_theme_support' ) ) :
    add_theme_support( 'post-thumbnails' );
endif;

//Adicionando menu Link no administrador do wordpress
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

//Adicionando sidebars
if(function_exists('register_sidebar')){
    register_sidebar(array(
        'name'          => 'top',
        'before_widget' => '<div class="top">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => 'tags',
        'before_widget' => '<div class="widgets">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => 'right',
        'before_widget' => '<div class="panel space">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="panel-head">',
        'after_title'   => '</div>'
    ));
    register_sidebar(array(
        'name'          => 'footer',
        'before_widget' => '<div class="widgets">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}

/** Postes mais lidos
* $no_posts:inteiro; //Números de posts a serem apresentados
* $before:string "<div>"; //tag inicial
* $after:string "</li>"; //tag final
* $before_title:string "<h2>" //tag inicial de titulo
* $after_title:string "</h2>" //tag final de titulo
* $show_pass_post:boolean false; //mostrar posts protegidos por senha
* $duration:string '' //intervalo de dias
*******************************************/
function most_popular_posts($no_posts = 2, $before = '<div class="populares_dados">', $after = '</div>', $before_title = '<h2>', $after_title = '</h2>', $show_pass_post = false, $duration='') {
                global $wpdb;
                $request = "SELECT ID, post_title, post_content, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments";
                $request .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'";
                if(!$show_pass_post) $request .= " AND post_password =''";
                if($duration !="") { $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
                }
                $request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
                $posts = $wpdb->get_results($request);
                $output = '';
                if ($posts) {
                               foreach ($posts as $post) {
                                               $post_title = stripslashes($post->post_title);
                                               $post_content = strip_tags($post->post_content);
                                               $post_content = (strlen($post_content) > 100) ? substr(strip_tags($post->post_content),0,70)." ..." : $post_content;
                                               $comment_count = $post->comment_count;
                                               $permalink = get_permalink($post->ID);
                                               $output .= $before.$before_title.'<a href="'.$permalink.'" title="'. $post_title.'">'.$post_title.'</a>'.$after_title.$post_content.$after;
                               }
                } else {
                               $output .= $before . "None found" . $after;
                }
                echo $output;
}
?>