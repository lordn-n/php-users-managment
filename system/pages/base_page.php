<?php
function build_alerts($alerts) {
    if (count($alerts) == 0) {
        return '';
    }

    $result = '';
    $close_btn = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    foreach ($alerts as $alert) {
        $result .= '<p>'.$alert.'</p>';
    }
    return '<div class="alert alert-dark" role="alert">'.$result.$close_btn.'</div>';
}

function build_css($styles) {
    $result = '';
    foreach ($styles as $css) {
        $result .= '<link rel="stylesheet" href="'.$css.'">';
    }
    return $result;
}

function build_js($javascripts) {
    $result = '';
    foreach ($javascripts as $js) {
        $result .= '<script src="'.$js.'"></script>';
    }
    return $result;
}

if(!isset($title)) {
    $title = $CONFIG['project']['name'];
} else {
    $title = $title.' :: '.$CONFIG['project']['name'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo build_static_url('base.css'); ?>">
    <?php echo build_css($styles); ?>

    <title><?php echo $title; ?></title>
  </head>
  <body>
    <?php echo build_alerts($alerts); ?>

    <?php
        if (isset($handler)) {
            $module = PAGES_DIR.'/'.$handler.'.php';
            include $module;
        }
    ?>

    <!-- Optional JavaScript -->
    <?php echo build_js($javascript); ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
