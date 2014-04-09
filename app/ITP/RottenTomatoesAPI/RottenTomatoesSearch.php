<?php

namespace ITP\RottenTomatoesAPI;

class RottenTomatoesSearch {

	public static function getResults($query)
	{
		$endpoint = "http://api.rottentomatoes.com/api/public/v1.0/";
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