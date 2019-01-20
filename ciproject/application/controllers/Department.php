<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model ('dep_model');
		$data = array();
		
	}
        public function adddepartment(){
		$data['title'] = 'Add Department';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depadd'] = $this->load->view('inc/departmentadd', '',TRUE);
		$this->load->view('adddepartment', $data);

	}

	public function addDepartmentForm(){
		$data['depname'] = $this->input->post('depname');
		$data['deparea'] = $this->input->post('deparea');
		$data['depcode'] = $this->input->post('depcode');
	

		$depname = $data['depname'];
		$deparea = $data['deparea'];
		$depcode = $data['depcode'];
	


		if (empty($depname) && empty($deparea) && empty($depcode))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/adddepartment");
			
		
		}else{
			$this->dep_model->SaveDepartment($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/adddepartment");
		}



	}

	public function departmentlist(){
		$data['title'] = 'Department List';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depdata'] = $this->dep_model->getAllDepartmentData();
		$data['listdep'] = $this->load->view('inc/listdepartment', $data,TRUE);
		$this->load->view('departmentlist', $data);

	}
	public function editdepartment($id){
		$data['title'] = 'Edit Department';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['depById'] = $this->dep_model->getDepartmentById($id);
		$data['editdep'] = $this->load->view('inc/depedit', $data,TRUE);
		$this->load->view('editdepartment', $data);


}






}