<?php
/**
 * سربرگ سایت - header.php
 *
 * این فایل در ابتدای همه صفحات بارگذاری می‌شود.
 * شامل تگ <head>، لوگو، منوی اصلی و دکمه تماس است.
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#jc-content">پرش به محتوا</a>

<div id="page" class="jc-site">

    <!-- ============================================
         سربرگ سایت
         ============================================ -->
    <header id="masthead" class="jc-header">
        <div class="jc-container">
            <div class="jc-header__inner">

                <!-- لوگو -->
                <div class="jc-header__brand">
                    <?php jewelcraft_site_logo(); ?>
                </div>

                <!-- منوی اصلی -->
                <nav class="jc-nav" aria-label="منوی اصلی">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'jc-nav__list',
                            'depth'          => 2,
                            'fallback_cb'    => false,
                        ) );
                    } else {
                        // اگه منویی ثبت نشده باشه، این پیام نشون داده می‌شه
                        echo '<ul class="jc-nav__list">';
                        echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">خانه</a></li>';
                        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">منو را ثبت کنید</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </nav>

                <!-- دکمه‌های سمت چپ -->
                <div class="jc-header__actions">

                    <!-- دکمه سفارش -->
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="jc-btn jc-btn--primary jc-header__cta">
                        سفارش ساخت
                    </a>

                    <!-- دکمه منوی موبایل -->
                    <button class="jc-menu-toggle" aria-label="باز و بسته کردن منو" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

            </div>
        </div>
    </header>

    <!-- ============================================
         شروع محتوای اصلی
         ============================================ -->
    <main id="jc-content" class="jc-main">