<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><div class="remodal-bg">
    <header role="main" class="masthead"><div class="contents">
        <?php
            if ( is_front_page() && is_home() ) : ?>
                <h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php endif; ?>

        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav role="navigation">
                <?php
                    // Primary navigation menu.
                    wp_nav_menu( array(
                        'menu_class'     => 'nav-menu',
                        'theme_location' => 'primary'
                    ) );
                ?>
            </nav>
        <?php endif; ?>
    </div></header>

    <div role="main">
