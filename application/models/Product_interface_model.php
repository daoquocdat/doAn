<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_interface_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDataProduct()
	{
		$this->db->select('id_pro,name,id_cat,amount,price,status,id_sup,img');
		$arrProduct = $this->db->get('db_product');

		$arrProduct =  $arrProduct->result_array();
		return $arrProduct;
	}

	public function getStatusProduct($id)
	{
		$this->db->select('status');
		$this->db->where('id_pro', $id);
		$status = $this->db->get('db_product');
		$status = $status->row_array();

		// echo "<pre>";
		// var_dump($status);

		return $status;
	}

	public function getDataByIdPro($id)
	{
		$this->db->select('*');
		$this->db->where('id_pro', $id);

		$data = $this->db->get('db_product');
		$data = $data->result_array();

		return $data;
	}

	public function bannedProduct($id)
	{
		$this->db->where('id_pro', $id);
		$data = array('status' => 'close');
		return $this->db->update('db_product', $data);
	}
	public function unBannedProduct($id)
	{
		$this->db->where('id_pro', $id);
		$data = array('status' => 'active');
		return $this->db->update('db_product', $data);
	}


	public function loadCatelogy(){
		$this->db->select('id_cat ,name');
		$dataCat = $this->db->get('db_catelogy');
		$dataCat = $dataCat->result_array();
		return $dataCat;
	}

	public function loadSupplier(){
		$this->db->select('id_sup, name');
		$dataSup = $this->db->get('db_supplier');
		$dataSup = $dataSup->result_array();
		return $dataSup;
	}


	public function addProduct($id_pro,$name,$id_cat,$amount,$price,$status,$id_sup,$pro_hot,$img)
	{
		$arr = array(
			'id_pro'=>$id_pro,
			'name'=>$name,
			'id_cat'=>$id_cat,
			'amount'=>$amount,
			'price'=>$price,
			'status'=>$status,
			'id_sup' =>$id_sup,
			'pro_hot'=>$pro_hot,
			'img'=>$img

		);
		return $this->db->insert('db_product', $arr);
	}

	public function updateProduct($id_pro,$name,$id_cat,$amount,$price,$status,$id_sup,$pro_hot,$img)
	{
		$arr = array(
			'name'=>$name,
			'id_cat'=>$id_cat,
			'amount'=>$amount,
			'price'=>$price,
			'status'=>$status,
			'id_sup' =>$id_sup,
			'pro_hot'=>$pro_hot,
			'img'=>$img
		);

		
		$this->db->where('id_pro', $id_pro);
		return $this->db->update('db_product', $arr);

	}

}

/* End of file Product_interface_model.php */
/* Location: ./application/models/Product_interface_model.php */