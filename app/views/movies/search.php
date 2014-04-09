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

<form method="get" action="/movies">
	<h1><font face="Helvetica">Movies Search</font></h1>
	<table>
	<tr>
<!-- 		<td><font face="Helvetica"><b>Search: </b></font></td>
		<td><input type="text" name="search" /></td> -->
	</tr>
	<tr>
		<td></td>
		<td><input type="submit"  value="Search" /></td>
	</tr>
</form>


</body>
</html>