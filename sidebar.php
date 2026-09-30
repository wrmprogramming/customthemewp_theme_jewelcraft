<?php
/**
 * سایدبار - sidebar.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// اگه سایدبار فعال نبود، هیچی نشون نده
if ( ! is_active_sidebar( 'sidebar-main' ) ) {
    return;
}
?>

<aside id="secondary" class="jc-sidebar">
    <?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside>