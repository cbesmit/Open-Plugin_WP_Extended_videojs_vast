<?php
/**
* Plugin Name:       Extended videojs-vast plugin for wordpress
* Description:       Reproductor de video que carga un VAST file dentro del video, creando un ADS mediante un shortcode. basado en https://github.com/theonion/videojs-vast-plugin. Shortcode [BESVID width="px" height="px" mp4="url del archivo mp4, obligatorio" webm="url del archivo webm, obligatorio" vast="url del archivo xml VAST, obligatorio"]
* Version:           1.0.0
* Author:            Besmit
* Author URI:        https://github.com/cbesmit/Extended-videojs-vast-plugin-wordpress
* License:           GPL-2.0+
*/
 
function wp_BES_videoADS_add_css_js() {
    wp_register_style( 'video-js-css', 'http://vjs.zencdn.net/4.7.1/video-js.css');
    wp_enqueue_style( 'video-js-css' );
    wp_register_style( 'videojs-ads-css', plugins_url( '/lib/videojs-contrib-ads/videojs.ads.css', __FILE__ ) );
    wp_enqueue_style( 'videojs-ads-css' );
    wp_register_style( 'videojs-vast-css', plugins_url( '/videojs.vast.css', __FILE__ ) );
    wp_enqueue_style( 'videojs-vast-css' );

    wp_enqueue_script(
        'video_js',
        'http://vjs.zencdn.net/4.7.1/video.js',
        array( 'jquery' )
    );
    wp_enqueue_script(
    'videojs_ads_js',
        plugins_url( '/lib/videojs-contrib-ads/videojs.ads.js', __FILE__ ),
        array( 'jquery' )
    );
    wp_enqueue_script(
        'vast_client_js',
        plugins_url( '/lib/vast-client.js', __FILE__ ),
        array( 'jquery' )
    );
    wp_enqueue_script(
        'videojs_vast_js',
        plugins_url( '/videojs.vast.js', __FILE__ ),
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts',  'wp_BES_videoADS_add_css_js' );

function wp_BES_videoADS ( $atts ) {
    $a = shortcode_atts( array(
    'width' => '640',
    'height' => '400',
    'mp4' => '',
    'webm' => '',
    'id' => uniqid('BES_videoADS'),
    'vast' => ''
    ), $atts );

    if(empty($a["mp4"]) || empty($a["webm"]) || empty($a["vast"])){
        return "<div>Faltan parametros para generar el video</div>";
    }

    return '<video id="'.$a["id"].'" class="video-js vjs-default-skin" autoplay controls preload="auto" data-setup="{}" width="'.$a["width"].'" height="'.$a["height"].'">
        <source src="'.$a["mp4"].'" type="video/mp4">
        <source src="'.$a["webm"].'" type="video/webm">
        <p>Video Playback Not Supported</p>
        </video>
        <script>
        var vid2 = videojs("'.$a["id"].'");
        vid2.muted(true);
        vid2.ads();
        vid2.vast({
        url: "'.$a["vast"].'"
        });
        </script>';
}

add_shortcode('BESVID', 'wp_BES_videoADS');