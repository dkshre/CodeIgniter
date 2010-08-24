

<?php

class Dictionary extends Controller{


	function Dictionary()
	{
		parent::Controller();
               # $this->load->scaffolding('entries');
               $this->load->helper('url');
              $this->load->helper('form');
             # $this->load->database('dictionary');
	}

	function index()
	{

              #  echo 'this is a test';
              # $this->load->view('blog_view');
	   	$data['title'] = "Dictionary";
		$data['heading'] = "Dictionary Entry";
                
                $this->load->view('dictionary_entry', $data);
		#$data['todo'] = array('Clean house', 'eat lunch', 'call mom');
		#$data['query'] = $this->db->get('entries');
 		#$this->load->view('blog_view', $data);

	}


       function entry_insert()
       {

            $this->load->database('dictionary');
            $this->db->insert('entry', $_POST);

 	$data['query'] = $this->db->get('entry');

            
 		$this->load->view('dictionary_view', $data);
       }

       function entry_display()
      {


	   	#$data['title'] = "My Comment Title Smarter";
		#$data['heading'] = "My Comment Heading";
           
              #  $this->db->where('entry_id', $this->uri->segment(3));
	 	$data['query'] = $this->db->get('entry');

            
 		$this->load->view('dictionary_view', $data);

       }





}
