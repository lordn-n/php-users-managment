<?php

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
    <div class="card noborder">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Hi <?php echo $user->name; ?></h4>
            <p class="text-center">Here you can edit your profile!</p>
            <form class="form-signin" action="/profile" method="put">
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

