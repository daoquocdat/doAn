<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_interface_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getDataMember()
	{
		$this->db->select('id_member,fullname,email,phone,permission,status');
		$arrMember = $this->db->get('db_admin');
		$arrMember = $arrMember->result_array();
		
		return $arrMember;
	}

	public function insertMember($id_member,$username,$password,$fullname,$email,$phone,$permission,$status="active")
	{
		$arr = array(
			'id_member'=>$id_member,
			'username'=>$username,
			'password'=>$password,
			'fullname'=>$fullname,
			'email'=>$email,
			'phone'=>$phone,
			'permission' =>$permission,
			'status'=>$status
		);
		return $this->db->insert('db_admin', $arr);
	}

	public function bannedMember($id)
	{
		$this->db->where('id_member', $id);
		$arr = array('status' => 'disable');
		return $this->db->update('db_admin', $arr);
	}

	public function searchMember($key)
	{
		$this->db->select('*');
		$this->db->like('fullname',$key);
		// $this->db->or_like('permission',$key);
		$search = $this->db->get('db_admin');
		$search = $search->result_array();
		return $search;
	}
}

/* End of file member_interface_model.php */
/* Location: ./application/models/member_interface_model.php */