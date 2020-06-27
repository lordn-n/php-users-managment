<?php
require_once __ROOT__.'/system/models/User.php';

$user = new User($_SESSION['user']);

if ($user->find_by_id() === false) {
    $_SESSION = array();
    ob_end_clean();
    header('Location: /login');
    exit;
}

$_SESSION = array();
session_destroy();
?>
<div class="container">
    <div class="card noborder">
        <h1>
            Thanks for coming by <?php echo $user->name; ?>.<br>
            Hope you come back later!
        </h1>
        <hr>
        <a href="/login">Login</a>
    </div>
</div>
