<?php

class SongController extends BaseController {

	public function search()
	{
		return View::make('songs/search');
	}

	public function listSongs()
	{
		$title = Input::get('title');
		$artist = Input::get('artist');
		$songs = Song::search($title, $artist);	

		return View::make('songs/songs-list', [
			'songs' => $songs
		]);
	}

}