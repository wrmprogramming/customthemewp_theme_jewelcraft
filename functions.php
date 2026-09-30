<?php
/**
 * توابع و قابلیت‌های تم JewelCraft
 *
 * @package JewelCraft
 * @since   1.0.0
 */

// جلوگیری از دسترسی مستقیم
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ثابت‌های تم
define( 'JEWELCRAFT_VERSION', '1.0.0' );
define( 'JEWELCRAFT_DIR', get_template_directory() );
define( 'JEWELCRAFT_URI', get_template_directory_uri() );

/**
 * ============================================================
 * ۱. راه‌اندازی تم
 * ============================================================
 */
function jewelcraft_setup() {

    // بارگذاری فایل ترجمه
    load_theme_textdomain( 'jewelcraft', JEWELCRAFT_DIR . '/languages' );

    // پشتیبانی‌های پایه وردپرس
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ) );

    // اندازه تصاویر سفارشی
    add_image_size( 'jewelcraft-product', 600, 600, true );
    add_image_size( 'jewelcraft-hero', 1920, 1080, true );
    add_image_size( 'jewelcraft-portfolio', 800, 800, true );

    // لوگوی سفارشی
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // منوها
    register_nav_menus( array(
        'primary' => 'منوی اصلی',
        'footer'  => 'منوی پاصفحه',
        'social'  => 'منوی شبکه‌های اجتماعی',
    ) );

    // پشتیبانی از ووکامرس
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 600,
        'single_image_width'    => 900,
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'jewelcraft_setup' );

/**
 * ============================================================
 * ۲. تنظیم عرض محتوا
 * ============================================================
 */
function jewelcraft_content_width() {
    $GLOBALS['content_width'] = 1280;
}
add_action( 'after_setup_theme', 'jewelcraft_content_width', 0 );

/**
 * ============================================================
 * ۳. بارگذاری استایل‌ها و اسکریپت‌ها
 * ============================================================
 */
/**
 * بارگذاری استایل‌ها با اولویت درست
 */
function jewelcraft_scripts() {

    // فونت فارسی
    wp_enqueue_style(
        'vazirmatn',
        'https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css',
        array(),
        '33.003'
    );

    // فونت انگلیسی تیترها
    wp_enqueue_style(
        'cormorant',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&display=swap',
        array(),
        null
    );

    // ⚠️ مهم: استایل ووکامرس قبل از استایل ما
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'woocommerce-general' );
        wp_enqueue_style( 'woocommerce-layout' );
        wp_enqueue_style( 'woocommerce-smallscreen' );
    }

    // استایل اصلی تم ما
    wp_enqueue_style(
        'jewelcraft-main',
        JEWELCRAFT_URI . '/assets/css/main.css',
        array(),
        JEWELCRAFT_VERSION
    );

    // فایل اصلی style.css
    wp_enqueue_style(
        'jewelcraft-style',
        get_stylesheet_uri(),
        array( 'jewelcraft-main' ),
        JEWELCRAFT_VERSION
    );

    // جاوااسکریپت
    wp_enqueue_script(
        'jewelcraft-main',
        JEWELCRAFT_URI . '/assets/js/main.js',
        array(),
        JEWELCRAFT_VERSION,
        true
    );

    // اسکریپت نظرات
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jewelcraft_scripts', 99 ); // ⚠️ اولویت 99
// function jewelcraft_scripts() {

//     // فونت فارسی وزیرمتن
//     wp_enqueue_style(
//         'vazirmatn',
//         'https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css',
//         array(),
//         '33.003'
//     );

//     // فونت انگلیسی برای تیترها
//     wp_enqueue_style(
//         'cormorant',
//         'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&display=swap',
//         array(),
//         null
//     );

//     // استایل اصلی تم
//     wp_enqueue_style(
//         'jewelcraft-main',
//         JEWELCRAFT_URI . '/assets/css/main.css',
//         array(),
//         JEWELCRAFT_VERSION
//     );

//     // فایل اصلی style.css (برای سازگاری)
//     wp_enqueue_style(
//         'jewelcraft-style',
//         get_stylesheet_uri(),
//         array( 'jewelcraft-main' ),
//         JEWELCRAFT_VERSION
//     );

//     // جاوااسکریپت اصلی
//     wp_enqueue_script(
//         'jewelcraft-main',
//         JEWELCRAFT_URI . '/assets/js/main.js',
//         array(),
//         JEWELCRAFT_VERSION,
//         true
//     );

//     // اسکریپت نظرات تودرتو
//     if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//         wp_enqueue_script( 'comment-reply' );
//     }
// }
add_action( 'wp_enqueue_scripts', 'jewelcraft_scripts' );

/**
 * ============================================================
 * ۴. ثبت مناطق ویجت (سایدبار و فوتر)
 * ============================================================
 */
function jewelcraft_widgets_init() {

    // سایدبار اصلی
    register_sidebar( array(
        'name'          => 'سایدبار اصلی',
        'id'            => 'sidebar-main',
        'description'   => 'در صفحات داخلی و بلاگ نمایش داده می‌شود.',
        'before_widget' => '<div id="%1$s" class="jc-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="jc-widget__title">',
        'after_title'   => '</h4>',
    ) );

    // فوتر - ستون ۱ تا ۳
    for ( $i = 1; $i <= 3; $i++ ) {
        register_sidebar( array(
            'name'          => "فوتر - ستون {$i}",
            'id'            => "footer-{$i}",
            'description'   => "ویجت‌های ستون {$i} در فوتر.",
            'before_widget' => '<div id="%1$s" class="jc-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="jc-footer__title">',
            'after_title'   => '</h4>',
        ) );
    }
}
add_action( 'widgets_init', 'jewelcraft_widgets_init' );

/**
 * سایدبار فروشگاه
 */
function jewelcraft_shop_sidebar() {
    register_sidebar( array(
        'name'          => 'سایدبار فروشگاه',
        'id'            => 'sidebar-shop',
        'description'   => 'در صفحات فروشگاه ووکامرس نمایش داده می‌شود.',
        'before_widget' => '<div id="%1$s" class="jc-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="jc-widget__title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'jewelcraft_shop_sidebar' );

/**
 * ============================================================
 * ۵. بارگذاری فایل‌های جانبی (inc)
 * ============================================================
 */
require_once JEWELCRAFT_DIR . '/inc/template-tags.php';
require_once JEWELCRAFT_DIR . '/inc/customizer.php';

/**
 * ============================================================
 * ۶. تنظیمات کوچک و بهینه‌سازی‌ها
 * ============================================================
 */

// حذف نسخه وردپرس از هدر (امنیت)
remove_action( 'wp_head', 'wp_generator' );

// حذف emoji اضافی (سبک‌سازی)
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// حذف اطلاعات اضافی از head
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// طول خلاصه پست
function jewelcraft_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'jewelcraft_excerpt_length' );

// ادامه خلاصه
function jewelcraft_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'jewelcraft_excerpt_more' );

// افزودن کلاس‌های بدنه
function jewelcraft_body_classes( $classes ) {
    if ( is_rtl() ) {
        $classes[] = 'jc-rtl';
    }
    if ( is_singular() ) {
        $classes[] = 'jc-singular';
    }
    return $classes;
}
add_filter( 'body_class', 'jewelcraft_body_classes' );

// تغییر کلاس دکمه‌های ووکامرس
function jewelcraft_woo_button_class( $classes ) {
    $classes[] = 'jc-btn';
    $classes[] = 'jc-btn--primary';
    return $classes;
}
add_filter( 'woocommerce_product_add_to_cart_class', 'jewelcraft_woo_button_class' );


/**
 * جلوگیری از چک آپدیت وردپرس (چون دسترسی به wordpress.org محدوده)
 */
function jewelcraft_disable_wp_updates() {
    // حذف چک آپدیت‌ها
    remove_action( 'init', 'wp_version_check' );
    remove_action( 'load-update-core.php', 'wp_update_plugins' );
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    remove_action( 'wp_version_check', 'wp_version_check' );
    remove_action( 'admin_init', '_maybe_update_core' );
    remove_action( 'admin_init', '_maybe_update_plugins' );
    remove_action( 'admin_init', '_maybe_update_themes' );

    // جلوگیری از چک خودکار
    add_filter( 'pre_site_transient_update_core', '__return_null' );
    add_filter( 'pre_site_transient_update_plugins', '__return_null' );
    add_filter( 'pre_site_transient_update_themes', '__return_null' );
}
add_action( 'init', 'jewelcraft_disable_wp_updates' );

/**
 * ============================================================
 * پشتیبانی کامل RTL
 * ============================================================
 */
function jewelcraft_rtl_support() {
    // بارگذاری استایل RTL مخصوص
    if ( is_rtl() ) {
        wp_enqueue_style(
            'jewelcraft-rtl',
            JEWELCRAFT_URI . '/assets/css/rtl.css',
            array( 'jewelcraft-main' ),
            JEWELCRAFT_VERSION
        );
    }
}
add_action( 'wp_enqueue_scripts', 'jewelcraft_rtl_support', 100 );

/**
 * ============================================================
 * تبدیل تاریخ میلادی به شمسی
 *
 * این تابع ساده است. برای تبدیل دقیق‌تر، افزونه
 * «WP-Parsidate» یا «Jalali Date» را نصب کن.
 * ============================================================
 */
function jewelcraft_jalali_date( $format = 'j F Y' ) {
    // اگه افزونه parsidate نصب باشه، از اون استفاده کن
    if ( function_exists( 'parsidate' ) ) {
        return parsidate( $format, get_the_time( 'Y-m-d H:i:s' ), 'per' );
    }
    // در غیر این صورت تاریخ میلادی
    return get_the_date( $format );
}

/**
 * ============================================================
 * ترجمه متون پرکاربرد ووکامرس (اگه ترجمه نشده)
 * ============================================================
 */
function jewelcraft_translate_woo_strings( $translated, $text, $domain ) {
    if ( 'woocommerce' !== $domain ) {
        return $translated;
    }

    $custom = array(
        'Add to cart'          => 'افزودن به سبد',
        'Add to basket'        => 'افزودن به سبد',
        'Read more'            => 'اطلاعات بیشتر',
        'Sale!'                => 'حراج!',
        'Out of stock'         => 'ناموجود',
        'In stock'             => 'موجود',
        'Related products'     => 'محصولات مرتبط',
        'Description'          => 'توضیحات',
        'Additional information' => 'اطلاعات بیشتر',
        'Reviews'              => 'نظرات',
        'Checkout'             => 'تسویه حساب',
        'Cart'                 => 'سبد خرید',
        'Subtotal'             => 'جمع کل',
        'Total'                => 'مبلغ کل',
    );

    if ( isset( $custom[ $text ] ) ) {
        return $custom[ $text ];
    }

    return $translated;
}
add_filter( 'gettext', 'jewelcraft_translate_woo_strings', 20, 3 );

/**
 * ============================================================
 * بهینه‌سازی سرعت
 * ============================================================
 */

// حذف Query String از فایل‌های استاتیک
function jewelcraft_remove_query_strings( $src ) {
    if ( strpos( $src, '?ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'jewelcraft_remove_query_strings', 15, 1 );
add_filter( 'style_loader_src', 'jewelcraft_remove_query_strings', 15, 1 );

// غیرفعال کردن Embed وردپرس (سبک‌سازی)
function jewelcraft_disable_embeds() {
    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'jewelcraft_disable_embeds' );

// غیرفعال کردن XML-RPC (امنیت + سرعت)
add_filter( 'xmlrpc_enabled', '__return_false' );

// حذف jQuery Migrate (سبک‌سازی)
function jewelcraft_remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'jewelcraft_remove_jquery_migrate' );

// کاهش تعداد بازبینی پست‌ها (کاهش حجم دیتابیس)
function jewelcraft_reduce_revisions( $num ) {
    return 5;
}
add_filter( 'wp_revisions_to_keep', 'jewelcraft_reduce_revisions' );

// افزایش محدودیت حافظه (اختیاری)
// define( 'WP_MEMORY_LIMIT', '256M' );  // در wp-config.php