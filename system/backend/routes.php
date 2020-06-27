<?php
define('PAGES_DIR', __ROOT__.'/system/pages');

switch ($handler) {
    case 'home':
        $title = 'Home';
        add_css('home');
        add_js('home');
        break;

    case 'profile':
        $title = 'Profile';
        $home_page = 'profile';
        $handler = 'home';
        add_css('home');
        add_js('home');
        break;

    case 'login':
        $title = 'Login';
        add_css('login');
        add_js('login');
        break;

    case 'logout':
        $title = 'Logout';
        add_css('logout');
        break;

    case 'signup':
        $title = 'Signup';
        add_css('signup');
        add_js('signup');
        break;

    default:
        $title = 'Page not found';
        $err_msg = 'Unknown page "<code>'.htmlspecialchars($handler).'</code>"';
        $handler = 'error';
        add_css('error');
        break;
}

require_once PAGES_DIR.'/base_page.php';
?>
