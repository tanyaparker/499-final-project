<?php

namespace ITP\FacebookAPI;

class FacebookSearch {

	public static function getResults($query)
	{
		$endpoint = "graph.facebook.com/";
		$endpoint = $endpoint . $query;
	    $json = file_get_contents($endpoint);
	    return json_decode($json);
	}
}

?>