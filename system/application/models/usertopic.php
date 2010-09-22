<?php

class UserTopic extends Model{

	function UserTopic()
	{
             parent::Model();


	}


        function find($id=0){

               $this->db->select('id, topic'); 
               $this->db->from('user_topics ');
               if($id > 0)
		     $this->db->where('id', $id);
		return  $this->db->get();
        }

	function update(){

        }

}

?>
