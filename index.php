<?php get_header(); ?>

<div class="conteudo clearfix">
        <div class="chamadas">
            <div class="carrocel">
                <?php 
                    $args = array(
                        'posts_per_page' => 6
                    );
                    query_posts( $args );
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            if ( has_post_thumbnail() ){
                ?>
                
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('large'); ?>                  
                    </a>
                
                <?php 
                            } 
                        }
                    }
                    wp_reset_query();
                ?>
                <div class="caixa-seletor">
                </div>
                <div class="caixa">
                    <div class="caixa-texto">
                        <h1></h1>
                    </div>
                </div>
            </div><!--/Carrocel -->
            <div class="tools">
                <?php get_sidebar('top'); ?>
                <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="auto" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
            </div><!--/Tools -->
        </div><!--/Chamadas -->
        
        <section class="principal">
            <section class="coluna">
                <?php 
                    if(have_posts()):while(have_posts()):the_post();
                ?>
                <article class="artigo">
                    <div class="artigo-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'catimg')); ?>                  
                                </a>
                        <?php endif; ?>
                        <div class="artigo-view">
                            <span class="view-icon"><i class="icon-eye"><?php the_views(); ?></i></span>
                            <span class="comment-icon"><i class="icon-comment"><?php echo full_comment_count(); ?></i></span>
                        </div>
                    </div>
                    <article class="artigo-texto">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p><?php the_excerpt(); ?></p>
                    </article>
                    <div class="artigo-dados">
                        <?php if (function_exists('userphoto_the_author_thumbnail')) { userphoto_the_author_thumbnail();} ?>
                        <h2><?php the_author(); ?></h2>
                        <i>Publicado: <?php the_time("d-m-Y"); ?></i>
                    </div>
                </article>
                <?php 
                    endwhile;
                    wp_reset_query();
                    else:
                ?>
                <p>Nenhum post encontrado!</p>
                <?php endif; ?>
            </section>
            <!-- Coluna lateral para aplicações -->
            <section class="coluna">
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
                                <h2><?php the_title(); ?> - <small><?php the_time("d-m-Y"); ?></small></h2>
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