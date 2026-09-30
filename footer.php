<?php
/**
 * پاصفحه سایت - footer.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// مقادیر سفارشی‌ساز
$phone    = get_theme_mod( 'jewelcraft_phone', '۰۲۱-۱۲۳۴۵۶۷۸' );
$email    = get_theme_mod( 'jewelcraft_email', 'info@example.com' );
$address  = get_theme_mod( 'jewelcraft_address', 'تهران، خیابان ...' );

$instagram = get_theme_mod( 'jewelcraft_social_instagram', '' );
$telegram  = get_theme_mod( 'jewelcraft_social_telegram', '' );
$whatsapp  = get_theme_mod( 'jewelcraft_social_whatsapp', '' );
$youtube   = get_theme_mod( 'jewelcraft_social_youtube', '' );
?>

    </main><!-- .jc-main -->

    <!-- ============================================
         پاصفحه سایت
         ============================================ -->
    <footer id="colophon" class="jc-footer">

        <div class="jc-container">

            <div class="jc-footer__grid">

                <!-- ستون ۱: درباره ما -->
                <div class="jc-footer__col jc-footer__about">
                    <h4 class="jc-footer__title">
                        <?php bloginfo( 'name' ); ?>
                    </h4>
                    <p>
                        <?php
                        $description = get_bloginfo( 'description' );
                        echo $description
                            ? esc_html( $description )
                            : 'طراحی و ساخت سفارشی طلا و جواهرات با بالاترین کیفیت و ظرافت.';
                        ?>
                    </p>

                    <!-- شبکه‌های اجتماعی -->
                    <div class="jc-social">
                        <?php if ( $instagram ) : ?>
                            <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener" aria-label="اینستاگرام">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.4 1 .4 2.2.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1 .4-2.2.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.4-1-.4-2.2-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1-.4 2.2-.4 1.3-.1 1.7-.1 4.9-.1zm0 1.8c-3.1 0-3.5 0-4.8.1-1.1.1-1.7.2-2.1.4-.5.2-.9.4-1.2.8-.4.4-.6.7-.8 1.2-.2.4-.3 1-.4 2.1-.1 1.3-.1 1.7-.1 4.8s0 3.5.1 4.8c.1 1.1.2 1.7.4 2.1.2.5.4.9.8 1.2.4.4.7.6 1.2.8.4.2 1 .3 2.1.4 1.3.1 1.7.1 4.8.1s3.5 0 4.8-.1c1.1-.1 1.7-.2 2.1-.4.5-.2.9-.4 1.2-.8.4-.4.6-.7.8-1.2.2-.4.3-1 .4-2.1.1-1.3.1-1.7.1-4.8s0-3.5-.1-4.8c-.1-1.1-.2-1.7-.4-2.1-.2-.5-.4-.9-.8-1.2-.4-.4-.7-.6-1.2-.8-.4-.2-1-.3-2.1-.4-1.3-.1-1.7-.1-4.8-.1zm0 3.1a4.9 4.9 0 1 1 0 9.8 4.9 4.9 0 0 1 0-9.8zm0 8.1a3.2 3.2 0 1 0 0-6.4 3.2 3.2 0 0 0 0 6.4zm6.3-8.3a1.1 1.1 0 1 1-2.3 0 1.1 1.1 0 0 1 2.3 0z"/></svg>
                            </a>
                        <?php endif; ?>

                        <?php if ( $telegram ) : ?>
                            <a href="<?php echo esc_url( $telegram ); ?>" target="_blank" rel="noopener" aria-label="تلگرام">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.6 8.2l-2 9.3c-.1.7-.5.8-1.1.5l-3-2.2-1.5 1.4c-.2.2-.3.3-.6.3l.2-3.1 5.6-5c.2-.2 0-.3-.3-.1l-6.9 4.3-3-.9c-.6-.2-.6-.6.2-.9l11.6-4.5c.5-.2 1 .1.8.9z"/></svg>
                            </a>
                        <?php endif; ?>

                        <?php if ( $whatsapp ) : ?>
                            <a href="<?php echo esc_url( $whatsapp ); ?>" target="_blank" rel="noopener" aria-label="واتساپ">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.1-1.8-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.4.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.3 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1 2.8 1.2 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.5-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.2-.2-.2-.4-.3zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.5 1.3 4.9L2 22l5.2-1.4c1.4.8 3 .9 4.8.9 5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18.2c-1.6 0-3.1-.4-4.4-1.2l-.3-.2-3.1.8.8-3-.2-.3C4 13.9 3.5 13 3.5 12c0-4.7 3.8-8.5 8.5-8.5s8.5 3.8 8.5 8.5-3.8 8.2-8.5 8.2z"/></svg>
                            </a>
                        <?php endif; ?>

                        <?php if ( $youtube ) : ?>
                            <a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener" aria-label="یوتیوب">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2c-.3-1-1.1-1.9-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5c-1 .3-1.8 1.1-2.1 2.1C0 8.1 0 12 0 12s0 3.9.5 5.8c.3 1 1.1 1.9 2.1 2.1 1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5c1-.3 1.8-1.1 2.1-2.1.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8zM9.5 15.6V8.4l6.3 3.6-6.3 3.6z"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ستون ۲: لینک‌های سریع -->
                <div class="jc-footer__col">
                    <h4 class="jc-footer__title">دسترسی سریع</h4>
                    <?php
                    if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'container'      => false,
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                    } else {
                        // لینک‌های پیش‌فرض
                        echo '<ul>';
                        echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">خانه</a></li>';
                        echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">درباره ما</a></li>';
                        echo '<li><a href="' . esc_url( home_url( '/portfolio/' ) ) . '">نمونه‌کارها</a></li>';
                        echo '<li><a href="' . esc_url( home_url( '/shop/' ) ) . '">فروشگاه</a></li>';
                        echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">تماس با ما</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>

                <!-- ستون ۳: خدمات -->
                <div class="jc-footer__col">
                    <h4 class="jc-footer__title">خدمات ما</h4>
                    <ul>
                        <li><a href="#">طراحی سفارشی</a></li>
                        <li><a href="#">ساخت انگشتر</a></li>
                        <li><a href="#">تعمیر جواهرات</a></li>
                        <li><a href="#">سنگ‌شناسی</a></li>
                        <li><a href="#">حکاکی روی طلا</a></li>
                    </ul>
                </div>

                <!-- ستون ۴: اطلاعات تماس -->
                <div class="jc-footer__col">
                    <h4 class="jc-footer__title">تماس با ما</h4>
                    <ul class="jc-footer__contact">
                        <?php if ( $phone ) : ?>
                            <li>
                                <span class="jc-footer__label">تلفن:</span>
                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" dir="ltr">
                                    <?php echo esc_html( $phone ); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ( $email ) : ?>
                            <li>
                                <span class="jc-footer__label">ایمیل:</span>
                                <a href="mailto:<?php echo esc_attr( $email ); ?>" dir="ltr">
                                    <?php echo esc_html( $email ); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ( $address ) : ?>
                            <li>
                                <span class="jc-footer__label">آدرس:</span>
                                <?php echo esc_html( $address ); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

            </div><!-- .jc-footer__grid -->

            <!-- پایین فوتر -->
            <div class="jc-footer__bottom">
                <p>
                    &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
                    <?php bloginfo( 'name' ); ?> —
                    تمامی حقوق محفوظ است.
                </p>
            </div>

        </div><!-- .jc-container -->
    </footer><!-- .jc-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>