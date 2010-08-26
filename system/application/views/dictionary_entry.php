

<html>
<head>
<title><?=$title ?></title>
</head>

<body>
<h1><?= $heading ?> </h1>



<?=form_open('dictionary/entry_insert');?>

   <div id="dkshre"> hello world  </div>

<p><input type="text" name="word" /> </p>
<p><input type="text" name="type" /> </p>


<p> <textarea name="definition" rows="3" cols="50" ></textarea> </p>
<p> <textarea name="etymology" rows="4" cols="50" ></textarea> </p>
<p> <textarea name="usages" rows="4"  cols="50" ></textarea> </p>



<p><input type="submit" value="Submit entry"/> </p>

</form>
<p><?=anchor('dictionary/entry_display','Back to dictionary');?></p>
<p><?=anchor('dictionary/entry_random_display','Random word');?></p>
</body>
</html>
