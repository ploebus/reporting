<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	 }

	 function index()
	 {
	 
	   $this->load->helper(array('form'));
	   $data['main_content'] = 'login_form';
	   $this->load->view('login_form');
	 }

	function validate_credentials()
	{

		$this->load->model('user');
		$this->load->library('session');
		$query = $this->user->validate();

		if($query) //if the user's credentials validated...
		{
			$data = array(
					'username' => $query->username,
					'is_logged_in' => TRUE,
					'OrgName'=>$query->OrgName,
					'Name'=> $query->first_name." ".$query->last_name
					);
			
			$this->session->set_userdata($data);
			
			if($this->session->userdata('username') == "admin"){
				redirect('admin/home_page');
			}
			else{
				redirect('site/home_page');
			}
		
		}
		
		else
			{
				$this->index();
			}

	}
	function signup()
		{

			$this->load->helper(array('form'));
			$data['main_content'] = 'signup_form';
			$this->load->view('includes/template',$data);

		}


	function create_member()
	{
		$this->load->library('form_validation');
		//field name,error message, validation rules

		$this->form_validation->set_rules('first_name','Name','trim|required');
		$this->form_validation->set_rules('last_name','Name','trim|required');
		$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('agency_name','Work Name','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('password2','Password Confirmation','trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else
		{
			$this->load->model('User');
			if($query = $this->User->create_member())
			{
				
				$data['main_content'] = 'signup_successful';
				
				$this->load->view('includes/template',$data);
			}
			else
			{
				$this->signup();
			}
		}

	}

	function qi_expense()
	{
		$data['main_content'] = 'qi_view';
		$this->load->view('includes/template',$data);
	}
}

