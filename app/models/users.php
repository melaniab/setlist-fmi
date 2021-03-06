<?php

require('framework/base_model.php');

class Users extends BaseModel {

	public $table_name = 'users';

	function register($email, $password) {
		$sql = "INSERT INTO users (email, password) VALUES(?, ?)";
		$stmt = $this->conn->prepare($sql);
		$result = $stmt->execute(array($email, sha1($password)));
		return $result;
	}

	function login($email, $password) {
		$sql = "SELECT * FROM users WHERE email=? and password=?";
		$stmt = $this->conn->prepare($sql);
		$result = $stmt->execute(array($email, sha1($password)));
		return $result;
	}

}