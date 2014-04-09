<?php 
	require 'form.css'; 

	if (Session::has('errors')) : 
        echo "<p style='background-color: red;'>" . Session::get('errors') . "<p>";
	endif; 
?>
<!doctype html>
<html>
<head>
	<title>Movies Search</title>
</head>

<body>

<h1><font face="Helvetica">Movies</font></h1>

<a href="/movies/box-office">Top 20 Grossing Movies</a>
<p>
<a href="/movies/in-theaters">Movies Currently in Theaters</a>



</body>
</html>