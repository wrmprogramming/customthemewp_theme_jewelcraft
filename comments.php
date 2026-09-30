<?php
/**
 * بخش نظرات - comments.php
 *
 * @package JewelCraft
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// اگه بعد از رمز عبور باشه، نمایش نده
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="jc-comments">

    <?php if ( have_comments() ) : ?>

        <h3 class="jc-comments__title">
            <?php
            $count = get_comments_number();
            printf(
                '%s نظر',
                number_format_i18n( $count )
            );
            ?>
        </h3>

        <ol class="jc-comments__list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ) );
            ?>
        </ol>

        <?php
        the_comments_pagination( array(
            'prev_text' => '← قبلی',
            'next_text' => 'بعدی →',
        ) );
        ?>

    <?php endif; ?>

    <?php
    comment_form( array(
        'title_reply'          => 'نظر خود را بنویسید',
        'title_reply_to'       => 'پاسخ به %s',
        'cancel_reply_link'    => 'لغو پاسخ',
        'label_submit'         => 'ارسال نظر',
        'comment_notes_before' => '',
        'comment_field'        => '<p class="comment-form-comment">'
            . '<label for="comment">نظر شما</label>'
            . '<textarea id="comment" name="comment" cols="45" rows="6" required></textarea>'
            . '</p>',
    ) );
    ?>

</div>