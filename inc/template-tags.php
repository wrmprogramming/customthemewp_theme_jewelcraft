<?php
/**
 * توابع کمکی برای قالب‌ها
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * نمایش لوگو یا نام سایت
 */
function jewelcraft_site_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        printf(
            '<a href="%1$s" class="jc-header__logo" rel="home">%2$s<span>.</span></a>',
            esc_url( home_url( '/' ) ),
            esc_html( get_bloginfo( 'name' ) )
        );
    }
}

/**
 * نمایش متا پست (تاریخ، نویسنده، دسته)
 */
function jewelcraft_post_meta() {
    echo '<div class="jc-post-meta">';

    // تاریخ
    printf(
        '<span class="jc-post-meta__date">%s</span>',
        esc_html( get_the_date() )
    );

    // نویسنده
    printf(
        '<span class="jc-post-meta__author">%s</span>',
        esc_html( get_the_author() )
    );

    // دسته‌ها
    $categories = get_the_category_list( '، ' );
    if ( $categories ) {
        echo '<span class="jc-post-meta__cats">' . $categories . '</span>';
    }

    echo '</div>';
}

/**
 * صفحه‌بندی سفارشی
 */
function jewelcraft_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '← قبلی',
        'next_text' => 'بعدی →',
        'class'     => 'jc-pagination',
    ) );
}