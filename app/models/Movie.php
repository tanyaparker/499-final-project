<?php

class Movie extends Eloquent {

	public static function validateLogin($input)
    {
        return Validator::make($input, [
          'email'	=> 'required|email',
          'password'	=> 'required|min:7'
        ]);
    }

    public static function validateRegistration($input)
    {
        return Validator::make($input, [
          'first'	=> 'required|alpha_num',
          'last' 	=> 'required|alpha_num',
          'email'	=> 'required|email',
          'password'	=> 'required|min:7'
        ]);
    }

    public static function getFavorites($id) {
    	$query = DB::table('favorites')
    		->take(20)
    		->where('user_id', '=', $id)
    		->join('ratings', function($join) {
				$join->on('favorites.rating_id', '=', 'ratings.id');
				});
    	$favorites = $query->get();
    	return $favorites;
    }

    public static function addFavorite($title, $mpaa_rating, $critics_score, $audience_score, $img_url, $synopsis, $id) {

    	if($mpaa_rating == "R")
    		$rating_id = 1;
    	else if($mpaa_rating == "PG-13")
    		$rating_id = 2;
    	else if($mpaa_rating == "PG")
    		$rating_id = 3;
    	else
    		$rating_id = 4;

    	$query = DB::table('favorites')->insert(
    		array(	'user_id' => $id,
		    		'title' => $title, 
		    		'rating_id' => $rating_id,
		    		'critics_score' => $critics_score,
		    		'audience_score' => $audience_score,
		    		'img_url' => $img_url,
		    		'synopsis' => $synopsis)
			);
    }


}