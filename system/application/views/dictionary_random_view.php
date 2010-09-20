<html>
<head>
<title>dk</title>
</head>

<body>
<h1>sh</h1>

<script type="text/javascript" src="/jsfolder/test.js"></script>
<script type="text/javascript" src="/jsfolder/jquery-1.4.2"> </script>
<script type="text/javascript" src="/jsfolder/frameready.js"></script>



<script type="text/javascript" >



  /* 
      $(document).ready(function() { 
       var currentword;
           currentword = "passive";
          // put all your jQuery goodness in here.
      googleiframe.src = "http://www.google.com";
   
      googleiframe.src = "http://www.google.com/dictionary?aq=f&langpair=en|en&q="+ currentword +"&hl=en";
   
      });
*/

function contentDisp()
{

//var iframeElement = document.getElementById(googleiframe);
//iframeElement.style.width = "100px";

alert("hello");

//document.getElementById('contentArea').defaultValue = "hello";


//var $currentIFrame = $('#googleiframe');
//var dk = $currentIFrame.contents().find("#hiddenExample").val();
//alert(dk);
//$('#contentArea').load('.', 
//function() {
 // alert('Load was performed.');
//});


/*
$('#contentArea').load('http://dkshre-laptop.cgifederal.com/CodeIgniter/index.php/dictionary/content_display', 
function() {
  alert('Load was performed.');
});

*/

/*
$.ajax({
  url: 'http://dkshre-laptop.cgifederal.com/CodeIgniter/index.php/dictionary/content_display',
  success: function(data) {
    $('#contentArea').html(data);
    alert('Load was performed.');
  }
});
*/

}

</script>



<?php if($query->num_rows() >0): ?>

	<?php foreach($query->result() as $row): ?>
	<p><?=$row->word ?><i> <?=$row->type ?></i> </p>
	<p><?=$row->usages ?> </p>
	<div id="definition" style="visibility:hidden" ><p><?=$row->definition ?> </p></div>
	<div id="etymology" style="visibility:hidden" ><p><?=$row->etymology ?> </p></div>

<input type="button" name="theSubmitButton" id="theSubmitButton" value="Show Definition" onClick="toggleVisibility();">

      <?=form_open('dictionary/entry_random_display');?> 
        <input type="submit" value="Next Word"/> </p>
     </from>
	<hr>	
	<?php endforeach; ?>

<?php endif; ?>

<p><?=anchor('dictionary','Back to dictionary');?></p>


<!--
<input type="button" value="Click" onClick="contentDisp();">
</p>


<textarea id="contentArea" rows="4" cols="30"></textarea>


<iframe id="googleiframe" name="framename" scrolling="auto"   width="100%" height="300">
  <p>Your browser does not support iframes.</p>
</iframe>

-->




</body>

</html>
