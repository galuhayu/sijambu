<?php
class Account_model extends Model
{
	function Account_model() {
		parent::Model();
	}
	
	function create_account ($username, $password,$role_name, $nama,$alamat,$nohp){
		$query = $this->db->query("INSERT INTO user (username, password, strStyle) VALUES ('$username', '$password', 'herbal')");
		$query = $this->db->query("SELECT user_id FROM user WHERE username='$username'");
		$user_id = $query->result_array();
		$user_id = $user_id[0]['user_id'];
		$query = $this->db->query("SELECT role_id FROM role WHERE role_name='$role_name'");
		$role_id = $query->result_array();
		$role_id = $role_id[0]['role_id'];
		$query = $this->db->query("INSERT INTO user_role (user_id, role_id) VALUES ($user_id, $role_id)");
	}
	
	
	function search_account ($username){
		
		$query = $this->db->query("SELECT * FROM role, user_role,user WHERE user.username LIKE '%$username%' AND user.user_id = user_role.user_id AND role.role_id = user_role.role_id ");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function delete_account ($username){
		$query = $this->db->query("SELECT * FROM user WHERE username = '$username'");
		if ($query->num_rows()!=0)
			$this->db->query("UPDATE user SET isDelete = 1 WHERE username = '$username'");
		else 
			return 0;
		return 1;
	}
	
	function update_account ($username, $newrolename, $nama , $alamat, $telp){
		$query = $this->db->query("SELECT user_id FROM user WHERE username = '$username'");
		if ($query->num_rows()!=0){
			$row = $query->row();
			$userid = $row->user_id;
		}
		else return 0;
		
		$query = $this->db->query ("UPDATE user SET alamat='$alamat' , nama='$nama', nohp='$telp' WHERE username='$username' ");
		
		$query = $this->db->query("SELECT user_role_id FROM user_role WHERE user_id= '$userid'");
		$row=$query->row();
		$userroleid = $row->user_role_id;
		
		$query = $this->db->query("SELECT role_id FROM role WHERE role_name= '$newrolename'");
		$row = $query->row();
		$newroleid = $row->role_id;
		
		$this->db->query("UPDATE user_role SET role_id = '$newroleid' WHERE user_role_id= '$userroleid'");
	}
	
	function search_account_update ($username){
		
		$query = $this->db->query("SELECT * FROM role, user_role,user WHERE user.username='$username' AND user.user_id = user_role.user_id AND role.role_id = user_role.role_id ");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function list_account(){
		$query = $this->db->query("SELECT * FROM role, user_role,user WHERE user.user_id = user_role.user_id AND role.role_id = user_role.role_id AND isDelete = 0 ");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
}