<?php get_header(); ?>

<div class="conteudo clearfix">
    <section class="principal">
        <section class="coluna-archive">
            <div class="title-archive">
                <?php the_post(); ?>
                <?php if(is_day()): ?>
                    <h1><?php echo 'Arquivos do Dia: <span>'.get_the_time(get_option('date_format')).'</span>'; ?></h1>
                <?php elseif(is_month()): ?>
                    <h1><?php echo 'Arquivos do Mês: <span>'.get_the_time('F Y').'</span>'; ?></h1>
                <?php elseif(is_year()): ?>
                    <h1><?php echo 'Arquivos do Ano: <span>'.get_the_time('Y').'</span>'; ?></h1>
                <?php elseif(is_category()): ?>
                    <h1>Arquivos das Categorias: <?php echo the_category(' • '); ?></h1>
                <?php elseif(is_tag()): ?>
                    <h1><?php the_tags('Arquivos das Tags: ',' • ',''); ?></h1>
                <?php elseif(isset($_GET['paged']) && !empty($_GET['paged'])): ?>
                    <h1><?php _e('Arquivos do Blog:', 'seu-template'); ?></h1>
                <?php endif; ?>
                <?php rewind_posts(); ?>
            </div>
            <?php while(have_posts()): the_post(); ?>
            <article class="artigo-archive">
                <div class="artigo-img-archive">
                    <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'catimg-archive')); ?>                  
                            </a>
                    <?php endif; ?>
                    <div class="artigo-view-archive">
                        <span class="view-icon"><i class="icon-eye"><?php the_views(); ?></i></span>
                        <span class="comment-icon"><i class="icon-comment"><?php echo full_comment_count(); ?></i></span>
                    </div>
                </div>
                <article class="artigo-texto-archive">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <p><?php the_excerpt(); ?></p>
                </article>
                <div class="artigo-dados-archive">
                    <?php if (function_exists('userphoto_the_author_thumbnail')) { userphoto_the_author_thumbnail();} ?>
                    <h2><?php the_author(); ?></h2>
                    <i>Publicado: <?php the_time("d-m-Y"); ?></i>
                </div>
            </article>
            <?php 
                endwhile;
                wp_reset_query();
            ?>
            <div class="paginacao">
                <?php wp_pagination(); ?>
            </div>
        </section>
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