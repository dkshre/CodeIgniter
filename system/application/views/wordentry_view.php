

<html>
<head>
<title><?=$title ?></title>
</head>

<body onLoad="document.myform.lemma.focus()">
<h1><?= $heading ?> </h1>


<div>
<?php $attributes = array('id' => 'myid', 'name' => 'myform' , 'autocomplete '=>'off');?>

<?=form_open('dictionary/userword_insert', $attributes);?>
<?=form_hidden('topicid', $this->uri->segment(3));?>

	<p><input type="text" name="lemma" /> </p>
	<p><input type="submit" value="Submit entry"/> </p>

</form>
</div>

<p><?=anchor('dictionary','Back to dictionary');?></p>
</body>
</html>
