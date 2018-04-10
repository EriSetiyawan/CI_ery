<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Blog_model extends CI_Model {
	

	public function getAll()
	{
		$query = $this->db->get('Blog');
		return $query->result_array();
	}
	public function insert($data) { 
         if ($this->db->insert("Blog", $data)) { 
            return true; 
         } 
    }
    public function delete($id) { 
         if ($this->db->delete("Blog", "id = ".$id)) { 
            return true; 
         } 
      } 
   
     public function update($data,$old_id) { 
         $this->db->set($data); 
         $this->db->where("id", $old_id); 
         $this->db->update("Blog", $data); 
      }
      public function getOne($id){
	    	$query = $this->db->query("select * from Blog where id='$id'");
			return $query->result_array();
	  }
	}
?>
