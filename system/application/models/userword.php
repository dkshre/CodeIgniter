<?php

class UserWord extends Model{

	function UserWord()
	{
             parent::Model();

	}


	function get_topic($id=0){
		

         $this->db->select('topic');
	$this->db->from('user_topics');
        $this->db->where('id', $id);
        $data = $this->db->get();
	//return $this->db->get()->row(1)->topic;
	if ($data->num_rows() > 0)
		return  $data->row(1)->topic;
	else 
		return "Invalid topic id";


	}


        function get_words_for_topic($id=0){

               $this->db->select('id, lemma'); 
               $this->db->from('user_words ');
  	       $this->db->order_by('lemma','asc');            
		if($id > 0)
		     $this->db->where('usertopic_id', $id);
               
		return  $this->db->get();
        }

        function get_a_random_word_for_topic($id=0){
               $this->db->select('id, lemma'); 
               $this->db->from('user_words ');
  	       #$this->db->order_by('lemma','asc');                     
	       $this->db->where('usertopic_id', $id);
                 $this->db->order_by('lemma','random');
               $this->db->limit(1);
               $data =  $this->db->get();
		if ($data->num_rows() > 0)
			return  $data->row(1)->lemma;
		else 
			return "Word not found";
		
        }


       function get_google_example($word='abate'){
		$this->db->select('ge.lemma, ge.example'); 
		$this->db->from('google_examples ge');
		$this->db->where('ge.lemma',$word);
		$checkwordinGE = $this->db->get();
	    if ($checkwordinGE->num_rows() > 0){
		echo "example is already found, no need to make a call to google";
		 //$data['googleexample'] = $checkwordinGE->row(1)->example;
                 return $checkwordinGE->row(1)->example;
	     }
	   else {
		echo " example is NOT found currently, need to get from google";
	       $googleexample = get_examples_from_google($word);	 
	       $this->db->set('lemma', $word); 
	       $this->db->set('example',$googleexample);
	       $this->db->insert('google_examples');
               return  $googleexample;
          }

       }	

       function get_word_detail($word='abate'){

		### select wordid, synsetid and difinition for a word(previously randomly selected) ###
		$this->db->select('wd.wordid,sn.synsetid,st.definition'); 
		$this->db->from('senses sn');
		$this->db->join('synsets st', 'sn.synsetid = st.synsetid');
		$this->db->join('words wd', 'wd.wordid = sn.wordid' );
		$this->db->where('wd.lemma', $word);
		$data['query']= $this->db->get();
       
	      #create an array to store list of synsetid of corresponding word
	       $listOfSynsetid = array();
	      foreach($data['query']->result() as $rw): 	
		  array_push($listOfSynsetid, $rw->synsetid);
	      endforeach;

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

	     return $data;

     }

}

?>
