

<?php

class Dictionary extends Controller{

	function Dictionary()
	{
		parent::Controller();
               $this->load->helper('url');
              $this->load->helper('form');
              $this->load->helper('example');
	}

	function index()
	{
	   	$data['title'] = "Understanding words";
		$data['heading'] = "All topics home";
            
               $this->db->select('ut.id, ut.topic'); 
               $this->db->from('user_topics ut');
               $data['query'] = $this->db->get();
               $this->load->view('dictionary_view', $data);

	}


	function word_insert(){
		$data['title'] = "Catchword";
		$data['heading'] = "Enter a new word";  
		$this->load->view('wordentry_view', $data);
	}

      function userword_insert(){
            #insert ino userwords tables
            # do validation make sure word is a valid word(word exists in words tables
            # do validation make sure word is not already entered for this list
             #(for given topicid there is not preexisted that word
           
        $this->db->select('uw.lemma'); 
        $this->db->from('user_words uw');
        $this->db->where('uw.lemma',$_POST['lemma']);
        $this->db->where('uw.id', $_POST['id']);
        $checkwordinUW = $this->db->get();
   
        $data['message'] = "test"; 

	if ($checkwordinUW->num_rows() > 0)
	{ 
	   #echo $checkwordinUW->row(1)->lemma;
	  # echo "<pre>word previously entered for this topic</pre>";
	# $this->load->view('dictionary/word_insert/'.$_POST['topicid'], $data);
        redirect('dictionary/word_insert/'.$_POST['usertopic_id'].'/preexisted', $data);
	} 
         else
         {     
		#new word for the topic, make sure it is a valid word
		$this->db->select('wd.lemma'); 
		$this->db->from('words wd');
		$this->db->where('wd.lemma',$_POST['lemma'] );
		$checkword = $this->db->get();
		if ($checkword->num_rows() > 0)
		{ 
			# echo $checkword->row(1)->lemma;
		   	#echo "<pre>Word is entered for this topic</pre>";
	   		$this->db->insert('user_words', $_POST);
			redirect('dictionary/word_insert/'.$_POST['usertopic_id'].'/newwordinserted');
		} 
                else
                {
	   	   #echo "<pre>Not a valid word </pre>";
		  redirect('dictionary/word_insert/'.$_POST['usertopic_id'].'/notavalidword');
                }

         }




      }

      function Entry_gre_display(){


       ### selects a random word from user created list of words ###
        $this->db->select('uw.lemma'); 
        $this->db->from('user_words uw');
        $this->db->where('uw.usertopic_id', $this->uri->segment(3));
        $this->db->order_by('lemma','random');
        $this->db->limit(1);
        $userword = $this->db->get();
         
      # $data['myurisegment'] = $this->uri->segment(3);
#echo "<pre>";
  #print_r($userword);
#echo "</pre>";


        foreach($userword->result() as $wordrow): 
        endforeach;

  
       ### select wordid, synsetid and difinition for a word(previously randomly selected) ###
	$this->db->select('wd.wordid,sn.synsetid,st.definition'); 
        $this->db->from('senses sn');
       $this->db->join('synsets st', 'sn.synsetid = st.synsetid');
       $this->db->join('words wd', 'wd.wordid = sn.wordid' );
       $this->db->where('wd.lemma', $wordrow->lemma);
       $data['query']= $this->db->get();



     $data['title'] = "Word usages";
     $data['heading'] = $wordrow->lemma;


      #create an array to store list of synsetid of corresponding word
       $listOfSynsetid = array();
      foreach($data['query']->result() as $rw): 	
          array_push($listOfSynsetid, $rw->synsetid);
      endforeach;


#echo "<pre>";
  #print_r($userword);
#echo "</pre>";


       #Select synonymous of the selected word
	$this->db->select('wd.wordid, wd.lemma, se.synsetid'); 
        $this->db->from('words wd');
        $this->db->join('senses se', 'wd.wordid = se.wordid');
        $this->db->or_where_in('se.synsetid', $listOfSynsetid );
        $data['querySyn']= $this->db->get();



      ### select usages of words corresponing to sysnsetid;
	$this->db->select('sp.sample, sp.synsetid'); 
        $this->db->from('samples sp');
       $this->db->or_where_in('sp.synsetid', $listOfSynsetid );
       $data['queryx']= $this->db->get();
 


        $this->db->select('ge.lemma, ge.example'); 
        $this->db->from('googleexamples ge');
        $this->db->where('ge.lemma',$wordrow->lemma);
        $checkwordinGE = $this->db->get();
    if ($checkwordinGE->num_rows() > 0){
	echo "example is already found, no need to make a call to google";
         $data['googleexample'] = $checkwordinGE->row(1)->example;
     }
   else {
        echo " example is NOT found currently, need to get from google";
       $data['googleexample'] = get_examples_from_google($wordrow->lemma);
 
       $this->db->set('lemma', $wordrow->lemma); 
       $this->db->set('example',$data['googleexample']);
     $this->db->insert('googleexamples');
    }

 
 
     #   foreach($data['queryx']->result() as $row): 
     #   endforeach;

        #echo "<pre>";
        #print_r($data);
       # echo "</pre>";


       $this->load->view('dictionary_gre_view', $data);

    
      }


}
?>
