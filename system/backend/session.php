<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = parse_url(urldecode($_SERVER['REQUEST_URI']));
$handler = explode('/', $page['path'])[1];

$needs_login = array(
    'home',
    'logout',
    'admin'
);

if ($handler == '' && isset($_SESSION['logged'])) {
    header('Location: /home');
} elseif (($handler == '' || in_array($handler, $needs_login)) && !isset($_SESSION['logged'])) {
    header('Location: /login');
}
?>
