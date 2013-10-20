<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class something_model extends CI_Model
{
	//Runs queries to insert the user into the database
	function register_user($user)
	{		
		$this->db->insert('users',$user);					
	}

	//Runs queries to load the user's data
	function log_in($user)
	{
		$this->load->library('encrypt');
					  
		$temp = $this->db->select('*')->where('email',$user['email'])->get('users')->row();
		$password = $this->encrypt->decode($temp->password);
		if($password == $user['password']) 
		{
			return $temp;
		}
		return null;

	}
}









 ?>