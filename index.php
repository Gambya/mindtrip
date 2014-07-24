<?php get_header(); ?>

<div class="conteudo clearfix">
        <div class="chamadas">
            <div class="carrocel">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wallp.jpg" alt="Layout Responsivo">
                <div class="caixa">
                    <div class="caixa-seletor">
                        <ul>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                        </ul>
                    </div>
                    <div class="caixa-texto">
                        <h1>Novo Game</h1>
                        <p>Experimente a mudança de paradigma de conhecer o nosso planeta azul de um novo ponto de vista.</p>
                    </div>
                </div>
            </div><!--/Carrocel -->
            <div class="tools">
                <?php get_sidebar('top'); ?>
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=290&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=466663636752953" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:290px; height:258px;" allowTransparency="true"></iframe>
            </div><!--/Tools -->
        </div><!--/Chamadas -->
        
        <section class="principal">
            <section class="coluna">
                <?php 
                    $args = array(
                        'category_name' => "Back-End",
                        'posts_per_page' => 3
                    );
                    query_posts( $args );
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
                            <span class="view-icon"><?php the_views(); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/view-icon.png"></span>
                            <span class="comment-icon"><?php comments_number("0","1","%"); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/comment-icon.png"></span>
                        </div>
                    </div>
                    <article class="artigo-texto">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p><?php the_excerpt(); ?></p>
                    </article>
                    <div class="artigo-dados">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/autor.jpeg" alt="Roberto Ramos">
                        <h2><?php the_author(); ?></h2>
                        <i>Publicado: <?php the_date("d-m-Y"); ?></i>
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
            <section class="coluna">
                <?php 
                    $args = array(
                        'category_name' => "Front-End",
                        'posts_per_page' => 3
                    );
                    query_posts( $args );
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
                            <span class="view-icon"><?php the_views(); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/view-icon.png"></span>
                            <span class="comment-icon"><?php comments_number("0","1","%"); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/comment-icon.png"></span>
                        </div>
                    </div>
                    <article class="artigo-texto">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p><?php the_excerpt(); ?></p>
                    </article>
                    <div class="artigo-dados">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/autor.jpeg" alt="Roberto Ramos">
                        <h2><?php the_author(); ?></h2>
                        <i>Publicado: <?php the_date("d-m-Y"); ?></i>
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
            <section class="coluna">
                <?php 
                    $args = array(
                        'category_name' => "noticias",
                        'posts_per_page' => 3
                    );
                    query_posts( $args );
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
                            <span class="view-icon"><?php if(function_exists('the_views')){the_views();} ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/view-icon.png"></span>
                            <span class="comment-icon"><?php comments_number("0","1","%"); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/comment-icon.png"></span>
                        </div>
                    </div>
                    <article class="artigo-texto">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p><?php the_excerpt(); ?></p>
                    </article>
                    <div class="artigo-dados">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/autor.jpeg" alt="Roberto Ramos">
                        <h2><?php the_author(); ?></h2>
                        <i>Publicado: <?php the_date("d-m-Y"); ?></i>
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
                <div class="panel space">
                    <div class="panel-head">Publicidade</div>
                    <div class="panel-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/schema-org.jpg" alt="Layout Responsivo">
                    </div>
                </div>
            </section><!-- /Coluna aplicações -->
        </section><!--/Principal -->
    </div><!--/Conteúdo -->

<?php get_footer(); ?>