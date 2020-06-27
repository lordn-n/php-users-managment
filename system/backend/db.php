<?php
try{
    $DB = new PDO(
        'mysql:host='.$CONFIG['db']['host'].';dbname='.$CONFIG['db']['name'],
        $CONFIG['db']['username'],
        $CONFIG['db']['password']
    );

    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. ".$e->getMessage());
}
?>
