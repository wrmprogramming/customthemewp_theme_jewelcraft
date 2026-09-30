<?php
/**
 * نمایش یک پست - single.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

while ( have_posts() ) :
    the_post();
    ?>

    <div class="jc-page-header jc-page-header--post">
        <div class="jc-container">
            <div class="jc-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">خانه</a>
                <span> / </span>
                <?php
                $cats = get_the_category();
                if ( ! empty( $cats ) ) {
                    echo '<a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '">'
                        . esc_html( $cats[0]->name ) . '</a><span> / </span>';
                }
                ?>
                <span><?php the_title(); ?></span>
            </div>

            <h1 class="jc-page-header__title"><?php the_title(); ?></h1>

            <div class="jc-post-meta">
                <span><?php echo esc_html( get_the_date() ); ?></span>
                <span>•</span>
                <span><?php the_author(); ?></span>
                <?php if ( has_category() ) : ?>
                    <span>•</span>
                    <span><?php the_category( '، ' ); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="jc-container">
        <div class="jc-layout <?php echo is_active_sidebar( 'sidebar-main' ) ? 'jc-layout--with-sidebar' : ''; ?>">

            <main class="jc-content-area">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'jc-single' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="jc-single__thumb">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="jc-single__content">
                        <?php the_content(); ?>

                        <?php
                        // صفحه‌بندی داخل پست
                        wp_link_pages( array(
                            'before' => '<div class="jc-page-links">صفحات: ',
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php if ( has_tag() ) : ?>
                        <div class="jc-single__tags">
                            <?php the_tags( 'برچسب‌ها: ', '، ' ); ?>
                        </div>
                    <?php endif; ?>

                </article>

                <!-- ناوبری بین پست‌ها -->
                <nav class="jc-post-nav">
                    <div class="jc-post-nav__item jc-post-nav__item--prev">
                        <?php previous_post_link( '%link', '→ %title' ); ?>
                    </div>
                    <div class="jc-post-nav__item jc-post-nav__item--next">
                        <?php next_post_link( '%link', '%title ←' ); ?>
                    </div>
                </nav>

                <?php
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
            </main>

            <?php get_sidebar(); ?>

        </div>
    </div>

    <?php
endwhile;

get_footer();