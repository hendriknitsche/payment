<?php
error_reporting(-1);
ini_set('display_errors', 'Off');
require 'config/db.php';

require 'controller/class.view.php';

$V = new view();
$V->show('base/head');
$V->show('base/header');
$V->show('home');
$V->show('base/footer');
$V->show('base/foot');
?>
