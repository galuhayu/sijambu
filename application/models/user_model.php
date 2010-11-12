<?php
class User_model extends Model
{
	function User_model() {
		parent::Model();
	}
	
	/**
	 * checking whether the username and password true
	 *
	 */
	function user_check($username, $userpass) {
		$this->db->select('user_id');
		$this->db->where('username', $username);
		$this->db->where('password', SHA1($userpass));
		$query = $this->db->get('user');
		
		if( $query->num_rows() != 0 ) {
			$row = $query->row();
			$userid = $row->user_id;
			return $userid;
		}	
		else return 0;
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