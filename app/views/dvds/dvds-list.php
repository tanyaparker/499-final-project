<?php require_once 'box.css'; ?>

<!doctype html>
<html>
<head>
	<title>DVD Results</title>
</head>

<body>
	<h1>Your search returned: </h1>

	<?php if(sizeof($dvds) >= 1) {?>
<table>

	<tr style="font-size: 20px;">
		<td><b><u>Title</u></b></td>
		<td><b><u>Rating</u></b></td>
		<td><b><u>Genre</u></b></td>
		<td><b><u>Label</u></b></td>
		<td><b><u>Sound</u></b></td>
		<td><b><u>Format</u></b></td>
		<td><b><u>Release Date</b></u></td>
	</tr>
	<?php foreach($dvds as $dvd) : ?>
		<tr>
			<td><?php echo $dvd->title; ?></td>
			<td><?php echo $dvd->rating_name; ?></td>
			<td><?php echo $dvd->genre_name; ?></td>
			<td><?php echo $dvd->label_name; ?></td>
			<td><?php echo $dvd->sound_name; ?></td>
			<td><?php echo $dvd->format_name; ?></td>
			<td><?php echo $dvd->release_date; ?></td>
		</tr>
		
	<?php endforeach; ?>
</table>
<?php
}
else {
	echo "<h1>nothing. Try again!</h1>";
}
?>

</body>
</html>