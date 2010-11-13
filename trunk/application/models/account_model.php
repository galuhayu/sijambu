<?php
class Account_model extends Model
{
	function Account_model() {
		parent::Model();
	}
	
	function create_account ($username, $password,$role_name){
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
		
		$query = $this->db->query("SELECT * FROM role, user_role,user WHERE user.username = '$username' AND user.user_id = user_role.user_id AND role.role_id = user_role.role_id ");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	/**
	 * get the roles from the username
	 *
	 */
	function get_roles( $userid ) {
		$query = $this->db->query("SELECT role.role_name FROM role, user_role WHERE 
				user_role.user_id = '$userid' AND user_role.role_id = role.role_id");
		
		if( $query->num_rows() != 0 ) {
			return $query->result_array(); 
		}
		else return 0;	
	}
    
    /**
	 * get the user data list
	 *
	 */
	function get_users() {
    
		$query = $this->db->query("SELECT user.username, user.user_id FROM user");
		
		if( $query->num_rows() != 0 ) {
			return $query->result_array(); 
		}
		else return 0;	
	}
    
    /**
	 * get the user theme style
	 *
	 */
	function get_style($user_id) {
    
		$this->db->select('strStyle');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('user');
        
        if( $query->num_rows() != 0 ) {
			$row = $query->row();
			return $row->strStyle;
		}
		else return 0;	
	}
    
    /**
	 * get the user theme style
	 *
	 */
	function set_style( $strStyle, $user_id) {
    
        $sql = "UPDATE user SET strStyle='".$strStyle."' WHERE user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
    
    /**
	 * update password
	 *
	 */
	function change_pswd( $newpswd, $user_id ) {
    
        $sql = "UPDATE user SET password='".SHA1($newpswd)."' WHERE user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
}