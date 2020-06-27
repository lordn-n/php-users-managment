<?php
ob_start();

define('__ROOT__', dirname(__FILE__));

// Load configuration
require_once __ROOT__.'/system/config/base.php' ;

// Load backend
require_once __ROOT__.'/system/backend/master.php';

ob_end_flush();
?>
