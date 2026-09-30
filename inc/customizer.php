<?php
/**
 * تنظیمات سفارشی‌ساز وردپرس
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ثبت تنظیمات در سفارشی‌ساز
 */
function jewelcraft_customize_register( $wp_customize ) {

    // ---------- بخش اطلاعات تماس ----------
    $wp_customize->add_section( 'jewelcraft_contact', array(
        'title'    => 'اطلاعات تماس (JewelCraft)',
        'priority' => 30,
    ) );

    // شماره تلفن
    $wp_customize->add_setting( 'jewelcraft_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'jewelcraft_phone', array(
        'label'   => 'شماره تلفن',
        'section' => 'jewelcraft_contact',
        'type'    => 'text',
    ) );

    // ایمیل
    $wp_customize->add_setting( 'jewelcraft_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'jewelcraft_email', array(
        'label'   => 'ایمیل',
        'section' => 'jewelcraft_contact',
        'type'    => 'email',
    ) );

    // آدرس
    $wp_customize->add_setting( 'jewelcraft_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'jewelcraft_address', array(
        'label'   => 'آدرس',
        'section' => 'jewelcraft_contact',
        'type'    => 'text',
    ) );

    // ---------- بخش شبکه‌های اجتماعی ----------
    $wp_customize->add_section( 'jewelcraft_social', array(
        'title'    => 'شبکه‌های اجتماعی (JewelCraft)',
        'priority' => 31,
    ) );

    $socials = array(
        'instagram' => 'اینستاگرام',
        'telegram'  => 'تلگرام',
        'whatsapp'  => 'واتساپ',
        'youtube'   => 'یوتیوب',
    );

    foreach ( $socials as $key => $label ) {
        $wp_customize->add_setting( "jewelcraft_social_{$key}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "jewelcraft_social_{$key}", array(
            'label'   => $label,
            'section' => 'jewelcraft_social',
            'type'    => 'url',
        ) );
    }

    // ---------- متن Hero ----------
    $wp_customize->add_section( 'jewelcraft_hero', array(
        'title'    => 'بخش قهرمان (Hero)',
        'priority' => 32,
    ) );

    $wp_customize->add_setting( 'jewelcraft_hero_eyebrow', array(
        'default'           => 'دست‌ساز با عشق',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'jewelcraft_hero_eyebrow', array(
        'label'   => 'متن بالای عنوان',
        'section' => 'jewelcraft_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'jewelcraft_hero_title', array(
        'default'           => 'جواهراتی که داستان شما را روایت می‌کنند',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'jewelcraft_hero_title', array(
        'label'   => 'عنوان اصلی',
        'section' => 'jewelcraft_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'jewelcraft_hero_text', array(
        'default'           => 'طراحی و ساخت سفارشی طلا و جواهرات با کیفیت بی‌نظیر.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'jewelcraft_hero_text', array(
        'label'   => 'متن توضیحی',
        'section' => 'jewelcraft_hero',
        'type'    => 'textarea',
    ) );
}
add_action( 'customize_register', 'jewelcraft_customize_register' );