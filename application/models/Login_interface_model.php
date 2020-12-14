<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_interface_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function login($u , $p)
	{	
		$sql = "SELECT * FROM db_admin WHERE username = ? AND password = ?"; 
		$l = $this->db->query($sql, array($u, $p))->row_array();	
		return $l;
	}

	public function check_exist($where = array())
	{
		$this->db->where($where);

		$qr = $this->db->get('db_admin');//lấy dữ liệu từ db db_admin trên mysql
		
		if($qr->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function logout()
	{
		unset($_SESSION['login']);
	}

}

/* End of file Login_interface_model.php */
/* Location: ./application/models/Login_interface_model.php */