<?php
/**
 * نمایش صفحات معمولی - page.php
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
        <h1 class="jc-page-header__title"><?php the_title(); ?></h1>
        <?php
        // اگه صفحه والد داره، لینکش رو نشون بده
        $parent_id = wp_get_post_parent_id( get_the_ID() );
        if ( $parent_id ) :
            ?>
            <div class="jc-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">خانه</a>
                <span> / </span>
                <a href="<?php echo esc_url( get_permalink( $parent_id ) ); ?>">
                    <?php echo esc_html( get_the_title( $parent_id ) ); ?>
                </a>
                <span> / </span>
                <span><?php the_title(); ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="jc-container">
    <div class="jc-layout <?php echo is_active_sidebar( 'sidebar-main' ) ? 'jc-layout--with-sidebar' : ''; ?>">

        <main class="jc-content-area">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'jc-single' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="jc-single__thumb">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="jc-single__content">
                        <?php the_content(); ?>
                    </div>

                </article>
                <?php

                // اگه نظرات باز بود
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            endwhile;
            ?>
        </main>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>