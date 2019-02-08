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