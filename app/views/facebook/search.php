<?php 
	require 'form.css'; 

	if (Session::has('errors')) : 
        echo "<p style='background-color: red;'>" . Session::get('errors') . "<p>";
	endif; 
?>
<!doctype html>
<html>
<head>
	<title>Facebook Page Search</title>
</head>

<body>

<form method="get" action="/facebook">
	<h1><font face="Helvetica">Facebook Page Search</font></h1>
	<table>
	<tr>
		<td><font face="Helvetica"><b>Search: </b></font></td>
		<td><input type="text" name="search" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit"  value="Search" /></td>
	</tr>
</form>


</body>
</html>