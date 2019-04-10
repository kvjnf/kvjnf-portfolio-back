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
    register_post_type( 'experiences', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '職歴', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'experiences',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => false, // アーカイブ機能ON/OFF
        'menu_position' => 6,     // 管理画面上での配置場所
        'show_in_rest' => true,
        'rest_base' => 'experiences',
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

// カスタム投稿タイプのオーダーをmenu_order属性で出来るようにする
add_filter( 'rest_experiences_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );
function my_prefix_add_rest_orderby_params( $params ) {
    $params['orderby']['enum'][] = 'menu_order';

    return $params;
}

add_theme_support('post-thumbnails');
// rest apiの時にcontent要素のtagを外す。
remove_filter ('the_content',  'wpautop');
