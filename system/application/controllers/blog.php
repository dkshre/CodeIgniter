<?php

class Blog extends Controller{


	function Blog()
	{
		parent::Controller();
               # $this->load->scaffolding('entries');
               $this->load->helper('url');
              $this->load->helper('form');
	}

	function index()
	{

              #  echo 'this is a test';
              # $this->load->view('blog_view');
	   	$data['title'] = "My Blog Title Smart";
		$data['heading'] = "My Blog Heading";
           
		#$data['todo'] = array('Clean house', 'eat lunch', 'call mom');
		$data['query'] = $this->db->get('entries');



 		$this->load->view('blog_view', $data);

	}


	function comments()
        {
	   	$data['title'] = "My Comment Title Smart";
		$data['heading'] = "My Comment Heading";
           
                $this->db->where('entry_id', $this->uri->segment(3));
	 	$data['query'] = $this->db->get('comments');

            
                

 		$this->load->view('comment_view', $data);

        }

       function comment_insert()
       {
            $this->db->insert('comments', $_POST);

            redirect('blog/comments/'.$_POST['entry_id']);
       }

       function lasttencomments(){
	  // redirect('blog/lasttencomments');

          $this->load->model('Blogmodel');
          $query = $this->Blogmodel->ten_comments();
       	  $this->load->view('lasttencomments_view', $query);

       }




}
?>
