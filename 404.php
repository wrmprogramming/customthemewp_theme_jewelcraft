<?php
/**
 * صفحه ۴۰۴ - پیدا نشد
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="jc-404">
    <div class="jc-container jc-container--narrow">

        <div class="jc-404__content">
            <span class="jc-404__number">۴۰۴</span>
            <h1 class="jc-404__title">صفحه‌ای که دنبالش بودید پیدا نشد</h1>
            <p class="jc-404__text">
                شاید آدرس را اشتباه وارد کرده‌اید یا این صفحه حذف شده است.
            </p>

            <div class="jc-404__search">
                <?php get_search_form(); ?>
            </div>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="jc-btn jc-btn--primary">
                بازگشت به صفحه اصلی
            </a>
        </div>

    </div>
</div>

<?php get_footer(); ?>