<html>
<head>
<title><?=$title?></title>
</head>

<body>
<h1><?=$heading ?></h1>





<?php if($query->num_rows() >0): ?>
	<?php foreach($query->result() as $row): ?>
<?=form_open('usertopics/update');?>
       <input type="hidden" name="id" value="<?=$row->id?>" /> 
	<p>Topic:
	<input type="text" name="topic" value="<?=$row->topic ?>" /> </p>
	<p><input type="submit" value="Submit"/> </p>
</form>
	<?php endforeach; ?>
<?php endif; ?>



</body>

</html>
