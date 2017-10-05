<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class site extends CI_Controller {

	 function __construct()
		 {
		   parent::__construct();
		   $this->is_logged_in();
		 }
	
	function home_page()
		{
			$this->load->helper(array('form'));
			$this->load->model('Dev');
			
	   		$data['children'] = $this->Dev->get_all_children('1');
 	        //foreach($data['Children'] as $child){

 	        // }
	   		$data['Name'] = $this->session->userdata('Name');
	   		$data['cohorts'] = $this->Dev->get_cohorts();

	   		$data['main_content'] = 'home_view';
	   		$this->load->view('includes/template',$data);
		}


		
	 function view_child()
	 	{
	 		
	 		$this->load->helper('form');
	 		$this->load->model('Dev');
	 		$data['main_content'] = 'record_view';
	 		$this->session->set_userdata('child_id',$this->uri->segment(3,0));
	   		$data['record_id'] = $this->uri->segment(3,0);
	   		$data['cohorts'] = $this->Dev->get_cohorts();
	 		$data['activities'] = $this->Dev->get_activities($this->uri->segment(3,0));
	   		$data['child'] = $this->Dev->get_child($this->uri->segment(3,0));
	   		$data['status_items'] = $this->Dev->get_status_items($this->uri->segment(3,0));
	   		$this->load->view('includes/template',$data);
	   		//echo $this->uri->segment(3,0);
	 	}

	function get_child(){
		$child_id = $this->input->get('child_id');
		$this->load->model('dev');
		$query = $this->dev->get_child($child_id);
		echo json_encode($query);
		

	}

	function add_child(){
	 	$data['main_content'] = 'add_child_view';
	   	$this->load->view('includes/template',$data);
	 }

	 function remove_child(){
	 	$data = array(
	 		'child_id'=>$this->input->post('child_id'));
		$this->load->model('dev');
	 	$this->Dev->remove_child($data);
	 }

	 function submit_child(){
	 	

	 	$this->load->model('Dev');
	 	$this->Dev->add_child();
	 	$data['message'] = 'Data Inserted Successfully';
	 	$data['main_content'] = 'add_child_view';
	   	$this->load->view('includes/template',$data);
	 }

	 
	 function update_child(){
	 	//$this->load->helper('form');
	 	
	 	$theChild=array(
	 		'child_firstname'=>$this->input->post('first_name'),
	 		'child_lastname'=>$this->input->post('last_name'),
	 		'hmg_referral_id'=>$this->input->post('hmg_id'),
	 		'caregiver_name'=>$this->input->post('caregiver_name'),
	 		'child_id'=>$this->input->post('child_id'),
	 		);
	 	
	 	$this->load->model('Dev');
	 	$this->Dev->update_child($theChild);
	 	
	 	//$data['main_content'] = 'record_view';
	 	//$data['child'] = $this->Dev->get_child($this->input->post('child_id'));
	   	//$this->load->view('includes/template',$data);
	 }

	 function reopen_child(){
		$this->load->model('Dev');
		$cid = $this->uri->segment(3,0);
		$this->Dev->archive_child($cid,'1');
		redirect('site/home_page','refresh');
	}

	 function add_group(){
	 	$this->load->model('Dev');
	 	$this->Dev->add_to_group();
	 	redirect('site/home_page','refresh');

	 }

	 function add_activity(){
	 	$this->load->model('Dev');
	 	$data = $this->input->post(NULL, TRUE);
	 	$this->Dev->add_activity($data);
	 }

	 function edit_activity(){
	 	
	 	$this->load->helper('form');
	 	$data['main_content'] = 'edit_activity';
	 	$data['activity'] = $this->Dev->get_activity();
	 	$data['cohorts'] = $this->Dev->get_cohorts();

	 	$this->load->view('includes/template',$data);
	 }

	 

	 function submit_edit_activity(){
	 	$this->load->model('Dev');
	 	$id=$this->uri->segment(3,0);
	 	$this->Dev->post_edit_activity($id);

	 	
	 }

	 function delete_activity(){
	 	$this->Dev->delete_activity();
	 }

	 function create_endnote(){
	 	$this->Dev->update_endnote($this->input->post());
	 	//echo "Hello";
	 }
	 
	 function create_cohort(){

	 	$this->load->model('Dev');
	 	$this->Dev->create_cohort($this->input->post());

	 }

	 function remove_cohort(){
	 	$this->load->model('Dev');
	 	$this->Dev->remove_cohort($this->input->post('cohort_id'));


	 }

	 function edit_cohort(){
	 	$cohort_id = $this->uri->segment(3,0);
	 	$data['cohort'] = $this->Dev->get_cohort($cohort_id);
	 	$data['main_content'] = 'edit_cohort_view';

	 	$this->load->view('includes/template',$data);
	 }

	 function add_cohort(){
	 	$data['main_content'] = 'add_cohort_view';
	   	$this->load->view('includes/template',$data);
	 }

	 function update_status(){
		$this->load->model('Dev');
		$data = array(
			'child_id'=>$this->input->post('child_id'),
			'status_item'=>$this->input->post('item'),
			'status'=>$this->input->post('status')
			);
		$this->Dev->update_status($data);
	}

	 function members_area()
		 {
		 	$data['username']=$this->session->userdata('username');
		 	$this->load->model('Report');
		 	
		 	//get details about the award
		 	if($query = $this->Report->getBalance($this->session->userdata('username')))
				{
					$data['QIAward'] = $query->QIAward;
					$data['QRAward'] = $query->QRAward;
					$data['OrgName'] = $query->OrgName;
					
				}
			
			//get first reporting period
			if($query = $this->Report->getClaims($data['OrgName'],1))
				{
					$data['QIClaims'] = $query;
				}
			
			//get second reporting period
		 	if($query = $this->Report->getClaims($data['OrgName'],2))
				{
					$data['QIClaims2'] = $query;
				}


		 	$data['main_content']='members_area';
		 	$data['username']=$this->session->userdata('username');
		 	$this->load->helper(array('form'));
		 	$this->load->view('includes/template',$data);
		 }

	
	function archived_children(){
			$this->load->model('Dev');
	   		$data['children'] = $this->Dev->get_all_children('0');	
			$data['last_status'] = $this->Dev->get_last_status();
			$data['Name'] = $this->session->userdata('Name');
			$data['main_content']='archive_child_view';
		 	$this->load->view('includes/template',$data);
}

	function sent_incentive(){
		$this->load->model('Dev');
		$this->Dev->sent_incentive();
		
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

	

	function about(){
		$data['main_content'] = 'about_view';
		$this->load->view('includes/template',$data);
	}
	}
