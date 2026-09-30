<?php
/**
 * آرشیو محصولات - archive-product.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="jc-page-header">
    <div class="jc-container">
        <span class="jc-section__eyebrow">فروشگاه</span>
        <h1 class="jc-page-header__title">
            <?php woocommerce_page_title(); ?>
        </h1>
        <?php
        if ( is_product_category() || is_product_tag() ) {
            do_action( 'woocommerce_archive_description' );
        }
        ?>
    </div>
</div>

<div class="jc-container">
    <div class="jc-shop-layout <?php echo is_active_sidebar( 'sidebar-shop' ) ? 'jc-shop-layout--with-sidebar' : ''; ?>">

        <!-- نوار فیلتر -->
        <div class="jc-shop-toolbar">
            <?php woocommerce_result_count(); ?>
            <?php woocommerce_catalog_ordering(); ?>
        </div>

        <!-- لیست محصولات -->
        <main class="jc-shop-content">

            <?php if ( woocommerce_product_loop() ) : ?>

                <div class="jc-products">
                    <?php
                    woocommerce_product_loop_start();

                    while ( have_posts() ) :
                        the_post();
                        wc_get_template_part( 'content', 'product' );
                    endwhile;

                    woocommerce_product_loop_end();
                    ?>
                </div>

                <?php do_action( 'woocommerce_after_shop_loop' ); ?>

            <?php else : ?>

                <div class="jc-empty">
                    <h2>محصولی یافت نشد</h2>
                    <p>هنوز محصولی در این دسته ثبت نشده است.</p>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="jc-btn jc-btn--primary">
                        مشاهده همه محصولات
                    </a>
                </div>

            <?php endif; ?>

        </main>

        <!-- سایدبار فروشگاه -->
        <?php if ( is_active_sidebar( 'sidebar-shop' ) ) : ?>
            <aside class="jc-shop-sidebar">
                <?php dynamic_sidebar( 'sidebar-shop' ); ?>
            </aside>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>