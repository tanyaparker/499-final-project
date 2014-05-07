<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

require_once 'db.php';
use ITP\Auth;

$session = new Session();
$session->start();

$request = Request::createFromGlobals();
$email = $request->request->get('email');
$password = $request->request->get('password');

$auth = new Auth($pdo);
$login = $auth->attempt($email, $password);

$loggedIn = $session->get('email');

if ($login) { //if logging in for first time
	$session->set('email', $auth->getEmail());
	$session->set('id', $auth->getId());
	$session->set('loginTime', time());
	
	$response = new RedirectResponse('/quickflix/bucket');
	$response->send();
}
else if (!empty($loggedIn)) { //else if already logged in
	$response = new RedirectResponse('/quickflix/bucket');
	$response->send();
}
else { //else if not logged in at all
	$response = new RedirectResponse('/quickflix/login');
	$response->send();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Process</title>
</head>

<body>
</body>

</html>
