<?php

namespace ITP\TwitterAPI;

class TwitterSearch {

	public static function getResults($query)
	{
		$endpoint = "http://twitter.com/statuses/";
	    $json = file_get_contents($endpoint);
	    return json_decode($json);
	}
}

?>