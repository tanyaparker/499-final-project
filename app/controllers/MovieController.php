<?php

use \ITP\RottenTomatoesAPI\RottenTomatoesSearch;

class MovieController extends BaseController {

	public function home()
	{
		return View::make('quickflix/index');
	}

	public function boxOffice()
	{
		$search = "lists/movies/box_office.json?limit=20&country=us&apikey=2hgx4ggggqwsuc94vfwfe783";

		$result = Cache::get('movies-box');

		if(!$result) {
			$movies = new RottenTomatoesSearch();
			$result = $movies->getResults($search);

			Cache::put('movies-box', $result, 20);

			return View::make('movies/results-box', [
				'result' => $result
			]);

		}
		else { 
			return View::make('movies/results-box', [
				'result' => $result
			]);
		}
	}

	public function comingSoon()
	{
		$search = "lists/movies/opening.json?limit=20&country=us&apikey=2hgx4ggggqwsuc94vfwfe783";

		$result = Cache::get('movies-soon');

		if(!$result) {
			$movies = new RottenTomatoesSearch();
			$result = $movies->getResults($search);

			Cache::put('movies-soon', $result, 20);

			return View::make('quickflix/soon', [
				'result' => $result
			]);

		}
		else { 
			return View::make('quickflix/soon', [
				'result' => $result
			]);
		}
	}

	public function inTheaters()
	{
		$search = "lists/movies/in_theaters.json?page_limit=20&page=1&country=us&apikey=2hgx4ggggqwsuc94vfwfe783";

		$result = Cache::get('movies-theaters');

		if(!$result) {
			$movies = new RottenTomatoesSearch();
			$result = $movies->getResults($search);

			Cache::put('movies-theaters', $result, 20);

			return View::make('quickflix/theaters', [
				'result' => $result
			]);

		}
		else { 
			return View::make('quickflix/theaters', [
				'result' => $result
			]);
		}
	}

}


?>

