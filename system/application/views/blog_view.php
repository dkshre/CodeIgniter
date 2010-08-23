<html>
<head>
<title><?=$title ?></title>
</head>

<body>
<h1><?= $heading ?> </h1>

<?php

echo 'hello';

$arr1 = array(10, 20, 30);
echo $arr1[0];
echo $arr1[1];

?>
<hr>
<?php



$arr = array('foo' => 'bar', 12 => true);
echo $arr["foo"];
echo $arr[12];

?>


<?php foreach($query->result() as $row): ?>

<h3><?=$row->title ?> </h3>
<p><?=$row->body ?></p>
<hr>

<p><?=anchor('blog/comments/'.$row->id,'Comments');?></p>

<?php endforeach; ?>


<p> <?=anchor('blog/lasttencomments', 'Last Ten Comments'); ?></p>


</body>

</html>
