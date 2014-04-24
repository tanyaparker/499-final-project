<?php
	$config = array(
      	'appId' => '699561323440769',
      	'secret' => '87d0429e504c24900dcbfb38a9179510',
      	'fileUpload' => false, // optional
      	'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  	);

  	$facebook = new Facebook($config);
  	$user_id = $facebook->getUser();
?>

<!doctype html>
<html>
<head>
	<title>Login</title>
</head>

<body>

<?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        $friends = $facebook->api('/me/friends', 'GET');
        var_dump($friends);
        echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>

</body>
</html>