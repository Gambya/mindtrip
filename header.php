<!DOCTYPE html>
<html <?php language_attributes(); ?></htm>>
<!--      
Este HTML foi criado pelo designer e desenvolvedor Roberto Ramos como template do wordpress para o blog Mind Trip.

Web:       www.lifedevelopers.com.br
E-mail:    robertolopesramos@gmail.com
-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <!-- Carregando Fontes -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Carregando CSS's -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/nimbus.css">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" rel="shortcut icon">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="" itemtype="http://schema.org/WebPage">
    <header class="header">
        <div class="header-content">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo Mind Trip" class="logo">
            <nav class="menu">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'depth'          => 2,
                            'container'      => false,
                            'menu_class'     => 'menu',
                        )
                    );
                ?>
                <!--<ul>
                    <li><a href="#"><b>Home</b></a></li>
                    <li><a href="#"><b>Front-End</b></a></li>
                    <li><a href="#"><b>Back-End</b></a></li>
                    <li><a href="#"><b>Úteis</b></a></li>
                    <li><a href="#"><b>Notícias</b></a></li>
                    <li><a href="#"><b>Sobre</b></a></li>
                </ul>-->
            </nav><!-- /Menu -->
        </div><!-- /Header-Content -->
    </header><!-- /Header -->
    <div class="search-category">
        search
    </div><!-- /Search-Category -->
    <div class="dropdown-category">
        <a href="#">Filtrar Categoria</a>
    </div><!-- /Dropdown-Category -->