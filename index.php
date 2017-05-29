<?php
error_reporting(-1);
ini_set('display_errors', 'Off');

require 'controller/class.order.php';
require 'config/db.php';

$order = new order();
