<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
		 {
		   parent::__construct();
		   $this->is_logged_in();
		 }

	function home_page()
		{
			
			   		
			$this->load->model('Dev');
	   		$data['children'] = $this->Dev->get_all_children('1');	
			$data['last_status'] = $this->Dev->get_last_status();
			$data['Name'] = $this->session->userdata('Name');
			$data['main_content']='admin/admin_view';
			$data['needs_packets'] = $this->Dev->check_initial('i_packet_sent', "0");
			$data['returns_packets'] = $this->Dev->check_returned('i_packet_returned', "0");
		 	$this->load->view('includes/template',$data);
		}
	


	function about(){
		$data['main_content'] = 'admin/about_view';
		$this->load->view('includes/template',$data);
	}	
	
	function add_child(){
	 	$this->load->model('Dev');
	 	$data['agencies'] = $this->Dev->get_agencies();
	 	$data['main_content'] = 'admin/add_child_view';
	   	$this->load->view('includes/template',$data);
	 	}
	 function remove_child(){
	 		
	 	$this->load->model('dev');
	 	$this->Dev->remove_child($data);
	 }

	function view_child()
	 	{
	 		$this->load->helper('form');
	 		$data['main_content'] = 'admin/record_view';
	   		$data['record_id'] = $this->uri->segment(3,0);
	   		$this->load->model('Dev');
	   		
	   		$data['activities'] = $this->Dev->get_activities($data['record_id']);
	   		$data['child'] = $this->Dev->get_child($data['record_id']);
	   		$data['status_items'] = $this->Dev->get_status_items($data['record_id']);
	   		$data['agencies'] = $this->Dev->get_agencies();
	   		$data['renewal_items'] = $this->Dev->get_renewal_status($data['record_id']);

	   		
	   		$this->load->view('includes/template',$data);

	   		//need to get status and whether checked

	 	}

	function update_child(){
	 	$this->load->helper('form');
	 	$theChild=array(
	 		'child_firstname'=>$this->input->post('first_name'),
	 		'child_lastname'=>$this->input->post('last_name'),
	 		'hmg_referral_id'=>$this->input->post('hmg_id'),
	 		'caregiver_name'=>$this->input->post('caregiver_name'),
	 		'child_id'=>$this->input->post('child_id'),
	 		'AssignedTo'=>$this->input->post('AssignedTo')
	 		);
	 	
	 	$this->load->model('Dev');
	 	$query = $this->Dev->update_child($theChild);
	 	$data['child'] = $this->Dev->get_child($this->input->post('child_id'));
	 	$data['activities'] = $this->Dev->get_activities($this->input->post('child_id'));
	 	$data['message'] = 'Record Update';
	 	$data['main_content'] = 'admin/record_view';
	   	$this->load->view('includes/template',$data);
	  		
		 }

 function submit_child(){
	 	$theChild=array(
	 		'child_firstname'		=>$this->input->post('first_name'),
	 		'child_lastname'		=>$this->input->post('last_name'),
	 		'hmg_referral_id'		=>$this->input->post('hmg_id'),
	 		'caregiver_name'		=>$this->input->post('caregiver_name'),
	 		'AssignedTo' 			=> $this->input->post('AssignedTo')
	 		);

	 	$this->load->model('dev');
	 	$this->dev->add_child($theChild);
	 	//$data['message'] = 'Data Inserted Successfully';
	 	//$data['main_content'] = 'admin/add_child_view';
	   	//$this->load->view('includes/template',$data);
	   	redirect('admin/home_page','refresh');
	 }

function update_status(){
	$this->load->model('Dev');
	$this->Dev->update_status();
	
}

function archive_child(){
	$this->load->model('Dev');
	$cid = $this->uri->segment(3,0);
	$this->Dev->archive_child($cid);
	redirect('admin/home_page','refresh');
	
}

function reopen_child(){
	$this->load->model('Dev');
	$cid = $this->uri->segment(3,0);
	$this->Dev->archive_child($cid,'1');
	redirect('admin/home_page','refresh');
}

function renew_child(){
	$this->load->model('Dev');
	//catch renewal data
	$info['child_id'] = $this->input->post('child_id');
	$info['renewal_date'] = $this->input->post('renewal_date');
	$info['renewal_note'] = $this->input->post('renewal_note');
	
	//change child record
	$this->Dev->renew_child($info);

	//add new status items to status record
	$this->Dev->add_renewal_status($info);
	//add new status items
	$htmlResponse = $this->load->view('admin/statusform_view',null,true);

	$this->output->set_content_type('application/json');
	$this->output->set_output(json_encode(array('StatusItems'=> $htmlResponse)));

}

function archived_children(){
			$this->load->model('Dev');
	   		$data['children'] = $this->Dev->get_all_children('0');	
			$data['last_status'] = $this->Dev->get_last_status();
			$data['Name'] = $this->session->userdata('Name');
			$data['main_content']='admin/archive_child_view';
		 	$this->load->view('includes/template',$data);
}

function is_logged_in()
	{
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in != true)
		{
			echo 'You need to login or create a user account to access this page.<a href="../login">Login</a>';
			die();
		}
	}
}
