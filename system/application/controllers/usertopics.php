


<?php     session_start(); 
class Usertopics extends Controller{

	function Usertopics(){
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->helper('example');
		$this->load->library('session');
               $this->load->model('usertopic');
               $this->load->library('Mathquestion');
             // $this->load->helper('mysession');

      
	}


	function index()
	{ 
            // $dk = new Mathquestion();
              // echo $dk->questionOne();

	   	$data['title'] = "Understanding words";
		$data['heading'] = "All topics home";
                 
              $data['query'] = $this->usertopic->find();
              $this->load->view('usertopics/index', $data);
	}
        
        function show()
        {
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
	   	$data['title'] = "Understanding words";
	        $data['heading'] = "Edit Topic";
            
              //$this->load->model('usertopic');
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
