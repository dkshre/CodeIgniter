<html>
<head>
<title><?=$title ?></title>
</head>

<body>
<h1><?=$heading ?></h1>

<script type="text/javascript" src="/jsfolder/test.js"></script>
<script type="text/javascript" src="/jsfolder/jquery-1.4.2"> </script>
<script type="text/javascript" src="/jsfolder/frameready.js"></script>



<script type="text/javascript" >
	function contentDisp()
	{
		alert("hello");
	}

	function toggleVisibility()
        {
            if (definition.style.visibility == "hidden")
             {
	        definition.style.visibility="visible";
              }
             else
             {
	        definition.style.visibility="hidden";
             }

	 }
</script>

<style type="text/css">
	body
	{
		background-color:#d0e4fe;
	}
       
        a.lightblue{
		color:black;
               cursor:default;
              text-decoration:none;
         }

</style>


<b>Usage examples</b>
<?php if($query->num_rows() >0): ?>
        <ul>
      <?php foreach($queryx->result() as $row): ?>
            <li>   <div id="sin" ><?=$row->sample ?></div> </li>
      <?php endforeach; ?>
       </ul>
<?php endif; ?>

<p><?=$googleexample ?></p>
<!-- <p><?=get_examples_from_google($heading);?> </p> !-->



     <?=form_open('dictionary/entry_gre_display/'.$this->uri->segment(3));?> 
        <input type="submit" value="Next Word"/> 
     </from>
        <input type="button" value="Show/Hide" onclick="toggleVisibility();" />
<p/>


<b>Definition</b>
<div id="definition" style="visibility:hidden" >
<?php if($query->num_rows() >0): ?>
      <?php foreach($query->result() as $row): ?>
             <div>  <?=$row->definition ?>
			<?php if($querySyn->num_rows() >0): ?>
                           <div>[syn:
			      <?php foreach($querySyn->result() as $synrow): ?>
                                    <?php if($synrow->synsetid == $row->synsetid): ?>
				       <?=$synrow->lemma . ', '  ?> 
                                     <?php endif; ?>
			      <?php endforeach; ?>
                           ]</div>
			<?php endif; ?>
              </div>
      <?php endforeach; ?>
<?php endif; ?>
</div>




<p><?=anchor('dictionary','Back to dictionary');?></p>



</body>

</html>
