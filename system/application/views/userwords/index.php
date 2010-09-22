<html>
<head>
<title><?=$title?></title>
<link rel="stylesheet" type="text/css" href="/styles/styles.css" />

</head>

<body>
<h1><?=$heading ?></h1>


<?php
	echo "session:";
	print_r($_SESSION);
?>
</p>
<?php if($query->num_rows() >0): ?>
	<?php foreach($query->result() as $row): ?>
      <?=anchor('userwords/detail_display/'.$this->uri->segment(3).'/'.$row->id,$row->lemma);?>
	<hr>	
	<?php endforeach; ?>

<?php endif; ?>


<p><?=anchor('userwords/newx/'.$this->uri->segment(3),'Add new words');?></p>
<p><?=anchor('usertopics','Back to dictionary');?></p>

</body>

</html>
