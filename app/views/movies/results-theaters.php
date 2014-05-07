<!doctype html>
<html>
<head>
	<title>Search Results</title>
</head>

<body>

	<h1>20 Movies Currently in Theaters</h1>

	<table>
	<tr>
		<td><b>Poster</b></td>
		<td><b>Title</b></td>
		<td><b>Rating</b></td>
		<td><b>Critic Score</b></td>
		<td><b>Audience Score</b></td>
		<td><b>Synopsis</b></td>
		<td><b>Add to Favorites</b></td>
	</tr>

	<?php 
		foreach($result->movies as $m) {
			echo "<tr>";
			echo "<td><img src=".$m->posters->detailed."></td>";
			echo "<td>" . $m->title . "</td>";
			echo "<td>" . $m->mpaa_rating . "</td>";
			echo "<td>" . $m->ratings->critics_score . "</td>";
			echo "<td>" . $m->ratings->audience_score . "</td>";
			echo "<td>" . $m->synopsis . "</td>";
			echo "<td>Add</td>";
			echo "</tr>";
		}
	?>
	</table>

</body>
</html>