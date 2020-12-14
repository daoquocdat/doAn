<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		if($this->input->post()){
			$this->form_validation->set_rules('login', 'Login', 'callback_check_login');
			if ($this->form_validation->run()) {
				$username = $this->input->post('username');
				$this->session->set_userdata('login', $username);
				redirect('Admin/load_interface_admin/');
			} else {
				$this->session->set_flashdata('error', 'Sai tài khoản hoặc mật khẩu');
				$this->load->view("login_interface");
			}
		}
		else{
			$this->load->view("login_interface");
		}
		
	}

	public function check_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = "active";

		$where = array('username'=>$username, 'password'=>$password, 'status'=>$status);
		$this->load->model('Login_interface_model');
			if ($this->Login_interface_model->check_exist($where)) {				
					return true;
			}
			else{
				return false;
			}
	}

	public function logout(){
		if($this->session->userdata('login')){
			$this->session->unset_userdata('login');
			redirect('admin','refresh');
		}
	}

	public function load_interface_admin()
	{
		$this->load->view('admin_interface');
	}

	public function load_member(){
		if ($this->session->userdata('login')) {
			$this->load->model('Member_interface_model');
			$member = $this->Member_interface_model->getDataMember();

			$member = array("arrMember" => $member);
			$this->load->view('member_interface', $member);
		}
		else
		{
			redirect('Admin/load_no_login/','refresh');
		}	
	}

	public function load_no_login()
	{
	    $this->load->view('no-login');
	}

	public function load_faqs()
	{
	    $this->load->view('faqs_interface');
	}

	public function add_member(){
		$username =$this->input->post('username');
		$password = $this->input->post('password');
		$id_member = $this->input->post('id');
		$permission = $this->input->post('permission');
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');


		$this->load->model('Member_interface_model');
		$insert =  $this->Member_interface_model->insertMember($id_member,$username,$password,$fullname,$email,$phone,$permission);
		if($insert){
			$id_member = ""; 
			$username = ""; 
			$password = ""; 
			$fullname = "";
			$email = ""; 
			$phone = "";
			$permission = "";
			redirect('admin/load_member/','refresh');
		}
		else{
			echo "lỗi";
		}
	}

	public function banned_member($id){
		$this->load->model('Member_interface_model');
		if ($this->Member_interface_model->bannedMember($id)) {
			$res['status'] = true;
			$res['message'] = "Khóa tài khoản thành công";
		} else {
			$res['status'] = false;
			$res['message'] = "Khóa tài khoản thất bại";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($res));
	}

	public function banned_product($id){
		$this->load->model('Product_interface_model');
		if ($this->Product_interface_model->getStatusProduct($id)['status'] == 'active') {
			if ($this->Product_interface_model->bannedProduct($id)) {
				$res['status'] = true;
				$res['message'] = "Khóa sản phẩm thành công";
			} else {
				$res['status'] = false;
				$res['message'] = "Khóa sản phẩm thất bại";
			}
		} else {
			if ($this->Product_interface_model->unBannedProduct($id)) {
				$res['status'] = true;
				$res['message'] = "Mở khóa sản phẩm thành công";
			} else {
				$res['status'] = false;
				$res['message'] = "Mở khóa sản phẩm thất bại";
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($res));
	}

	public function search_member()
	{
		$key = $this->input->post('searchContent');

		$this->load->model('Member_interface_model');
		$search=  $this->Member_interface_model->searchMember($key);

		$search = array(
			"arrSearch" => $search, 
			'key' => $key);
		$this->load->view('view_search', $search);
	}

	public function view_success()
	{
		$this->load->view('success');
	}

	public function view_product(){
		$this->load->model('Product_interface_model');
		$pro = $this->Product_interface_model->getDataProduct();

		$arrCat =$this->Product_interface_model->loadCatelogy();
		

		$data = array("arrProduct" => $pro, "arrCat" =>$arrCat);
		$this->load->view('view_product', $data);
	}

	public function add_product(){
		$id_pro = $this->input->post('id_pro');
		$name =$this->input->post('name');
		$id_cat =$this->input->post('id_cat'); 
		$amount =$this->input->post('amount');
		$price=$this->input->post('price');
		$status=$this->input->post('status');
		$id_sup=$this->input->post('id_sup');
		$pro_hot=$this->input->post('pro_hot');

		if($this->upLoadFile('img')){
			$img = base_url()."fileUpload/".basename($_FILES['img']["name"]);
		}
		else{
			redirect('thatbai.php','refresh');
		}

		$this->load->model('Product_interface_model');
		$add_product = $this->Product_interface_model->addProduct($id_pro ,$name,$id_cat,$amount,
			$price,$status,$id_sup,$pro_hot,$img);

		
		if ($add_product) {
			redirect('Admin/view_product/','refresh');
		}
		else{
			echo "lỗi";
		}
	}
	public function view_add_product(){
		$this->load->model('Product_interface_model');
		$arrCat =$this->Product_interface_model->loadCatelogy();
		$arrCat = array("arrProduct" => $arrCat);

		$arrSup = $this->Product_interface_model->loadSupplier();
		$arrSup = array("arrSupplier" => $arrSup);
		
		$this->load->view('add_product', $arrCat+$arrSup , FALSE);
	}

	public function test($id = "pro1")
	{
		$this->load->model('Product_interface_model');
		$this->Product_interface_model->bannedProduct($id);
	}

	private function upLoadFile($filehinh){
		$target_dir = "fileUpload/";
		$target_file = $target_dir . basename($_FILES[$filehinh]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES[$filehinh]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}
		// Check file size
		if ($_FILES[$filehinh]["size"] > 2000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}


		if ($uploadOk) {
			move_uploaded_file($_FILES[$filehinh]["tmp_name"], $target_file);
			return base_url()."fileUpload/".basename($_FILES[$filehinh]["name"]);
		}
		else{
			return false;
		}
	}

	public function edit_product($id){
		$this->load->model('Product_interface_model');
		

		$arrCat =$this->Product_interface_model->loadCatelogy();

		$arrSup = $this->Product_interface_model->loadSupplier();
		
		$arrDataByPro = $this->Product_interface_model->getDataByIdPro($id);

		$data = array('arrDataProduct' => $arrDataByPro,
					   "arrProduct" => $arrCat,
					   "arrSupplier" => $arrSup);


		$this->load->view('view_update_product', $data,FALSE);



		
	}

	public function update_product()
	{
		$id_pro = $this->input->post('id_pro');
		$name =$this->input->post('name');
		$id_cat =$this->input->post('id_cat'); 
		$amount =$this->input->post('amount');
		$price=$this->input->post('price');
		$status=$this->input->post('status');
		$id_sup=$this->input->post('id_sup');
		$pro_hot=$this->input->post('pro_hot');

		$target_dir = "fileUpload/";
		$target_file = $target_dir . basename($_FILES['img']["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES['img']["tmp_name"]);
		  if($check !== false) {
		    $uploadOk = 1;
		  } else {
		    $uploadOk = 0;
		  }
		}
		if ($_FILES['img']["size"] > 2000000) {
		  $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $uploadOk = 0;
		}
		$img = basename($_FILES['img']["name"]);

		if($img){
			$img = base_url()."fileUpload/".basename($_FILES['img']["name"]);
		}
		else{
			$img = $this->input->post('img2');
		}

		$this->load->model('Product_interface_model');
		if($this->Product_interface_model->updateProduct($id_pro,$name,$id_cat,$amount,$price,$status,$id_sup,$pro_hot,$img)){
			// echo "thành công";
			redirect('Admin/view_success','refresh');
		}
		else{
			echo "thất bại";
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */