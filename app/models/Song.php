<?php

class Song {

	public static function search($title, $artist)
	{
		$query = DB::table('songs')
			->select('title', 'artist_name', 'genre', 'added')
			->join('artists', 'artists.id', '=', 'songs.artist_id')
			->join('genres', 'songs.genre_id', '=', 'genres.id');

		if($title) {
			$query->where('title', 'LIKE', "%$title%");
		}

		if($artist) {
			$query->where('artist_name', 'LIKE', "%$artist%");
		}	

		$songs = $query->get();

		return $songs;	
	}
}