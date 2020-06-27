<?php
require_once __ROOT__.'/system/models/User.php';

dprint($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alerts = array();

    if (empty(trim($_POST['email']))) {
        array_push($alerts, 'Please enter your email');
    } else{
        $email = trim($_POST['email']);
    }

    if (empty(trim($_POST['password']))) {
        array_push($alerts, 'Please enter your password');
    } else{
        $password = trim($_POST['password']);
    }

    $user = new User(null, null, $email, $password);
    $user_id = $user->search_by_email();

    if ($user_id === false) {
        array_push($alerts, 'Wrong credentials. Sorry :(');
    } else {
        ob_end_clean();
        $_SESSION['logged'] = true;
        header('Location: /home');
        exit;
    }
} else {
    if (array_key_exists('userid_created', $_SESSION)) {
        $user = new User($_SESSION['userid_created']);
        $user_id = $user->find_by_id();

        if ($user_id !== false) {
            array_push($alerts, 'User "'.$user->name.'" created successfully! you can now login!');
        }
    }
}

if (count($alerts) > 0) {
    echo build_alerts($alerts);
}
?>
<form class="form-signin" action="/login" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">
    <div class="checkbox mb-3">
        <label>
            Don't have an account? <a href="/signup">Sign up</a> now!
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">By Arturo Bruno</p>
</form>
