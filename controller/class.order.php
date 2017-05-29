<?php

class order {

	private $servername = SERVERNAME;
	private $username = USERNAME;
	private $password = PASSWORD;
	private $dbname = DBNAME;

	private function query($sql) {
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		if (mysqli_connect_errno()) return "Connection failed: " . mysqli_connect_error();
		$escapedSQL = mysqli_real_escape_string($conn, $sql);
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result)) {
			$data[] = $row;
		}
		return $data;
	}

	private function create($data) {
		return true;
	}

	public function update($data) {
		return true;
	}
  
}
