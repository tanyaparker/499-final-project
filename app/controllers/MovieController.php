<?php

use \ITP\RottenTomatoesAPI\RottenTomatoesSearch;

class MovieController extends BaseController {

	public function search()
	{
		return View::make('movies/search');
	}

	public function results()
	{
		$search = Input::get('search');
		$search = "lists/movies/box_office.json?limit=20&country=us&apikey=2hgx4ggggqwsuc94vfwfe783";

		$movies = new RottenTomatoesSearch();
		$result = $movies->getResults($search);

		if($result) {

			return View::make('movies/results', [
				'result' => $result
			]);

		}
		else {
			return Redirect::to('movies/search')	
				->withInput()
				->with('errors', 'Sorry, ' . $search . ' does not exist.');
		}
	}

}

?>