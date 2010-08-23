<html>
<title> last ten comments </title>
<body>

<h1>hello </h1>


<?php if($query->num_rows() >0): ?>
  
	<?php foreach($query->result() as $row): ?>

	<p>Comment: <?=$row->body ?></p>
        <p>By: <?=$row->author ?></p>
	<hr>	
	<?php endforeach; ?>

<?php endif; ?>






</body>

</html>
