<?php require 'form.css'; ?>
<!doctype html>
<html>
<head>
	<title>DVD Search</title>
</head>

<body>

<form method="get" action="/dvds">
	<h1><font face="Helvetica">DVD Search</font></h1>
	<table>
	<tr>
		<td><font face="Helvetica"><b>DVD Title:</b></font></td>
		<td><input type="text" name="title" /></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Genre:</b></font></td>
		<td><select name="genre_id">
			<option value="All">All</option>
			<?php foreach ($genres as $genre) :
				echo "<option value='$genre->id'>$genre->genre_name</option>";
			endforeach; ?>
		</select></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Rating:</b></font></td>
		<td><select name="rating_id">
			<option value="All">All</option>
			<?php foreach ($ratings as $rating) :
				echo "<option value='$rating->id'>$rating->rating_name</option>";
			endforeach; ?>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit"  value="Search" /></td>
	</tr>
</form>


</body>
</html>