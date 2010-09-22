
<html>
<head>
<title><?=$title ?></title>
<link rel="stylesheet" type="text/css" href="/styles/styles.css" />

</head>

<body onLoad="document.myform.lemma.focus()">

<?php
	echo "session:";
	print_r($_SESSION);
?>

<h1><?= $heading ?> </h1>


<div>
<?php $attributes = array('id' => 'myid', 'name' => 'myform' , 'autocomplete '=>'off');?>

<?=form_open('userwords/create', $attributes);?>
<?=form_hidden('usertopic_id', $this->uri->segment(3));?>

	<p><input type="text" name="lemma" /> </p>
	<p><input type="submit" value="Submit entry"/> </p>

</form>
</div>

<p><?=anchor('userwords/index/'.$this->uri->segment(3),'Back to Topic');?> &nbsp;&nbsp;
<?=anchor('usertopics','Back to dictionary');?></p>
</body>
</html>
