<?php
/**
 * آرشیو مطالب - archive.php
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
        <?php
        if ( is_category() ) {
            echo '<span class="jc-section__eyebrow">دسته‌بندی</span>';
            echo '<h1 class="jc-page-header__title">' . single_cat_title( '', false ) . '</h1>';
            the_archive_description( '<div class="jc-archive-desc">', '</div>' );
        } elseif ( is_tag() ) {
            echo '<span class="jc-section__eyebrow">برچسب</span>';
            echo '<h1 class="jc-page-header__title">' . single_tag_title( '', false ) . '</h1>';
        } elseif ( is_author() ) {
            echo '<span class="jc-section__eyebrow">نویسنده</span>';
            echo '<h1 class="jc-page-header__title">' . get_the_author() . '</h1>';
        } elseif ( is_year() || is_month() || is_day() ) {
            echo '<span class="jc-section__eyebrow">آرشیو تاریخ</span>';
            echo '<h1 class="jc-page-header__title">' . get_the_archive_title() . '</h1>';
        } else {
            echo '<h1 class="jc-page-header__title">' . get_the_archive_title() . '</h1>';
        }
        ?>
    </div>
</div>

<div class="jc-container">
    <div class="jc-layout <?php echo is_active_sidebar( 'sidebar-main' ) ? 'jc-layout--with-sidebar' : ''; ?>">

        <main class="jc-content-area">

            <?php if ( have_posts() ) : ?>

                <div class="jc-posts-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', get_post_type() );
                    endwhile;
                    ?>
                </div>

                <?php jewelcraft_pagination(); ?>

            <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>