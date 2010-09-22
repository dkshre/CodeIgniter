<?php session_start();  

class UserWords extends Controller{

	function UserWords(){
	    parent::Controller();
               $this->load->helper('url');
              $this->load->helper('form');
              $this->load->helper('googleexample');
              $this->load->model('userword');
     		 $this->load->model('usertopic');
	}

	function index()
        {
	      $data['title'] = "Understanding words";
	      $data['heading'] = $this->userword->get_topic($this->uri->segment(3));   
               $data['query'] = $this->userword->get_words_for_topic($this->uri->segment(3));
               $this->load->view('userwords/index', $data);

        }
	
	function show()
	{}
	function newx()
	{
	   	$data['title'] = "Understanding words";
		$data['heading'] = $this->userword->get_topic($this->uri->segment(3)); 
               $this->load->view('userwords/newx',$data);

}
	function create()
	{
           #insert ino userwords tables
            # do validation make sure word is a valid word(word exists in words tables
            # do validation make sure word is not already entered for this list
             #(for given topicid there is not preexisted that word
           
		echo $_POST['lemma'];
		echo $_POST['usertopic_id'];

		$this->db->select('lemma'); 
		$this->db->from('user_words');
		$this->db->where('lemma',$_POST['lemma']);
		$this->db->where('usertopic_id', $_POST['usertopic_id']);
		$checkwordinUW = $this->db->get();
   
 		print_r($checkwordinUW->num_rows());

		 if ($checkwordinUW->num_rows() > 0)
		{ 
			#echo $checkwordinUW->row(1)->lemma;
			# echo "<pre>word previously entered for this topic</pre>";
			# $this->load->view('dictionary/word_insert/'.$_POST['topicid'], $data);
			redirect('userwords/newx/'.$_POST['usertopic_id'].'/preexisted', $data);
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
				redirect('userwords/newx/'.$_POST['usertopic_id'].'/newwordinserted');
			} 
			else
			{
		   	   #echo "<pre>Not a valid word </pre>";
			  redirect('userwords/newx/'.$_POST['usertopic_id'].'/notavalidword');
			}
		} 
	}


       function random_detail_display(){
             $current_topic_id = $this->uri->segment(3);
	     $current_word_id = $this->uri->segment(4);

             $current_word =  $this->userword->get_word_for_id( $current_word_id);
	     $next_word_array = $this->userword->get_nextword_for_topicid_wordid($current_topic_id,$current_word_id);

		 //print_r($next_word_array); 
		//echo $next_word_array['lemma'];

             $data = $this->userword->get_word_detail($next_word_array['lemma']);
	     $data['title'] = "Word usages";
	     $data['heading'] = $this->userword->get_topic( $current_topic_id);
             $data['word']=$next_word_array['lemma'];
             $data['wordid'] = $next_word_array['id'];
	     $this->load->view('userwords/random_detail_display', $data);

	}

        function detail_display()
	{
	     $current_word_id = $this->uri->segment(4);
             $current_word =  $this->userword->get_word_for_id( $current_word_id);
	     $data = $this->userword->get_word_detail($current_word);
	      $data['title'] = "Word usages";
	     $data['heading'] = $this->userword->get_topic($this->uri->segment(3));
             $data['word']= $current_word;
	     $this->load->view('userwords/detail_display', $data);
      }

	function edit()
	{}
	function update()
	{}
	function delete()
	{}



}

?>
