<html>
<head>
<title><?=$title ?></title>
<link rel="stylesheet" type="text/css" href="/styles/styles.css" />

</head>

<body>
<h1><?= $heading ?> </h1>

<?php
	echo "session:";
	print_r($_SESSION);
?>


<?=form_open('usertopics/create');?>
	<p>Topic:
	<input type="text" name="topic" size="35" /> </p>
	<p><input type="submit" value="Submit"/> </p>
</form>

</body>

</html>
