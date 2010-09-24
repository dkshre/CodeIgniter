<html>
<head>
<title><?=$title ?></title>
<link rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>

<body>

<h1><?=$heading ?></h1>
<b>Usages of &nbsp;<?=$word ?></b>


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

<p>
     <?=form_open('userwords/request_detail_display/'.$this->uri->segment(3).'/'.$wordid   ); ?> 
	<input type="submit" value="Previous Word" name="action" />         
	<input type="submit" value="Next Word" name="action" /> 
     </from>
        <input type="button" value="Show/Hide" onclick="toggleVisibility();" />
<p/>

<?php if($query->num_rows() >0): ?>
        <ul>
      <?php foreach($queryx->result() as $row): ?>
            <li>   <div id="sin" ><?=$row->sample ?></div> </li>
      <?php endforeach; ?>
       </ul>
<?php endif; ?>

<!-- calling model to get get example from google -->
<p><?= $this->userword->get_google_example($word)?></p>


<b>Definition</b>
<div id="definition" style="visibility:hidden" >
<?php if($query->num_rows() >0): ?>
      <?php foreach($query->result() as $row): ?>
             <div>  <?=$row->definition ?>
		<?php
			if($querySyn->num_rows() >0){
			 echo "<div> [syn:";
				$listSyn = $querySyn->result_array();
				for($i = 0; $i < sizeof($listSyn); ++$i) 		
				    if($listSyn[$i]['synsetid'] == $row->synsetid){
				      // echo "<a href=.>" . $listSyn[$i]['lemma'] . "</a>" ; 
                                         echo $listSyn[$i]['lemma'];
				       if ( (($i+1)<sizeof($listSyn)) && $listSyn[$i]['synsetid']==$listSyn[$i+1]['synsetid'] )
					 echo ", ";
				    }
			 echo "]</div>";
			}		
		?>
              </div>
      <?php endforeach; ?>
<?php endif; ?>
</div>

<p>
   <?=anchor('userwords/index/'.$this->uri->segment(3),'Back to Topic');?> &nbsp;&nbsp;
   <?=anchor('usertopics','Back to dictionary');?>
</p>


<?php
	echo "session:";
	print_r($_SESSION);
?>
</body>

</html>
