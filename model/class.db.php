<?php

require 'config/db.php';

class db {

	private $servername = SERVERNAME;
	private $username = USERNAME;
	private $password = PASSWORD;
	private $dbname = DBNAME;

	public function query($sql) {
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		if (mysqli_connect_errno()) return "Connection failed: " . mysqli_connect_error();
		$escapedSQL = mysqli_real_escape_string($conn, $sql);
		$result = mysqli_query($conn, $sql);
		if($result instanceof mysqli_result) while ($row = mysqli_fetch_array($result)) {
			$data[] = $row;
		}
		return $data;
	}
	
}