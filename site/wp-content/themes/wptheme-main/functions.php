<?php

require_once(get_template_directory() . '/inc/theme-setup.php'); 

require_once(get_template_directory() . '/inc/widgets.php'); 

require_once(get_template_directory() . '/inc/forms.php');

require_once(get_template_directory() . '/inc/manifest.php'); 

require_once(get_template_directory() . '/inc/service-worker.php'); 

require_once(get_template_directory() . '/inc/cpt.php');

function sync_acf_title_with_post_title( $post_id ) {
    if ( get_post_type( $post_id ) !== 'products' ) {
        return;
    }

    remove_action( 'save_post', 'sync_acf_title_with_post_title' );

    $post_title = get_the_title( $post_id );
    update_field( 'title', $post_title, $post_id );

    add_action( 'save_post', 'sync_acf_title_with_post_title' );
}
add_action( 'save_post', 'sync_acf_title_with_post_title' );

function sync_post_title_with_acf_title( $post_id ) {
    if ( get_post_type( $post_id ) !== 'products' ) {
        return;
    }

    $acf_title = get_field( 'title', $post_id );
    if ( $acf_title ) {
        remove_action( 'acf/save_post', 'sync_post_title_with_acf_title' );

        wp_update_post([
            'ID'         => $post_id,
            'post_title' => $acf_title,
        ]);

        add_action( 'acf/save_post', 'sync_post_title_with_acf_title', 20 );
    }
}
add_action( 'acf/save_post', 'sync_post_title_with_acf_title', 20 );
