<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use \ITP\RottenTomatoesAPI\RottenTomatoesSearch;

class MovieController extends BaseController {

	public function home()
	{
		return View::make('quickflix/index');
	}

	public function login()
	{
		return View::make('quickflix/login');
	}

	public function loginProcess()
	{
		$validation = Movie::validateLogin(Input::all());

		if (!$validation->fails()) 
			return View::make('quickflix/login-process');
		else
			return View::make('quickflix/login');
	}

	public function logout()
	{
		return View::make('quickflix/logout');
	}

	public function register()
	{
		return View::make('quickflix/register');
	}

	public function registerProcess()
	{
		$validation = Movie::validateRegistration(Input::all());

		if (!$validation->fails()) {
			$user = new User();
			$user->first = Input::get('first');
			$user->last = Input::get('last');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->save();

			return View::make('quickflix/register-process');
		}
		else
			return View::make('quickflix/register');
	}

	public function favorites()
	{
		// $session = new Session();
		// $id = $session->get('id');
		// $id = Session::get('user_id');
		// var_dump($id);
		$id = 2;
		$result = Movie::getFavorites($id);

		return View::make('quickflix/bucket', [
			'result' => $result
		]);
	}

	public function favorited()
	{
		$session = new Session();
		$id = $session->get('id');

		$title = Input::get('title');
		$rating = Input::get('rating');
		$critics_score = Input::get('critics_score');
		$audience_score = Input::get('audience_score');
		$img_url = Input::get('img_url');
		$synopsis = Input::get('synopsis');

		Movie::addFavorite($title, $rating, $critics_score, $audience_score, $img_url, $synopsis, $id);

		$result = Movie::getFavorites($id);

		return View::make('quickflix/bucket', [
			'result' => $result
		]);
	}

	public function search()
	{
		$title = Input::get('title');
		$search = "movies.json?q=" . $title . "&page_limit=20&page=1&apikey=2hgx4ggggqwsuc94vfwfe783";

		$movies = new RottenTomatoesSearch();
		$result = $movies->getResults($search);

		return View::make('quickflix/search-results', [
			'result' => $result
		]);

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

