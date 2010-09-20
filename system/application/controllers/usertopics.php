


<?php

class Usertopics extends Controller{

	function Usertopics(){
	    parent::Controller();
               $this->load->helper('url');
              $this->load->helper('form');
              //$this->load->helper('example');
              $this->load->library('session');

$_SESSION['animals']= array();
$_SESSION['dibesh'] = 'shrestha';
// create an array
$my_array=array('cat', 'dog', 'mouse', 'bird', 'crocodile', 'wombat', 'koala', 'kangaroo');
 
// put the array in a session variable
$_SESSION['animals']=$my_array;
	}

	function index()
	{ 




//$this->session->set_userdata('some_name', 'some_value');

          //  echo $this->session->userdata('session_id');
 //echo "<br/>";
         //  echo  $this->session->userdata('user_agent');
 //echo "<br/>";
          // echo $this->session->userdata('last_activity');
         // echo "<br/>";
        //  echo $this->session->userdata('ci_session');


	   	$data['title'] = "Understanding words";
		$data['heading'] = "All topics home";
           
              $this->load->model('usertopic');
              $data['query'] = $this->usertopic->find();
              $this->load->view('usertopics/index', $data);
	}
        
        function show()
        {
 		echo "show";
              echo $this->uri->segment(3);


	   	$data['title'] = "Understanding words";
		$data['heading'] = "All topics home";
            
              $this->load->model('usertopic');
              $data['query'] = $this->usertopic->find($this->uri->segment(3));
              $this->load->view('usertopics/index', $data);
 
	}
         
        function newx(){
   		$data['title'] = "Understanding words";
		$data['heading'] = "Add a new topic";
     		$this->load->view('usertopics/newx', $data);
        }

	function create()
	{
          
                $this->db->insert('user_topics', $_POST);
                $this->index();
  
	}

	function edit()
	{ 
 		echo "Edit&nbsp;";
              echo $this->uri->segment(3);


	   	$data['title'] = "Understanding words";
	        $data['heading'] = "Edit Topic";
            
              $this->load->model('usertopic');
              $data['query'] = $this->usertopic->find($this->uri->segment(3));
              $this->load->view('usertopics/edit', $data);
	}


	function update()
	{
		 $this->db->where('id', $_POST['id']);
		 $this->db->update('user_topics', $_POST); 
		 $this->index();

	}

	



}

?>
