<?php

namespace ITP\FacebookAPI;

class FacebookLogin {

	public static function loginUser($query)
	{
  		$config = array(
      		'appId' => '699561323440769',
      		'secret' => '87d0429e504c24900dcbfb38a9179510',
      		'fileUpload' => false, // optional
      		'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  		);

  		$facebook = new Facebook($config);
	}
}

?>