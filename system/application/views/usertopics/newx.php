<html>
<head>
<title><?=$title ?></title>
</head>

<body>
<h1><?= $heading ?> </h1>

<?php
// loop through the session array with foreach
foreach($_SESSION['animals'] as $key=>$value)
    { 
    echo 'hello';
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
    }

// loop through the session array with foreach
 echo  $_SESSION['dibesh'];


?>

<?=form_open('usertopics/create');?>
	<p>Topic</p>
	<p><input type="text" name="topic" /> </p>
	<p><input type="submit" value="Submit"/> </p>
</form>

</body>

</html>
