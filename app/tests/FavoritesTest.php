<?php

require __DIR__ . '/../models/Movie.php';

class FavoritesTest extends PHPUnit_Framework_TestCase {

	public function setUp() 
	{
    	parent::setUp();
	}

	public function test_1()
	{
		// Arrange
		$title = "My Movie";
		$rating = "PG-13";
		$critics_score = "87";
		$audience_score = "95";
		$img_url = "http://placehold.it/350x150";
		$synopsis = "My move is awesome";
		$id = "1";

		// Act
		$result = Movie::addFavorite($title, $rating, $critics_score, $audience_score, $img_url, $synopsis, $id);

		// Assert
		$this->assertCount(1, $result);
	}

	public function test_2()
	{
		// Arrange
		$title = "My Movie";
		$critics_score = "87";
		$audience_score = "95";
		$img_url = "http://placehold.it/350x150";
		$synopsis = "My move is awesome";
		$id = "1";

		// Act
		$result = Movie::removeFavorite($title, $critics_score, $audience_score, $img_url, $synopsis, $id);

		// Assert
		$this->assertTrue($result);
	}

}

?>