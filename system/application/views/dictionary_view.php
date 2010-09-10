<html>
<head>
<title><?=$title?></title>
</head>

<body>
<h1><?=$heading ?></h1>


<?php if($query->num_rows() >0): ?>

	<?php foreach($query->result() as $row): ?>
	<p><?=$row->topic ?></p>
        <?=anchor('dictionary/word_insert/'.$row->topicid,'Enter a new word');?>
	<?=anchor('dictionary/entry_gre_display/'.$row->topicid,'Start learning');?>
	<?=anchor('dictionary','See words');?>
	<hr>	
	<?php endforeach; ?>

<?php endif; ?>

<p><?=anchor('dictionary','Back to dictionary');?></p>





</body>

</html>
