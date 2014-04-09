<?php require_once 'box.css'; ?>

<!doctype html>
<html>
<head>
	<title>Search Results</title>
</head>

<body>

	<h1>Top 20 Grossing Movies</h1>

	<table>
	<tr>
		<td><b>Title</b></td>
		<td><b>Rating</b></td>
		<td><b>Critic Score</b></td>
		<td><b>Audience Score</b></td>
	</tr>
	<?php 
		foreach($result->movies as $m) {
			echo "<tr>";
			echo "<td>" . $m->title . "</td>";
			echo "<td>" . $m->mpaa_rating . "</td>";
			echo "<td>" . $m->ratings->critics_score . "</td>";
			echo "<td>" . $m->ratings->audience_score . "</td>";
			echo "</tr>";
		}
	?>
	</table>

</body>
</html>