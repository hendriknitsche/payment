<?php

require 'model/class.orderModel.php';

class order {
	
	public $orderModel;

	function __construct()
	{
		$this->orderModel = new orderModel();
	}
	
	public function getPayroll($order = false)
	{
		if($order === false)
			return false;

		$sum = 0;

		$claims = $this->orderModel->getClaimsByOrder($order['id']);
		if(count($claims) != 0) foreach($claims as $claim)
			$sum += $claim['amount'];

		$payments = $this->orderModel->getPaymentsByOrder($order['id']);
		if(count($payments) != 0) foreach($payments as $payment)
			$sum -= $payment['amount'];

		$this->orderModel->setSatus($order['id'],$sum);
		
		return $sum;
	}
	
	public function getOverpayedByType($order_type = false)
	{
		if($order_type === false)
			return false;

		$orders = $this->orderModel->get($order_type);

		if(count($orders)) foreach($orders as $i => $order)
		{
			$orders[$i]['sum'] = $this->getPayroll($order);
			if($orders[$i]['sum'] <= 0)
				unset($orders[$i]);
		}

		return $orders;
	}
  
	public function getUnderpayedByType($order_type = false)
	{
		if($order_type === false)
			return false;
		
		$orders = $this->orderModel->get($order_type);

		if(count($orders)) foreach($orders as $i => $order)
		{
			$orders[$i]['sum'] = $this->getPayroll($order);
			if($orders[$i]['sum'] >= 0)
				unset($orders[$i]);
		}

		return $orders;
	}
  
	public function getBalancedByType($order_type = false)
	{
		if($order_type === false)
			return false;
		
		$orders = $this->orderModel->get($order_type);

		if(count($orders)) foreach($orders as $i => $order)
		{
			$orders[$i]['sum'] = $this->getPayroll($order);
			if($orders[$i]['sum'] != 0)
				unset($orders[$i]);
		}

		return $orders;
	}
  
}
