<?php
include 'vendor/autoload.php';
$SITE_ROOT =  realpath(dirname(__FILE__));
$json = new \Josantonius\Json\Json('env.json');
$json->set($SITE_ROOT, 'index_dir');
?>