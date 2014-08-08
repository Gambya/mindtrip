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
        'before_title'  => '<span class="footer-head"><b>',
        'after_title'   => '</b></span>'
    ));
    register_sidebar(array(
        'name'          => 'posts',
        'before_widget' => '<div class="posts-news">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => 'search',
        'before_widget' => '<div class="search-pesquisar">',
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

/**
* Contagem geral de comentarios de posts
*/
function full_comment_count() {
    global $post;
    $url = get_permalink($post->ID);  

    $filecontent = file_get_contents('https://graph.facebook.com/?ids='.$url);
    $json = json_decode($filecontent);
    $count = $json->$url->comments;
    $wpCount = get_comments_number();
    $realCount = $count + $wpCount;
    if ($realCount == 0 || !isset($realCount)) {
        $realCount = 0;
    }
    return $realCount;
}

/**
* Função facilitadora do category.php
*/
// Retorna outras categorias excepto a atual (redundante)
function cats_meow($glue) {
 $current_cat = single_cat_title( '', false );
 $separator = "\n";
 $cats = explode( $separator, get_the_category_list($separator) );
 foreach ( $cats as $i => $str ) {
  if ( strstr( $str, ">$current_cat<" ) ) {
   unset($cats[$i]);
   break;
  }
 }
 if ( empty($cats) )
  return false;
 
 return trim(join( $glue, $cats ));
} // end cats_meow

// Paginação
function wp_pagination($pages = '', $range = 9)
{  
    global $wp_query, $wp_rewrite;  
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
    $pagination = array(  
        'base' => @add_query_arg('page','%#%'),  
        'format' => '',  
        'total' => $wp_query->max_num_pages,  
        'current' => $current,  
        'show_all' => true,  
        'type' => 'plain'  
    );  
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );  
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );  
    echo '<div class="wp_pagination">'.paginate_links( $pagination ).'</div>';
}

?>