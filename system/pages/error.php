<?php
if (!isset($err_msg)) {
    $err_msg = 'Page not found, sorry...';
}
?>
<div class="container">
    <div class="card noborder">
        <h1><?php echo $err_msg; ?></h1>
        <hr>
        <a href="/home">Home</a>
    </div>
</div>
