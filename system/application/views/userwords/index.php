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
//foreach($_SESSION['animals'] as $key=>$value)
  //  {
    // and print out the values
   // echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
  //  }

// loop through the session array with foreach
 echo  $_SESSION['dibesh'];

  //foreach($_SESSION['wordinsession'] as $key=>$value)
   // {
    // and print out the values
   // echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
   // }

?>

<?php if($query->num_rows() >0): ?>

	<?php foreach($query->result() as $row): ?>
      <p><?=anchor('userwords/detail_display/'.$row->lemma.'/'.$this->uri->segment(3),$row->lemma);?></p>
	<hr>	
	<?php endforeach; ?>

<?php endif; ?>


<p><?=anchor('userwords/newx/'.$this->uri->segment(3),'Add new words');?></p>
<p><?=anchor('usertopics','Back to dictionary');?></p>

</body>

</html>
