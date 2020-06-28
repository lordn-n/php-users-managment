<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keys = array('name', 'email', 'old_password', 'new_password1', 'new_password2');
    $update = true;

    foreach ($keys as $key) {
        if (array_key_exists($key, $_POST) && !empty(trim($_POST[$key]))) {
            $_POST[$key] = trim($_POST[$key]);

            if (in_array($key, array('name', 'email'))) {
                $user->$key = $_POST[$key];
            }
        }
    }

    if (!empty($_POST['old_password']) && !empty($_POST['new_password1']) && !empty($_POST['new_password2'])) {
        if (password_verify($_POST['old_password'], $user->password)) {
            if ($_POST['new_password1'] === $_POST['new_password2']) {
                $user->password = $_POST['new_password1'];
            } else {
                array_push($alerts, 'New passwords doesnt match. I can NOT update it.');
                $update = false;
            }
        } else {
            array_push($alerts, 'Old password does NOT match. I can NOT update it.');
            $update = false;
        }
    }

    if ($update === true) {
        if ($user->save()) {
            array_push($alerts, 'Changes saved successfully!');
        } else {
            array_push($alerts, 'Sorry. There was an error saving your changes');

            $user = new User($_SESSION['user']);

            if ($user->find_by_id() === false) {
                $_SESSION = array();
                ob_end_clean();
                header('Location: /login');
                exit;
            }
        }
    }

    if (count($alerts) > 0) {
        echo build_alerts($alerts);
    }
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
    <div class="card noborder">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Hi <?php echo $user->name; ?></h4>
            <p class="text-center">Here you can edit your profile!</p>
            <form class="form-signin" action="/profile" method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text" value="<?php echo $user->name ?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $user->email ?>">
                </div>
                <hr>
                <p>You can also change your password here</p>
                <hr>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="old_password" class="form-control" placeholder="Current password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="new_password1" class="form-control" placeholder="New password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="new_password2" class="form-control" placeholder="Repeat new password" type="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                </div>
            </form>
        </article>
    </div>
</div>

