<?php
/**
 * قالب نمایش محصول در لیست - content-product.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

// اگه محصول معتبر نبود، برگرد
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<div <?php wc_product_class( 'jc-product-card', $product ); ?> data-jc-animate>

    <div class="jc-product-card__image">

        <?php
        /**
         * هوک تصویر محصول
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>

        <!-- برچسب تخفیف -->
        <?php if ( $product->is_on_sale() ) : ?>
            <span class="jc-product-card__badge">تخفیف</span>
        <?php endif; ?>

        <!-- دکمه مشاهده سریع -->
        <a href="<?php the_permalink(); ?>" class="jc-product-card__overlay">
            <span>مشاهده</span>
        </a>

    </div>

    <div class="jc-product-card__content">

        <?php
        /**
         * عنوان محصول
         */
        do_action( 'woocommerce_shop_loop_item_title' );
        ?>

        <h3 class="jc-product-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php
        /**
         * قیمت
         */
        do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>

        <!-- دکمه افزودن به سبد -->
        <div class="jc-product-card__actions">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>

    </div>

</div>