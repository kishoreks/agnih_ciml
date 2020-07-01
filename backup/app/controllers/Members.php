<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '46', 'value');

	}

	// List all your items
	public function index()
	{

		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "home";
        $this->load->view($this->theme . '/index', $page_data);
              
	}

	public function dashboard()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "home";
        $this->load->view($this->theme . '/index', $page_data);
	}



	public function profile()
	{

		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "profile";
        $this->load->view($this->theme . '/index', $page_data);
		
	}


	public function directs()
	{

		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "directs";
        $this->load->view($this->theme . '/index', $page_data);
		
	}

	public function reflink()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "reflink";
        $this->load->view($this->theme . '/index', $page_data);
	}

	public function send_help()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "send_help";
        $this->load->view($this->theme . '/index', $page_data);
	}

	public function get_help()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "get_help";
        $this->load->view($this->theme . '/index', $page_data);
	}

	public function send_history()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "send_history";
        $this->load->view($this->theme . '/index', $page_data);
	}

	public function get_history()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "send_history";
        $this->load->view($this->theme . '/index', $page_data);
	}


	public function change_password()
	{
		$page_data['page'] = "listing";
        $page_data['title'] = "Listing Page || " . $this->system_title;
        $page_data['page_file'] = "change_password";
        $this->load->view($this->theme . '/index', $page_data);
	}

	
}

/* End of file Members.php */
/* Location: .//D/Ampps/www/mlm.com/app/controllers/Members.php */
