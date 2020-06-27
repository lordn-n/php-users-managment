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
}

include __ROOT__.'/system/pages/navbar.php';
?>
<main role="main" class="container">
    <div class="starter-template">
        <h1>Welcome home <?php echo $user->name; ?></h1>
    </div>
</main>
