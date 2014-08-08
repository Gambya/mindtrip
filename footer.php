    <footer class="footer">
        <div class="footer-content">
            <section class="cols feed">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-icone.png" alt="Mind Trip" class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-nome.png" alt="Mind Trip" class="nome">
                <span><?php bloginfo('name'); ?> &reg; - Todos os direitos reservados &copy;</span>
            </section><!--/Feed -->
            <section class="cols popular">
                    <?php get_sidebar('footer'); ?>
            </section><!--/Popular -->
            <section class="cols recentes">
                <span class="footer-head"><b>Recentes:</b></span>
                <?php 
                    query_posts('posts_per_page = 5');
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
            </section><!--/Recentes -->
            <section class="cols sobre">
                <div class="social-icon">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-icon.png" alt="Facebook">
                    </a>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/google+-icon.png" alt="Google+">
                    </a>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-icon.png" alt="Twitter">
                    </a>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/youtube-icon.png" alt="Canal Youtube">
                    </a>
                    <div class="social-contato">
                        <h2>Entre em Contato</h2>
                        <p>Quer fazer uma pergunta, uma reclamação, dar sugestão, anunciar sua marca, criar uma nova parceria ou apenas bater um papo contato@mindtrip.com.br</p>
                    </div>
                </div>
                <nav class="barnavbottom">
                    <ul>
                        <?php
                            $args = array(
                                'title_li' => '',
                                'link_before' => ' | ',
                                'link_after' => ' | '
                            );
                            wp_list_pages($args);
                        ?>
                    </ul>
                </nav>
            </section><!--/Sobre -->
        </div>
    </footer><!--/footer -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <!-- QueryLoader Script file -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.queryloader2.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slide.js" type="text/javascript"></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=1441330619481325&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="fb-root"></div>
<?php wp_footer(); ?>
</body>
</html>