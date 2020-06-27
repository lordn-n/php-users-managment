<?php
require_once __ROOT__.'/system/models/User.php';

if (array_key_exists('user', $_SESSION)) {
    $user = new User($_SESSION['user']);

    if ($user->find_by_id() === false) {
        $_SESSION = array();
        ob_end_clean();
        header('Location: /login');
        exit;
    }
} else {
    // how do you get here? go login!
    $_SESSION = array();
    session_destroy();

    ob_end_clean();
    header('Location: /login');
    exit;
}

include __ROOT__.'/system/pages/navbar.php';
?>
<main role="main" class="container">
    <div class="starter-template">
        <?php
            if (!isset($home_page)) {
                echo "<h1>Welcome home $user->name</h1>";
            } else {
                include __ROOT__.'/system/pages/'.$home_page.'.php';
            }
        ?>
    </div>
</main>
