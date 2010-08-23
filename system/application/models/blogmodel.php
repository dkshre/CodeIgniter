<?php

class Blogmodel extends Model{

	function Blogmodel(){
	    parent::Model();

	}

	function ten_comments(){
         
            $data['query'] = $this->db->get('comments', 10);
            return $data;            


	}


}

?>
