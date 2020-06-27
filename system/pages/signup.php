<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alerts = array();
    $name = '';
    $email = '';

    if (empty(trim($_POST['name']))) {
        array_push($alerts, 'Please enter your name');
    } else{
        $name = trim($_POST['name']);
    }

    if (empty(trim($_POST['email']))) {
        array_push($alerts, 'Please enter your email');
    } else{
        $email = trim($_POST['email']);
    }

    if (empty(trim($_POST['password1'])) or empty(trim($_POST['password2']))) {
        array_push($alerts, 'Please enter a valid password');
    } elseif (trim($_POST['password1']) != trim($_POST['password2'])) {
        array_push($alerts, 'Passwords does not match');
    } elseif (strlen(trim($_POST['password1'])) < 6) {
        array_push($alerts, 'Passwords needs to have at least 6 characters');
    } else {
        $password = trim($_POST['password1']);
    }

    if (count($alerts) == 0) {
        require_once __ROOT__.'/system/models/User.php';
        $user = new User(null, $name, $email, $password);
        $user_id = $user->search_by_email();

        if ($user_id === false) {
            $user_id = $user->save();
            if ($user_id !== false) {
                $_SESSION['userid_created'] = $user_id;
                ob_end_clean();
                header('Location: /login');
                exit;
            }
        } else {
            array_push($alerts, 'User already exists!');
        }

    }
    echo build_alerts($alerts);
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
    <div class="card noborder">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Please fill in the form with your information</p>
            <form class="form-signin" action="/signup" method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text" required="" value="<?php echo $name ?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" required="" value="<?php echo $email ?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password1" class="form-control" placeholder="Password" type="password" required="">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password2" class="form-control" placeholder="Repeat password" type="password" required="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                </div>
                <p class="text-center">Have an account? <a href="/login">Log In</a> </p>
            </form>
        </article>
    </div>
</div>
