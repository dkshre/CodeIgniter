<html>
<head>
<title><?=$title ?></title>
<link rel="stylesheet" type="text/css" href="/styles/styles.css" />


</head>

<body>


<h1><?=$heading ?></h1>
<h2>Usages example of &nbsp;<?=$word ?></h2>


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


<?php if($query->num_rows() >0): ?>
        <ul>
      <?php foreach($queryx->result() as $row): ?>
            <li>   <div id="sin" ><?=$row->sample ?></div> </li>
      <?php endforeach; ?>
       </ul>
<?php endif; ?>

<!-- calling model to get get example from google -->
<p><?= $this->userword->get_google_example($word)?></p>

     <?=form_open('userwords/request_detail_display/'.$this->uri->segment(3) .'/'.$this->uri->segment(4)  ); ?> 

	<input type="submit" value="Previous Word" name="action" />         
	<input type="submit" value="Next Word" name="action" /> 
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



<p><?=anchor('userwords/index/'.$this->uri->segment(3),'Back to Topic');?>
<?=anchor('usertopics','Back to dictionary');?></p>


<?php
	echo "session:";
	print_r($_SESSION);
?>

</body>

</html>
