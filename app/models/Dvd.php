<?php

class Dvd extends Eloquent {

	public static function search($title, $genre_id, $rating_id)
	{
		$query= Dvd::where('title', 'LIKE', "%$title%")
			->take(30)
			->join('genres', function($join) {
				$join->on('dvds.genre_id', '=', 'genres.id');
				})
			->join('ratings', function($join) {
				$join->on('dvds.rating_id', '=', 'ratings.id');
				})
			->join('labels', function($join) {
				$join->on('dvds.label_id', '=', 'labels.id');
				})
			->join('sounds', function($join) {
				$join->on('dvds.sound_id', '=', 'sounds.id');
				})
			->join('formats', function($join) {
				$join->on('dvds.format_id', '=', 'formats.id');
				});

		if($genre_id != "All") {
			$query->where('genre_id', '=', $genre_id);
		}	

		if($rating_id != 'All') {
			$query->where('rating_id', '=', $rating_id);
		}	

		$dvds = $query->get();
		return $dvds;	
	}

	public static function validate($input)
    {
        return Validator::make($input, [
          'title'	=> 'required|alpha_num|min:3',
          'genre_id'	=> 'required|integer',
          'rating_id'	=> 'required|integer',
          'label_id'	=> 'required|integer',
          'sound_id'	=> 'required|integer',
          'format_id'	=> 'required|integer'
        ]);
    }

	public static function getGenres() {
		$query = DB::table('genres')
			->select('id', 'genre_name');
		$genres = $query->get();
		return $genres;
	}

	public static function getRatings() {
		$query = DB::table('ratings')
			->select('id', 'rating_name');
		$ratings = $query->get();
		return $ratings;
	}

	public static function getSounds() {
		$query = DB::table('sounds')
			->select('id', 'sound_name');
		$sounds = $query->get();
		return $sounds;
	}

	public static function getLabels() {
		$query = DB::table('labels')
			->select('id', 'label_name');
		$labels = $query->get();
		return $labels;
	}

	public static function getFormats() {
		$query = DB::table('formats')
			->select('id', 'format_name');
		$formats = $query->get();
		return $formats;
	}

	public function format()
  	{
    	return $this->belongsTo('Format');
  	}

  	public function genre()
  	{
    	return $this->belongsTo('Genre');
  	}

  	public function label()
  	{
    	return $this->belongsTo('Label');
  	}

  	public function rating()
  	{
    	return $this->belongsTo('Rating');
  	}

  	public function sound()
  	{
    	return $this->belongsTo('Sound');
  	}


}