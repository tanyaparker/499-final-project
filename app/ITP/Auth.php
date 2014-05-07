<?php

namespace ITP;

class Auth {

	protected $pdo;
	protected $email;
	protected $password;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function attempt($email, $password) {

		$sql = "SELECT *
				FROM users
				WHERE email = ?
				AND password = SHA1(?)";

		$statement = $this->pdo->prepare($sql);
		$statement->bindParam(1, $email);
		$statement->bindParam(2, $password);
    	$statement->execute();

    	$results = $statement->fetchAll();
    	$num = sizeof($results);

    	if($num == 1) {
    		$this->email = $results[0]['email'];
    		$this->password = $results[0]['password'];
    		return true;
    	}
    	else {
    		return false;
    	}
	}

	public function getEmail() {
		return $this->email;
	}
}

?>