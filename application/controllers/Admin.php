<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
class Admin extends CI_Controller {
	
	public function __construct() {
      parent::__construct(); 
      $this->load->library('form_validation');
      $this->load->library('session');
	  
	  date_default_timezone_set('Asia/Kolkata'); 

	  if(!$this->session->userdata('admin_loggedin'))
		{
			redirect(base_url('login'), 'refresh');
		}
	}
	
	public function index()
	{
		redirect(base_url('dashboard'));
	}

	public function dashboard()
	{
		$data['session_user'] = $this->session->userdata('admin_loggedin');
		$data['users'] = $this->admin_model->get_data('customers', array('status'=>'1'), 'result_array');
		$data['employees'] = $this->admin_model->get_data('employees', array('status'=>'1'), 'result_array');
		$this->load->view('config/template_start');
		$this->load->view('config/page_head',$data);
		$this->load->view('index', $data);
		$this->load->view('config/page_footer');
		$this->load->view('config/template_scripts');
		$this->load->view('config/template_end');
	}

	public function categories()
	{
		$data['session_user'] = $this->session->userdata('admin_loggedin');
		$data['categories'] = $this->admin_model->get_data('categories', array('status'=>'1'), 'result_array');
		$this->load->view('config/template_start');
		$this->load->view('config/page_head',$data);
		$this->load->view('categories', $data);
		$this->load->view('config/page_footer');
		$this->load->view('config/template_scripts');
		$this->load->view('config/template_end');
	}

	public function insert_category(){

		$data = array(
			'category_name' => $this->input->post('category_name'),
			'details' => $this->input->post('category_details'),
			'date_added' => date("Y-m-d H:i:s")
		);

		$insert = $this->admin_model->insert_row('categories', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Data Successfully Added..!');
			redirect(base_url('categories'));
		}
	}

	public function update_category(){
		$id = $this->input->post('category_id');
		$data = array(
			'category_name' => $this->input->post('category_name'),
			'details' => $this->input->post('category_details'),
			'date_modified' => date("Y-m-d H:i:s")
		);
		$where = array('id' => $id );

		$update = $this->admin_model->update_row_data('categories', $where, $data);
		if($update){
			$this->session->set_flashdata('message', 'Data Successfully Updated..!');
			redirect(base_url('categories'));
		}
	}

	public function fetch_data(){
		$id = $this->input->post('id');
		$tbl_name = $this->input->post('tbl_name');
		$data = $this->admin_model->get_by_id($id, $tbl_name);
		if($data)
			echo json_encode($data);
	}

	public function delete_by_id(){
		
		$id = $this->input->post('id');
		$tbl_name = $this->input->post('tbl_name');

		$where = array('id' => $id );

		if($id){
			$update = $this->admin_model->update_row_data($tbl_name, $where, array('status' => 2 ));
			
			if ($update) 
				$status = 'success';
			else
				$status = 'failed';
		}
		else 
			$status = 'failed';

		echo $status;

	}

	public function products()
	{
		$data['session_user'] = $this->session->userdata('admin_loggedin');
		$data['products'] = $this->admin_model->get_all_products();
		$data['categories'] = $this->admin_model->get_data('categories', array('status'=>'1'), 'result_array');
		$this->load->view('config/template_start');
		$this->load->view('config/page_head',$data);
		$this->load->view('products', $data);
		$this->load->view('config/page_footer');
		$this->load->view('config/template_scripts');
		$this->load->view('config/template_end');
	}

	public function insert_product(){

		$data = array(
			'product_name' => $this->input->post('product_name'),
			'brand_name' => $this->input->post('brand_name'),
			'category_id' => $this->input->post('category_name'),
			'imei_number1' => $this->input->post('imei_number1'),
			'imei_number2' => $this->input->post('imei_number2'),
			'serial_number' => $this->input->post('serial_number'),
			'price' => $this->input->post('price'),
			'date_added' => date("Y-m-d H:i:s")
		);

		$insert = $this->admin_model->insert_row('products', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Data Successfully Added..!');
			redirect(base_url('products'));
		}
	}

	public function update_product(){

		$id = $this->input->post('product_id');
		$data = array(
			'product_name' => $this->input->post('product_name'),
			'brand_name' => $this->input->post('brand_name'),
			'category_id' => $this->input->post('category_name'),
			'imei_number1' => $this->input->post('imei_number1'),
			'imei_number2' => $this->input->post('imei_number2'),
			'serial_number' => $this->input->post('serial_number'),
			'price' => $this->input->post('price'),
			'date_modified' => date("Y-m-d H:i:s")
		);
		$where = array('id' => $id );
		$update = $this->admin_model->update_row_data('products', $where, $data);
		if($update){
			$this->session->set_flashdata('message', 'Data Successfully Updated..!');
			redirect(base_url('products'));
		}
	}

	public function staffs()
	{
		$data['session_user'] = $this->session->userdata('admin_loggedin');
		$data['staffs'] = $this->admin_model->get_data('employees', array('status'=>'1'), 'result_array');
		$this->load->view('config/template_start');
		$this->load->view('config/page_head',$data);
		$this->load->view('staffs_list', $data);
		$this->load->view('config/page_footer');
		$this->load->view('config/template_scripts');
		$this->load->view('config/template_end');
	}
	public function insert_staff(){

		$data = array(
			'full_name' => $this->input->post('staff_full_name'),
			'phone_number' => $this->input->post('staff_phone_number'),
			'user_name' => $this->input->post('staff_user_name'),
			'password' => $this->input->post('staff_password'),
			'email' => $this->input->post('staff_email'),
			'birthdate' => $this->input->post('staff_dob'),
			'gender' => $this->input->post('staff_gender'),
			'address' => $this->input->post('staff_address'),
			'date_added' => date("Y-m-d H:i:s")
		);

		$insert = $this->admin_model->insert_row('employees', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Data Successfully Added..!');
			redirect(base_url('staffs'));
		}
	}
	public function update_staff(){

		$id = $this->input->post('staff_edit_id');
		$data = array(
			'full_name' => $this->input->post('staff_full_name'),
			'phone_number' => $this->input->post('staff_phone_number'),
			'user_name' => $this->input->post('staff_user_name'),
			'password' => $this->input->post('staff_password'),
			'email' => $this->input->post('staff_email'),
			'birthdate' => $this->input->post('staff_dob'),
			'gender' => $this->input->post('staff_gender'),
			'address' => $this->input->post('staff_address'),
			'date_modified' => date("Y-m-d H:i:s")
		);

		$where = array('id' => $id );
		$update = $this->admin_model->update_row_data('employees', $where, $data);
		if($update){
			$this->session->set_flashdata('message', 'Data Successfully Updated..!');
			redirect(base_url('staffs'));
		}
	}
	public function assign_role(){
		
		$empId = $this->input->post('assign_emp_id');

		$data = array(
			'role_type' => $this->input->post('staff_role_type'),
			'date_modified' => date("Y-m-d H:i:s")
		);

		$where = array('id' => $empId );
		$update = $this->admin_model->update_row_data('employees', $where, $data);
		if($update){
			$this->session->set_flashdata('message', 'Data Successfully Updated..!');
			redirect(base_url('staffs'));
		}
	}

	public function godown()
	{
		$data['session_user'] = $this->session->userdata('admin_loggedin');
		$data['stocks'] = $this->admin_model->get_all_stocks();
		$data['categories'] = $this->admin_model->get_data('categories', array('status'=>'1'), 'result_array');
		$data['suppliers'] = $this->admin_model->get_data('suppliers', array('status'=>'1'), 'result_array');
		$this->load->view('config/template_start');
		$this->load->view('config/page_head',$data);
		$this->load->view('godown', $data);
		$this->load->view('config/page_footer');
		$this->load->view('config/template_scripts');
		$this->load->view('config/template_end');
	}
	public function fetch_data_array(){
		$id = $this->input->post('id');
		$tbl_name = $this->input->post('tbl_name');
		$result = $this->admin_model->get_data('products', array('category_id'=>$id, 'status'=>'1'), 'result');
		if($result){
			$data['data'] = $result;
            $data['status'] = 1;
		} else {
			$data['status'] = 2;
		}
		echo json_encode($data);
	}
	public function insert_stock(){

		$stype = $this->input->post('supplier_type');
		if($stype == 'new'){
			$supplierData = array(
				'supplier_name' => $this->input->post('supplier_name'),
				'phone_number' => $this->input->post('supplier_phone'),
				'details' => $this->input->post('supplier_details'),
				'date_added' => date("Y-m-d H:i:s")
			);
			$supplier_id = $this->admin_model->insert_row('suppliers', $supplierData);
		} else {
			$supplier_id = $this->input->post('stock_supplier_id');
		}

		$data = array(
			'product_id' => $this->input->post('stock_product_id'),
			'supplier_id' => $supplier_id,
			'no_of_stock' => $this->input->post('stock_number'),
			'date_added' => date("Y-m-d H:i:s")
		);
		
		$insert = $this->admin_model->insert_row('godown', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Data Successfully Added..!');
			redirect(base_url('godown'));
		}
	}

	public function supplier_details($id)
	{
		if(!empty($id)){
			$data['session_user'] = $this->session->userdata('admin_loggedin');
			$data['supplier'] = $this->admin_model->get_by_id($id, 'suppliers');
			if(!empty($data['supplier'])){
				$data['stocks'] = $this->admin_model->get_stocks_by_supplier($id);
				
				$this->load->view('config/template_start');
				$this->load->view('config/page_head',$data);
				$this->load->view('supplier_details', $data);
				$this->load->view('config/page_footer');
				$this->load->view('config/template_scripts');
				$this->load->view('config/template_end');
			} else {
				redirect(base_url('godown'));
			}
		} else {
			redirect(base_url('godown'));
		}
	}
	public function update_stock($supplierId){
		
		$stock_id = $this->input->post('update_stock_id');

		$data = array(
			'no_of_stock' => $this->input->post('update_stock_number'),
			'date_modified' => date("Y-m-d H:i:s")
		);

		$where = array('id' => $stock_id );
		$update = $this->admin_model->update_row_data('godown', $where, $data);
		if($update){
			$this->session->set_flashdata('message', 'Data Successfully Updated..!');
			redirect(base_url('supplier/'.$supplierId));
		}
	}

	public function customers()
	{
		$data['session_user'] = $this->session->userdata('admin_loggedin');
		$data['customers'] = $this->admin_model->get_data('customers', array('status'=>'1'), 'result_array');
		$this->load->view('config/template_start');
		$this->load->view('config/page_head',$data);
		$this->load->view('customers_list', $data);
		$this->load->view('config/page_footer');
		$this->load->view('config/template_scripts');
		$this->load->view('config/template_end');
	}
	public function insert_customer(){

		$data = array(
			'name' => $this->input->post('customer_name'),
			'phone_number' => $this->input->post('customer_phone'),
			'address' => $this->input->post('customer_address'),
			'date_added' => date("Y-m-d H:i:s")
		);

		$insert = $this->admin_model->insert_row('customers', $data);
		if($insert){
			$this->session->set_flashdata('message', 'Data Successfully Added..!');
			redirect(base_url('customers'));
		}
	}
	public function update_customer(){

		$id = $this->input->post('customer_id');
		$data = array(
			'name' => $this->input->post('customer_name'),
			'phone_number' => $this->input->post('customer_phone'),
			'address' => $this->input->post('customer_address'),
			'date_modified' => date("Y-m-d H:i:s")
		);

		$where = array('id' => $id );
		$update = $this->admin_model->update_row_data('customers', $where, $data);
		if($update){
			$this->session->set_flashdata('message', 'Data Successfully Updated..!');
			redirect(base_url('customers'));
		}
	}
	public function customer_details($id)
	{
		if(!empty($id)){
			$data['session_user'] = $this->session->userdata('admin_loggedin');
			$data['customer'] = $this->admin_model->get_by_id($id, 'customers');
			if(!empty($data['customer'])){
				$data['stocks'] = $this->admin_model->get_stocks_by_supplier($id);
				
				$this->load->view('config/template_start');
				$this->load->view('config/page_head',$data);
				$this->load->view('customer_details', $data);
				$this->load->view('config/page_footer');
				$this->load->view('config/template_scripts');
				$this->load->view('config/template_end');
			} else {
				redirect(base_url('customers'));
			}
		} else {
			redirect(base_url('customers'));
		}
	}
}
