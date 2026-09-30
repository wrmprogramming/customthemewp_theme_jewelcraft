<?php
/**
 * فرم جستجو - searchform.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="jc-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">
        جستجو برای:
    </label>
    <input
        type="search"
        id="<?php echo esc_attr( $unique_id ); ?>"
        class="jc-search-form__input"
        placeholder="جستجو..."
        value="<?php echo get_search_query(); ?>"
        name="s"
    >
    <button type="submit" class="jc-search-form__submit" aria-label="جستجو">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>
</form>