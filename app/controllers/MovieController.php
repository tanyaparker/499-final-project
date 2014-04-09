<?php

use \ITP\RottenTomatoesAPI\RottenTomatoesSearch;

class MovieController extends BaseController {

	public function search()
	{
		return View::make('movies/search');
	}

	public function results()
	{
		$search = "lists/movies/box_office.json?limit=20&country=us&apikey=2hgx4ggggqwsuc94vfwfe783";

		$result = Cache::get('movies-all');

		if(!$result) {
			$movies = new RottenTomatoesSearch();
			$result = $movies->getResults($search);

			Cache::put('movies-all', $result, 20);

			return View::make('movies/results', [
				'result' => $result
			]);

		}
		else { 
			return View::make('movies/results', [
				'result' => $result
			]);
		}
	}

}


?>

