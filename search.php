<?php get_header(); ?>

<div class="conteudo clearfix">
        <section class="principal">
            <section class="coluna-search">
                <?php if(have_posts()):while(have_posts()):the_post(); ?>
                <article class="search-artigo">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('large', array('class' => 'search-artigo-img')); ?>                  
                    </a>
                <?php endif; ?>
                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt(); ?></a></h2>
                </article>
                <?php endwhile; ?>
                <?php else: ?>
                    <article class="search-artigo">
                        <?php get_sidebar("search"); ?>
                    </article>
                <?php endif; ?>
            </section><!-- End Coluna side -->
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