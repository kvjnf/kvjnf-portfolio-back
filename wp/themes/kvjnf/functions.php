<?php
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'top', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => 'トップ', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'top',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => false, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest' => true,
        'rest_base' => 'top',
    ]);
}

function my_customize_rest_cors() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		header( 'Access-Control-Allow-Origin: *' );
		header( 'Access-Control-Allow-Methods: GET' );
		return $value;
	} );
}
add_action( 'rest_api_init', 'my_customize_rest_cors', 15 );

add_theme_support('post-thumbnails');