<?php
/**
 * صفحه محصول تکی - نسخه حرفه‌ای
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

while ( have_posts() ) :
    the_post();
    global $product;
    ?>

    <!-- نوار مسیر (Breadcrumb) -->
    <div class="jc-product-breadcrumb">
        <div class="jc-container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">خانه</a>
            <span class="jc-sep">/</span>
            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">فروشگاه</a>
            <span class="jc-sep">/</span>
            <?php
            $terms = get_the_terms( get_the_ID(), 'product_cat' );
            if ( $terms && ! is_wp_error( $terms ) ) {
                $cat = $terms[0];
                echo '<a href="' . esc_url( get_term_link( $cat ) ) . '">'
                    . esc_html( $cat->name ) . '</a>';
                echo '<span class="jc-sep">/</span>';
            }
            ?>
            <span class="jc-current"><?php the_title(); ?></span>
        </div>
    </div>

    <!-- بخش اصلی محصول -->
    <div class="jc-product-hero">
        <div class="jc-container">
            <div class="jc-product-hero__grid">

                <!-- ستون تصاویر -->
                <div class="jc-product-hero__gallery">
                    <div class="jc-gallery-wrapper">
                        <?php
                        /**
                         * گالری محصول ووکامرس
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                        ?>
                    </div>
                </div>

                <!-- ستون اطلاعات -->
                <div class="jc-product-hero__info">

                    <!-- دسته‌بندی -->
                    <?php
                    $cats = get_the_terms( get_the_ID(), 'product_cat' );
                    if ( $cats && ! is_wp_error( $cats ) ) :
                        ?>
                        <span class="jc-product-hero__cat">
                            <?php echo esc_html( $cats[0]->name ); ?>
                        </span>
                    <?php endif; ?>

                    <!-- عنوان -->
                    <h1 class="jc-product-hero__title"><?php the_title(); ?></h1>

                    <!-- امتیاز -->
                    <?php if ( $product->get_average_rating() > 0 ) : ?>
                        <div class="jc-product-hero__rating">
                            <?php woocommerce_template_single_rating(); ?>
                        </div>
                    <?php endif; ?>

                    <!-- خط تزئینی -->
                    <div class="jc-product-hero__divider">
                        <span>✦</span>
                    </div>

                    <!-- قیمت -->
                    <div class="jc-product-hero__price">
                        <?php woocommerce_template_single_price(); ?>
                    </div>

                    <!-- توضیح کوتاه -->
                    <?php if ( $product->get_short_description() ) : ?>
                        <div class="jc-product-hero__excerpt">
                            <?php woocommerce_template_single_excerpt(); ?>
                        </div>
                    <?php endif; ?>

                    <!-- فرم افزودن به سبد -->
                    <div class="jc-product-hero__cart">
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>

                    <!-- اطلاعات اعتماد -->
                    <div class="jc-product-trust">
                        <div class="jc-product-trust__item">
                            <span class="jc-product-trust__icon">✓</span>
                            <div>
                                <strong>ضمانت اصالت</strong>
                                <small>تضمین کیفیت و اصالت کالا</small>
                            </div>
                        </div>
                        <div class="jc-product-trust__item">
                            <span class="jc-product-trust__icon">🚚</span>
                            <div>
                                <strong>ارسال مطمئن</strong>
                                <small>ارسال بیمه‌شده به سراسر کشور</small>
                            </div>
                        </div>
                        <div class="jc-product-trust__item">
                            <span class="jc-product-trust__icon">↺</span>
                            <div>
                                <strong>بازگشت ۷ روزه</strong>
                                <small>امکان بازگشت تا ۷ روز</small>
                            </div>
                        </div>
                    </div>

                    <!-- متا (دسته، برچسب) -->
                    <div class="jc-product-hero__meta">
                        <?php woocommerce_template_single_meta(); ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- تب‌های محصول -->
    <div class="jc-product-tabs-section">
        <div class="jc-container">
            <?php woocommerce_output_product_data_tabs(); ?>
        </div>
    </div>

    <!-- محصولات مرتبط -->
    <div class="jc-product-related">
        <div class="jc-container">
            <?php woocommerce_output_related_products(); ?>
        </div>
    </div>

    <?php
endwhile;

get_footer();