<?php
/**
 * Header file for Saturblade theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Saturblade
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="site">
    <header class="header header_mobile">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="saturblade logo"
                 class="header-logo">
        </a>
        <div class="header__icons-wrapper">
            <div class="header__icons-wrapper_mobile">
                <i class="header__icon fas fa-search"></i>
                <i class="header__icon fas fa-user-circle"></i>
                <i class="header__icon fas fa-shopping-cart"></i>
                <a href="#" class="header__link" data-toggle="drawer" data-target=".drawer-menu">
                    <i class="header__icon fas fa-bars"></i>
                </a>
                <div class="drawer-menu drawer drawer-right slide" aria-hidden="true">
                    <div class="drawer-content drawer-content-scrollable">
                        <?php
                        wp_nav_menu(
                            array(
                                'container' => false,
                                'menu_class' => 'header__menu_mobile drawer-body',
                                'depth' => 2,
                                'walker' => 'saturblade_walker_nav_menu',
                                'theme_location' => 'saturblade_mobi_menu',
                            )
                        )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="header header_desktop">
        <div class="header-wrapper wrapper">
            <div class="search">
              <?php dynamic_sidebar( 'header' ) ?>
            </div>
            <div class="menu-wrapper">
                <?php wp_nav_menu(array(
                    'theme_location' => 'saturblade_main_menu',
                    'menu_class' => 'header__menu'
                )); ?>
                <?php if (is_user_logged_in()) { ?>
                    <div class="s-header__basket-wr woocommerce">
                        <?php
                        global $woocommerce; ?>
                        <a href="<?php echo wc_get_cart_url() ?>" class="basket-btn basket-btn_fixed-xs">
                            <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                        </a>
                    </div>
                <?php } ?>
                <?php if (class_exists('WooCommerce')): ?>
                    <ul>
                        <li>
                            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>">
                                <i class="header__icon fas fa-user-circle"></i>
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <aside class="sidebar">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="saturblade logo"
                 class="sidebar-logo">
        </a>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'saturblade_sidebar_menu',
            'menu_class' => 'header__menu_mobile',
            'container' => false,
            'walker' => 'saturblade_walker_nav_menu',
            'depth' => 2
        ));
        ?>
    </aside>
