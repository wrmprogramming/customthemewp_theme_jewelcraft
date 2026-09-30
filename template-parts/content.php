<?php
/**
 * قالب نمایش هر پست
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'jc-post-card' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="jc-post-card__thumb">
            <?php the_post_thumbnail( 'jewelcraft-product', array( 'loading' => 'lazy' ) ); ?>
        </a>
    <?php endif; ?>

    <div class="jc-post-card__body">

        <h2 class="jc-post-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="jc-post-card__meta">
            <span><?php echo esc_html( get_the_date() ); ?></span>
        </div>

        <div class="jc-post-card__excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="jc-btn jc-btn--outline jc-post-card__more">
            ادامه مطلب
        </a>

    </div>

</article>