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

<?php if($query->num_rows() >0): ?>

	<?php foreach($query->result() as $row): ?>
	<p><?=$row->topic ?>
       <?=anchor('usertopics/edit/'.$row->id,'Edit');?> 
        </P>
       <p>
	<?=anchor('userwords/index/'.$row->id,'See words');?>
        <?=anchor('userwords/newx/'.$row->id,'Enter a new word');?>

	
       <p>


	<hr>	
	<?php endforeach; ?>

<?php endif; ?>


<p><?=anchor('usertopics/newx','Create new topic');?>&nbsp;&nbsp;
<?=anchor('usertopics','Back to dictionary');?></p>





</body>

</html>
