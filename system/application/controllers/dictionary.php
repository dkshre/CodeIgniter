

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

     function entry_random_display()
     {
         #$this->db->select('SELECT * FROM entry ORDER BY RAND() LIMIT 1'):
       # this-db->select('select word, type, definition, etymology, usages from entry');
        $this->db->order_by('word','random');
        $this->db->limit(1);

       $data['query'] = $this->db->get('entry');
       $this->load->view('dictionary_random_view', $data);
      
      }
      
     function content_display()
     {
       echo "hello from content_display method of controller";

    #$url = "http://www.google.com";
    #$str = file_get_contents($url);
     #echo $str;

       #echo "dfdfdf <div id='dkshre'> hellow world </div>dfdfdfd";
       # $this->load->view('content_view');
     }

}
?>
