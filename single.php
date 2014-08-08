<?php get_header(); ?>

<div class="conteudo clearfix">
        <section class="principal">
            <section class="coluna-side">
                <?php 
                    if(have_posts()):while(have_posts()):the_post();
                ?>
                <article class="artigo-single">
                    <header class="artigo-header-single">
                        <div class="artigo-dados-single">
                            <h1><?php the_title(); ?></h1>
                            <h2><?php the_excerpt(); ?></h2>
                            <div class="single-author">
                                <div class="author-name">
                                    <?php the_author(); ?>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="artigo-conteudo">
                        <span st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' class='st_fblike_hcount'></span>
<span st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' class='st_twitter_hcount'></span>
<span st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' class='st_linkedin_hcount'></span>
<span st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' class='st_plusone_hcount'></span>
                    </div>
                    <div class="artigo-post-relacionados">
                        <?php 
                            $tags = wp_get_post_tags($post->ID); 
                            if ($tags) { 
                                $tag_ids = array(); 
                                foreach($tags as $individual_tag) 
                                    $tag_ids[] = $individual_tag->term_id; 

                                $args=array( 
                                    'tag__in' => $tag_ids, 
                                    'post__not_in' => array($post->ID), 
                                    'showposts'=>5, // Number of related posts that will be shown. 
                                    'caller_get_posts'=>1 
                                ); 
                                $my_query = new wp_query($args); 
                                if( $my_query->have_posts() ) { 
                                    echo '<div><h3>Posts Relacionados</h3></div><ul>'; 
                                    while ($my_query->have_posts()) { 
                                        $my_query->the_post(); ?> 
                                        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li> 
                                    <?php } 
                                    echo '</ul>'; 
                                } 
                            } 
                        ?>
                    </div>
                    <div class="artigo-newsletter">
                        <?php get_sidebar('posts'); ?>
                    </div>
                    </br>
                    <div class="artigo-author-single">
                        <?php if (function_exists('userphoto_the_author_thumbnail')) { userphoto_the_author_thumbnail();} ?>
                        <h2>Por <?php the_author(); ?></h2>
                        <p><?php the_author_meta('description'); ?></p>
                        <a href="#"><?php the_author_meta('user_url'); ?></a>
                    </div>
                </article>
                <section class="artigo-comments-single">
                    <?php comments_template(); ?>
                </section>
            </section>
            <?php 
                endwhile;
                wp_reset_query();
                else:
            ?>
            <p>Nenhum post encontrado!</p>
            <?php endif; ?>
            <!-- Coluna lateral para aplicações -->
            <section class="coluna-side">
                <div class="tools-side">
                    <?php get_sidebar('top'); ?>
                    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=290&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=466663636752953" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:290px; height:258px;" allowTransparency="true"></iframe>
                </div><!--/Tools -->
                <?php get_sidebar('right'); ?>
                <div class="panel space">
                    <div class="panel-head">Recentes</div>
                    <div class="panel-content">
                        <?php 
                            query_posts('posts_per_page = 10');
                            if(have_posts()):while(have_posts()):the_post();
                        ?>
                        <div class="populares-dados">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('thumbnail',array('class' => 'catimg')); ?>
                                <?php endif; ?>
                                <h2><?php the_title(); ?> - <small><?php the_date("d-m-Y"); ?></small></h2>
                            </a>
                        </div>
                        <?php 
                            endwhile;
                            wp_reset_query();
                            else:
                        ?>
                        <div class="populares-dados">
                            <p>Nenhum post encontrado!</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div><!-- Recentes -->
            </section><!-- /Coluna aplicações -->
        </section><!--/Principal -->
    </div><!--/Conteúdo -->

<?php get_footer(); ?>