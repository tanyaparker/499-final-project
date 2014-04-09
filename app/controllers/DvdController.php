<?php

class DvdController extends BaseController {

	public function search()
	{
		$genres = Dvd::getGenres();
		$ratings = Dvd::getRatings();

		return View::make('dvds/search', [
			'genres'  => $genres,
			'ratings' => $ratings
		]);
	}

	public function listDvds()
	{
		$title = Input::get('title');
		$genre_id = Input::get('genre_id');
		$rating_id = Input::get('rating_id');
		$dvds = Dvd::search($title, $genre_id, $rating_id);	

		return View::make('dvds/dvds-list', [
			'dvds' => $dvds
		]);
	}

	public function create() 
	{
		$genres = Dvd::getGenres();
		$ratings = Dvd::getRatings();
		$labels = Dvd::getLabels();
		$sounds = Dvd::getSounds();
		$formats = Dvd::getFormats();
		
		return View::make('dvds/create', [
			'genres' => $genres,
			'ratings' => $ratings,
			'labels' => $labels,
			'sounds' => $sounds,
			'formats' => $formats
			]);
	}

	public function insert()
	{
		$validation = Dvd::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::to('dvds/create')
				->withInput()
				->withErrors($validation)
				->with('errors', $validation->messages());
		}
		else {
			$dvd = new Dvd();
			$dvd->title = Input::get('title');
			$dvd->genre_id = Input::get('genre_id');
			$dvd->rating_id = Input::get('rating_id');
			$dvd->label_id = Input::get('label_id');
			$dvd->sound_id = Input::get('sound_id');
			$dvd->format_id = Input::get('format_id');
			$dvd->release_date = Input::get('release_date');
			$dvd->award = Input::get('award');
			$dvd->save();

			return Redirect::to('dvds/create')
				->with('success', 'DVD successfully added.');
		}

	}

}