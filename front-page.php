<?php
/**
 * صفحه اول سایت - front-page.php
 *
 * این فایل وقتی نمایش داده می‌شود که وردپرس صفحه اول را
 * «آخرین مطالب» تنظیم کرده باشد.
 *
 * شامل بخش‌های: Hero، محصولات، نمونه‌کارها، ویژگی‌ها، CTA
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// خواندن مقادیر سفارشی‌ساز
$hero_eyebrow = get_theme_mod( 'jewelcraft_hero_eyebrow', 'دست‌ساز با عشق' );
$hero_title   = get_theme_mod( 'jewelcraft_hero_title', 'جواهراتی که داستان شما را روایت می‌کنند' );
$hero_text    = get_theme_mod( 'jewelcraft_hero_text', 'طراحی و ساخت سفارشی طلا و جواهرات با کیفیت بی‌نظیر.' );
?>

<!-- ============================================
     بخش قهرمان (Hero)
     ============================================ -->
<section class="jc-hero">
    <div class="jc-hero__content jc-animate">

        <?php if ( $hero_eyebrow ) : ?>
            <span class="jc-hero__eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></span>
        <?php endif; ?>

        <h1 class="jc-hero__title jc-animate--delay-1">
            <?php echo esc_html( $hero_title ); ?>
        </h1>

        <div class="jc-divider jc-animate--delay-2">
            <span class="jc-divider__icon">✦</span>
        </div>

        <?php if ( $hero_text ) : ?>
            <p class="jc-hero__text jc-animate--delay-3">
                <?php echo esc_html( $hero_text ); ?>
            </p>
        <?php endif; ?>

        <div class="jc-hero__actions jc-animate--delay-3">
            <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="jc-btn jc-btn--primary">
                مشاهده کلکسیون
            </a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="jc-btn jc-btn--outline">
                سفارش ساخت
            </a>
        </div>

    </div>
</section>

<!-- ============================================
     بخش ویژگی‌ها
     ============================================ -->
<section class="jc-section jc-section--cream">
    <div class="jc-container">

        <div class="jc-section__header">
            <span class="jc-section__eyebrow">چرا ما؟</span>
            <h2 class="jc-section__title">تجربه‌ای متفاوت از جواهرات دست‌ساز</h2>
        </div>

        <div class="jc-features">

            <div class="jc-feature" data-jc-animate>
                <div class="jc-feature__icon">✦</div>
                <h3 class="jc-feature__title">طراحی اختصاصی</h3>
                <p class="jc-feature__text">هر قطعه بر اساس سلیقه و داستان شما از صفر طراحی می‌شود.</p>
            </div>

            <div class="jc-feature" data-jc-animate>
                <div class="jc-feature__icon">✦</div>
                <h3 class="jc-feature__title">کیفیت بی‌نظیر</h3>
                <p class="jc-feature__text">استفاده از بهترین متریال و سنگ‌های اصیل با ضمانت.</p>
            </div>

            <div class="jc-feature" data-jc-animate>
                <div class="jc-feature__icon">✦</div>
                <h3 class="jc-feature__title">ساخت دست‌ساز</h3>
                <p class="jc-feature__text">هر قطعه با دست و دقت استادکاران مجرب ساخته می‌شود.</p>
            </div>

            <div class="jc-feature" data-jc-animate>
                <div class="jc-feature__icon">✦</div>
                <h3 class="jc-feature__title">ارسال مطمئن</h3>
                <p class="jc-feature__text">ارسال بیمه‌شده و مطمئن به سراسر کشور.</p>
            </div>

        </div>

    </div>
</section>

<!-- ============================================
     بخش آخرین محصولات / نمونه‌کارها
     ============================================ -->
<section class="jc-section">
    <div class="jc-container">

        <div class="jc-section__header">
            <span class="jc-section__eyebrow">کلکسیون ما</span>
            <h2 class="jc-section__title">آخرین ساخته‌ها</h2>
            <p class="jc-section__subtitle">گزیده‌ای از طراحی‌ها و ساخته‌های اخیر کارگاه</p>
        </div>

        <div class="jc-products">

            <?php
            // آخرین ۶ مطلب یا محصول را نمایش بده
            $recent = new WP_Query( array(
                'posts_per_page' => 6,
                'post_status'    => 'publish',
            ) );

            if ( $recent->have_posts() ) :
                while ( $recent->have_posts() ) :
                    $recent->the_post();
                    ?>
                    <article class="jc-product-card" data-jc-animate>

                        <div class="jc-product-card__image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'jewelcraft-product', array( 'loading' => 'lazy' ) ); ?>
                                </a>
                            <?php else : ?>
                                <div class="jc-product-card__placeholder">✦</div>
                            <?php endif; ?>
                        </div>

                        <div class="jc-product-card__content">
                            <h3 class="jc-product-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <span class="jc-product-card__price">استعلام قیمت</span>
                        </div>

                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="jc-empty-text">هنوز محصولی ثبت نشده است. از پیشخوان، اولین محصول خود را اضافه کنید.</p>';
            endif;
            ?>

        </div>

    </div>
</section>

<!-- ============================================
     بخش دعوت به اقدام (CTA)
     ============================================ -->
<section class="jc-section jc-section--dark">
    <div class="jc-container">
        <div class="jc-cta">

            <span class="jc-section__eyebrow">سفارش اختصاصی</span>
            <h2 class="jc-section__title">می‌خواهید قطعه‌ای منحصربه‌فرد داشته باشید؟</h2>
            <p class="jc-section__subtitle">
                ایده‌تان را با ما در میان بگذارید. از طراحی تا ساخت، همراه شما هستیم.
            </p>

            <div class="jc-cta__actions">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="jc-btn jc-btn--primary">
                    شروع گفتگو
                </a>
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="jc-btn jc-btn--outline">
                    درباره کارگاه
                </a>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>