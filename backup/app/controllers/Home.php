<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
      
       //$this->load->view('home/index');

		echo "Home Page";

	}
	


}

/* End of file Home.php */
/* Location: .//D/Ampps/www/mlm.com/app/controllers/Home.php */
