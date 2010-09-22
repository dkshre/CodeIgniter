<html>
<head>
<title><?=$title ?></title>
<link rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>

<body>

<?php
	echo "session:";
	print_r($_SESSION);
?>
<h1><?=$heading ?></h1>
<h2><?=$word ?></h2>

<script type="text/javascript" src=""></script>

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


<b>Usage examples</b>
<?php if($query->num_rows() >0): ?>
        <ul>
      <?php foreach($queryx->result() as $row): ?>
            <li>   <div id="sin" ><?=$row->sample ?></div> </li>
      <?php endforeach; ?>
       </ul>
<?php endif; ?>

<!-- calling model to get get example from google -->
<p><?= $this->userword->get_google_example($word)?></p>

     <?=form_open('userwords/random_detail_display/'.$this->uri->segment(3).'/'.$wordid   ); ?> 
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



<p><?=anchor('userwords/index/'.$this->uri->segment(3),'Back to Topic');?> &nbsp;&nbsp;
<?=anchor('usertopics','Back to dictionary');?></p>



</body>

</html>
