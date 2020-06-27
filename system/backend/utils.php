<?php
$alerts = array();
$styles = array();
$javascript = array();

define('STATICS_DIR', __ROOT__.'/statics');

function dprint($element) {
    echo '<hr><pre class="debug">';
    var_dump($element);
    echo '</pre></hr>';
}

function add_alert($alert) {
    global $alerts;
    array_push($alerts, $alert);
}

function add_css($css) {
    global $styles;

    $css_file = build_static_url($css.'.css');
    if (file_exists(STATICS_DIR.'/css/'.$css.'.css')) {
        array_push($styles, $css_file);
    }
}

function add_js($js) {
    global $javascript;

    $js_file = build_static_url($js.'.js');
    if (file_exists(STATICS_DIR.'/js/'.$js.'.js')) {
        array_push($javascript, $js_file);
    }
}

function build_static_url($file) {
    $images = array('png', 'jpeg', 'jpg', 'gif', 'svg');
    $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')."://$_SERVER[HTTP_HOST]";

    if (in_array($type, $images)) {
        $type = 'img';
    }

    $url = $base_url.'/statics/'.$type.'/'.$file;
    return $url;
}
?>
