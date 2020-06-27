<?php
define('PAGES_DIR', __ROOT__.'/system/pages');

switch ($handler) {
    case 'home':
        $title = 'Home';
        add_css('home');
        add_js('home');
        break;

    case 'login':
        $title = 'Login';
        add_css('login');
        add_js('login');
        break;

    case 'logout':
        require_once PAGES_DIR.'/logout.php';
        break;

    case 'signup':
        $title = 'Signup';
        add_css('signup');
        add_js('signup');
        break;

    case 'password-reset':
        require_once PAGES_DIR.'/password_reset.php';
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
