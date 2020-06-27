<?php
$CONFIG = array(
    'project' => array(
        'name' => 'Users managment',
        'version' => 1.0
    ),
    'debug' => false,
    'environment' => null,
    'db' => array(
        'host' => '',
        'name' => '',
        'username' => '',
        'password' => ''
    )
);

$ENVS_VAR_PREFIX = strtoupper(str_replace([' '], ['_'], $CONFIG['project']['name'])).'_';

$CONFIG['environment'] = strtolower(getenv($ENVS_VAR_PREFIX.'ENVIRONMENT') ? getenv($ENVS_VAR_PREFIX.'ENVIRONMENT') : 'dev');

$CONFIG['db']['host'] = getenv($ENVS_VAR_PREFIX.'DB_HOST');
$CONFIG['db']['name'] = getenv($ENVS_VAR_PREFIX.'DB_NAME');
$CONFIG['db']['username'] = getenv($ENVS_VAR_PREFIX.'DB_USERNAME');
$CONFIG['db']['password'] = getenv($ENVS_VAR_PREFIX.'DB_PASSWORD');

require_once(dirname(__FILE__).'/'.$CONFIG['environment'].'.php');
?>
