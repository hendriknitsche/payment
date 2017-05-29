<?php

require 'model/class.db.php';

class orderModel extends db
{
	public function get($type = '')
	{
		$query = "SELECT id,order_type,compound_name FROM orders";
		if($type != "")
			$query .= ' WHERE order_type="'.$type.'"';
		$orders = $this->query($query);
		
		return $orders;
	}
	
	public function getClaimsByOrder($order_id)
	{
		$claims = $this->query("SELECT * FROM order_claims WHERE order_id=".$order_id);
		
		return $claims;
	}

	public function getPaymentsByOrder($order_id)
	{
		$claims = $this->query("SELECT * FROM order_payments WHERE order_id=".$order_id);
		
		return $claims;
	}
	
	public function setSatus($order_id,$sum)
	{
		if($sum == 0)
			$status = 'balanced';
		elseif($sum > 0)
			$status = 'overpayed';
		else
			$status = 'underpayed';
		$order_status = $this->query("SELECT * FROM status WHERE order_id=".$order_id);
		if(!isset($order_status[0]))
			$this->query("INSERT INTO status (order_id,deposit,status) VALUES (".$order_id.",".$sum.",'".$status."')");
		else
			$this->query("UPDATE status SET deposit = ".$sum.",status = '".$status."' WHERE order_id = ".$order_id);
	}
}
