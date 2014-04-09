<?php

use \ITP\TwitterAPI\TwitterSearch;

class TwitterController extends BaseController {

	public function search()
	{
		return View::make('twitter/search');
	}

	public function results()
	{
		$search = Input::get('search');
		//$result = TwitterSearch::getResults($search);	

		$twitter = new TwitterSearch();
		$query = "https://twitter.com/search?q=%40twitterapi"
		$result = $twitter->getResults($query);

		dd($result);

		return View::make('twitter/results', [
			'result' => $result
		]);
	}

}

?>