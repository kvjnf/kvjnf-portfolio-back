<?php
/*
Plugin Name: WP API カスタマイズプラグイン
Description: 共通で使うAPIカスタマイズ用プラグイン
Version: 1.0
*/



add_filter( 'rest_endpoints', function( $endpoints ){
    if ( isset( $endpoints['/wp/v2'] ) ) {
        unset( $endpoints['/wp/v2'] );
    }
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    if ( isset( $endpoints['/wp/v2/users/me'] ) ) {
        unset( $endpoints['/wp/v2/users/me'] );
    }
    if( isset( $endpoints['/wp/v2/settings'])){
        unset( $endpoints['/wp/v2/settings']);
    }

    return $endpoints;
});
