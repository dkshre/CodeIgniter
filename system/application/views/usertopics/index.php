<html>
<head>
<title><?=$title?></title>
</head>

<body>
<h1><?=$heading ?></h1>

<style type="text/css">
	body
	{
		background-color:#d0e4fe;
	}
       
</style>
<?php
// loop through the session array with foreach
foreach($_SESSION['animals'] as $key=>$value)
    {
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
    }

// loop through the session array with foreach
 echo  $_SESSION['dibesh'];


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
