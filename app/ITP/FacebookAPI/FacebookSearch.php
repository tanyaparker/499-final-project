<?php

namespace ITP\FacebookAPI;

class FacebookSearch {

	public static function getResults($query)
	{
		$endpoint = "http://graph.facebook.com/";
		$endpoint = $endpoint . $query;

		try {
			$json = @file_get_contents($endpoint);
			return json_decode($json);
		}
		catch (Exception $e) {
			return false;
		}
	}
}

?>