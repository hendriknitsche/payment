<?php
//error_reporting(-1);
//ini_set('display_errors', 'Off');

require 'controller/class.view.php';
require 'controller/class.order.php';

$V = new view();

$V->show('base/head');

$O = new order();

if(!isset($_GET['order_type']))
{
	$V->show('base/header');
	$V->show('home');
}
else
{
	$overpayed = $O->getOverpayedByType($_GET['order_type']);
	$balanced = $O->getBalancedByType($_GET['order_type']);
	$underpayed = $O->getUnderpayedByType($_GET['order_type']);
	
	$V->show('base/header',array(
		'order_type' => $_GET['order_type'],
	));
	
	if(count($overpayed) + count($balanced) + count($underpayed) == 0)
		$V->show('warning/nodata');
	else
		$V->show('orders',array(
			'overpayed' => $overpayed,
			'balanced' => $balanced,
			'underpayed' => $underpayed,
		));
}

$V->show('base/footer');
$V->show('base/foot');
