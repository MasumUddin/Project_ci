<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model ('student_model');
		$data = array();
		
	}
	public function addstudent(){
		$data['title'] = 'Add Student';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['studentadd'] = $this->load->view('inc/studentadd', '',TRUE);
		$this->load->view('addstudent', $data);

	}

	public function addStudentForm(){
		$data['name'] = $this->input->post('name');
		$data['dep'] = $this->input->post('dep');
		$data['roll'] = $this->input->post('roll');
		$data['reg'] = $this->input->post('reg');
		$data['session'] = $this->input->post('session');
		$data['batch'] = $this->input->post('batch');

		$name = $data['name'];
		$dep = $data['dep'];
		$roll = $data['roll'];
		$reg = $data['reg'];
		$session = $data['session'];
		$batch = $data['batch'];


		if (empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($batch))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			//redirect("student/addstudent");
			
		
		}else{
			$this->student_model->saveStudent($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			//redirect("student/addstudent");
		}
		redirect("student/addstudent");


	}
	public function studentlist(){
	    $data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['studentdata'] = $this->student_model->getAllStudentData();
		$data['liststudent'] = $this->load->view('inc/liststudent', $data,TRUE);
		$this->load->view('studentlist', $data);


	}
	public function editstudent($sid){
	    $data['title'] = 'Student List';
		$data['header'] = $this->load->view('inc/header', $data,TRUE);
		$data['footer'] = $this->load->view('inc/footer', '',TRUE);
		$data['sidebar'] = $this->load->view('inc/sidebar', '',TRUE);
		$data['stuById'] = $this->student_model->getStudentById($sid);
		$data['editstudent'] = $this->load->view('inc/studentedit', $data,TRUE);
		$this->load->view('editstudent', $data);


	}
	public function updateStudent(){
		$data['sid'] = $this->input->post('sid');
		$data['name'] = $this->input->post('name');
		$data['dep'] = $this->input->post('dep');
		$data['roll'] = $this->input->post('roll');
		$data['reg'] = $this->input->post('reg');
		$data['session'] = $this->input->post('session');
		$data['batch'] = $this->input->post('batch');

        $sid = $data['sid'];
        $name = $data['name'];
		$dep = $data['dep'];
		$roll = $data['roll'];
		$reg = $data['reg'];
		$session = $data['session'];
		$batch = $data['batch'];


		if (empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($batch))
		 {
		 	
			$sdata=array();
			$sdata['msg'] = '<span style= "color:red">Field must not be empty!</span>';
			$this->session->set_flashdata($sdata);
			redirect("student/editstudent/".$sid);
			
		
		}else{
			$this->student_model->updateStudentData($data);
			$sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("student/editstudent/".$sid); 
		


		}


	}

	public function delstudent($sid){
		    $this->student_model->delStudentByid($sid);
		    $sdata=array();
			$sdata['msg'] = '<span style= "color:green">Data added successfully!</span>';
			$this->session->set_flashdata($sdata);
			redirect("student/studentlist"); 



	}
	


}
