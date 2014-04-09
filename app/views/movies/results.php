<?php require_once 'box.css'; ?>

<!doctype html>
<html>
<head>
	<title>Search Results</title>
</head>

<body>

	<h1><?php ?></h1>

	<table>
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