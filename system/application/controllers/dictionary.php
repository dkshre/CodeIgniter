

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
                
//url
//$url = 'http://www.imdb.com/title/tt0367882/';
$url ='http://dkshre-laptop.cgifederal.com/CodeIgniter/index.php/dictionary/entry_gre_display';

//get the page content
$imdb_content = get_data($url);
//parse for product name
$name = get_match('/<title>(.*)<\/title>/isU',$imdb_content);

echo $name;

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

      function entry_gre_display(){


       ### selects a random word from user created list of words ###
        $this->db->select('uw.lemma'); 
        $this->db->from('userwords uw');
        $this->db->order_by('lemma','random');
        $this->db->limit(1);
        $userword = $this->db->get();
         
     
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

      ### select usages of words corresponing to sysnsetid;
	$this->db->select('sp.sample, sp.synsetid'); 
        $this->db->from('samples sp');
       $this->db->or_where_in('sp.synsetid', $listOfSynsetid );
       $data['queryx']= $this->db->get();
 

     #   foreach($data['queryx']->result() as $row): 
     #   endforeach;

        #echo "<pre>";
        #print_r($data);
       # echo "</pre>";


       $this->load->view('dictionary_gre_view', $data);

    
      }






     function entry_random_display()
     {
         #$this->db->select('SELECT * FROM entry ORDER BY RAND() LIMIT 1'):
       # this-db->select('select word, type, definition, etymology, usages from entry');
       # $this->db->order_by('word','random');
        #$this->db->limit(1);

 
      # $this->db->select('word', 'usages', 'definition','etymology');
      
# $where = "word='abate'";
      # $this-db->where($where);
     #  $data['query'] = $this->db->get('entry');



$this->db->select('e.type, e.word, e.usages, e.definition, e.etymology'); 
$this->db->from('entry e');
 $data['query']= $this->db->get();



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
