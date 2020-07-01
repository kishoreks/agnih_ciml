<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {

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

	}

	public function manage_branches($para1 = '', $para2 = '')
	{
		if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } 


		$page_data['page'] = "Branches";
        $page_data['title'] = "Branches Page || " . $this->system_title;
        $page_data['page_file'] = "branches/index";
        $this->load->view($this->theme . '/index', $page_data);


	}

	public function add_branch($para1 = '', $para2 = '')
	{
		if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } 


		$page_data['page'] = "Branches";
        $page_data['title'] = "Branches Page || " . $this->system_title;
        $page_data['page_file'] = "branches/add_branch";
        $this->load->view($this->theme . '/index', $page_data);
	}


	public function admin_permission() {
        $login_state = $this->session->userdata('login_state');
        if ($login_state == 'yes') {
            $admin_id = $this->session->userdata('admin_id');
            if ($admin_id == NULL) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }


    function get_dropdown_by_id($table, $field, $id) {
        $options = $this->db->get_where($table, array($field => $id))->result();
        $table_id = $table . "_id";
        echo "<option value=''>" . translate('choose_one') . "</option>";
        foreach ($options as $value) {
            echo "<option value=" . $value->$table_id . ">" . $value->name . "</option>";
        }
    }

	
}

/* End of file Branches.php */
/* Location: .//D/Ampps/www/tipslife.in/app/controllers/Branches.php */
