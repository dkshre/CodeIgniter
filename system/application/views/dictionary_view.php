<html>
<head>
<title>dk</title>
</head>

<body>
<h1>sh</h1>


<?php if($query->num_rows() >0): ?>

	<?php foreach($query->result() as $row): ?>
	<p><?=$row->word ?></p>
	<p><?=$row->type ?> </p>
	<p><?=$row->definition ?> </p>
	<p><?=$row->etymology ?> </p>
	<p><?=$row->usages ?> </p>

	<hr>	
	<?php endforeach; ?>

<?php endif; ?>

<p><?=anchor('dictionary','Back to dictionary');?></p>


</body>

</html>
