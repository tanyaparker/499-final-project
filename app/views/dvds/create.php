<?php 
	require 'form.css'; 

	if (Session::has('success')) : 
        echo "<p style='background-color: green;'>" . Session::get('success') . "<p>";
	endif;

	if (Session::has('errors')) : 
        echo "<p style='background-color: red;'>" . Session::get('errors') . "<p>";
	endif; 
?>
<!doctype html>
<html>
<head>
	<title>DVD Insert</title>
</head>

<body>

<form method="post" action="/dvds">
	<h1><font face="Helvetica">DVD Insert</font></h1>
	<table>
	<tr>
		<td><font face="Helvetica"><b>DVD Title:</b></font></td>
		<td><input type="text" name="title" value="<?php echo Input::old('title') ?>"/></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Release Date</b></font></td>
		<td><input type="text" name="release_date" /></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Award:</b></font></td>
		<td><input type="text" name="award" /></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Genre:</b></font></td>
		<td><select name="genre_id">
			<?php foreach ($genres as $genre) :
				echo "<option value='$genre->id'>$genre->genre_name</option>";
			endforeach; ?>
		</select></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Rating:</b></font></td>
		<td><select name="rating_id">
			<?php foreach ($ratings as $rating) :
				echo "<option value='$rating->id'>$rating->rating_name</option>";
			endforeach; ?>
		</select></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Label:</b></font></td>
		<td><select name="label_id">
			<?php foreach ($labels as $label) :
				echo "<option value='$label->id'>$label->label_name</option>";
			endforeach; ?>
		</select></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Sound:</b></font></td>
		<td><select name="sound_id">
			<?php foreach ($sounds as $sound) :
				echo "<option value='$sound->id'>$sound->sound_name</option>";
			endforeach; ?>
		</select></td>
	</tr>
	<tr>
		<td><font face="Helvetica"><b>Format:</b></font></td>
		<td><select name="format_id">
			<?php foreach ($formats as $format) :
				echo "<option value='$format->id'>$format->format_name</option>";
			endforeach; ?>
		</select></td>
	</tr>

	<tr>
		<td></td>
		<td><input type="submit"  value="Create DVD" /></td>
	</tr>
</form>


</body>
</html>