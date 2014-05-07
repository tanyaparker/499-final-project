<?php

namespace ITP;

class Auth {

	protected $pdo;
	protected $email;
	protected $password;
	protected $id;

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
    		$this->id = $results[0]['id'];
    		return true;
    	}
    	else {
    		return false;
    	}
	}

	public function getEmail() {
		return $this->email;
	}

	public function getId() {
		return $this->id;
	}
}

?>