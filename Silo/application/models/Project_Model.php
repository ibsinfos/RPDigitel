<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  Class will do all necessary action for blog functionalities
 */

class Project_Model extends CI_Model
{

    public function saveNewProjectModel($data,$user_id,$project_name)
	{
		$this->db->insert(TABLES::$USER_PROJECTS,$data);
		
		  // Now Creating a  Project folder
		
		 $path = "./uploads/$user_id/".$project_name;

		 if(!is_dir($path)) //create the folder if it's not already exists
		 {
		    mkdir($path,0777,TRUE);
		 }

         return true;		 
	}
	
	public function checkProjectAlreadyExists($user_id,$project_name)
	{
		$this->db->select('COUNT(0) as num_project');
		$this->db->from(TABLES::$USER_PROJECTS);
		$this->db->where('user_id',$user_id);
		$this->db->where('project_name',$project_name);
		$query = $this->db->get();
		$row = $query->row();
		$count = $row->num_project;
		return $count;
	}
	
	public function getProjectListModelForUser($user_id)
	{
		$this->db->select('project_id,project_name,created_date');
		$this->db->from(TABLES::$USER_PROJECTS);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		$row = $query->result();
		return $row;
	}
	
	public function addFileToProject($user_id,$image)
	{
		$project_name = $_SESSION['project_name'];
		
		$data = array("user_id"=>$user_id,
		              "project_name"=>$project_name,
					  "filename"=>$image
					 );
					 
	    $this->db->insert(TABLES::$PROJECTS_FILES,$data);
         return true;		
	}
   
   
}
