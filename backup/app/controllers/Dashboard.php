<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '46', 'value');
        $this->Crud_model->timezone();

    }

    // List all your items
    public function index() {

        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        }

        $this->home();
    }

    public function home() {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page'] = "Dashboard";
        $page_data['title'] = "Dashboard Page || " . $this->system_title;
        $page_data['page_file'] = "home";
        $this->load->view($this->theme . '/index', $page_data);
    }

    public function help_concept($para1 = '', $para2 = '') {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {

            $page_data['title'] = "Admin || " . $this->system_title;

            if ($para1 == '') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help_concept/index";
                $this->db->where_not_in('help_manage_id', 1);
                $page_data['all_help_manage'] = $this->db->get("help_manage")->result();

                if ($this->session->flashdata('alert') == "add") {
                    $page_data['success_alert'] = translate("you_have_successfully_added_the_data!");
                } elseif ($this->session->flashdata('alert') == "edit") {
                    $page_data['success_alert'] = translate("you_have_successfully_edited_the_data!");
                } elseif ($this->session->flashdata('alert') == "delete") {
                    $page_data['success_alert'] = translate("you_have_successfully_deleted_the_data!");
                } elseif ($this->session->flashdata('alert') == "failed_add") {
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                } elseif ($this->session->flashdata('alert') == "failed_edit") {
                    $page_data['danger_alert'] = translate("failed_to_edit_the_data!");
                } elseif ($this->session->flashdata('alert') == "failed_delete") {
                    $page_data['danger_alert'] = translate("failed_to_delete_the_data!");
                }

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "add_help_concept") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help_concept/add_help_concept";

                if ($this->session->flashdata('alert') == "failed_add") {
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                }

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "edit_help_concept") {
                
            } elseif ($para1 == "do_add") {

                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'email', 'required', array('required' => 'The %s is required.', 'is_unique' => 'This %s already exists.'));
                $this->form_validation->set_rules('mobile', 'mobile no', 'required|is_unique[help_manage.mobile]', array('required' => 'The %s is required.', 'is_unique' => 'This %s already exists.'));
                $this->form_validation->set_rules('joined_on', 'joined_on', 'required');
                $this->form_validation->set_rules('sponsor_id', 'sponsor_id', 'required');
                $this->form_validation->set_rules('country', 'country', 'required');
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('bank_name', 'bank_name', 'required');
                $this->form_validation->set_rules('branch', 'branch', 'required');
                $this->form_validation->set_rules('account_number', 'account_number', 'required');
                $this->form_validation->set_rules('ifsc', 'ifsc', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "help_concept/add_help_concept";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");

                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $data['name'] = $this->input->post('name');
                    $data['sponsor_id'] = $this->input->post('sponsor_id');
                    $data['activated_on'] = strtotime($this->input->post('joined_on'));
                    $data['email'] = $this->input->post('email');
                    $data['mobile'] = $this->input->post('mobile');
                    $data['joined_on'] = strtotime($this->input->post('joined_on'));
                    $data['country'] = $this->input->post('country');
                    $data['state'] = $this->input->post('state');
                    $data['city'] = $this->input->post('city');
                    $data['bank_name'] = $this->input->post('bank_name');
                    $data['branch'] = $this->input->post('branch');
                    $data['account_number'] = $this->input->post('account_number');
                    $data['ifsc'] = $this->input->post('ifsc');
                    $data['created_on'] = date("Y-m-d H:i:s");

                    $this->db->insert('help_manage', $data);

                    $insert_id = $this->db->insert_id();
                    $help_manage_id = strtoupper(substr(hash('sha512', rand()), 0, 8)) . $insert_id;

                    $this->db->where('help_manage_id', $insert_id);
                    $result = $this->db->update('help_manage', array('manage_profile_id' => $help_manage_id));

                   
                    $get_data = $this->db->get_where('help_manage', array(
                        'help_manage_id' => $insert_id
                    ))->result_array();

                    if ($this->Email_model->account_opening('help_manage', $data['email'], $this->input->post('password')) == false) {
                            //$msg = 'done_but_not_sent';
                        } else {
                            //$msg = 'done_and_sent';
                        }
                        $this->load->model('sms_model');
                        $this->sms_model->send_sms_via_msg91('Congrats & Welcome To TIPSLIFE Details-MemberID ' . $get_data[0]['manage_profile_id'] . ' Name: '.$get_data[0]['name'].' Wish You Great Success By www.tipslife.in', $data['mobile']);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'dashboard/help_concept', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'dashboard/help_concept', 'refresh');
                    }
                }
            }elseif ($para1 == "edit_help") {


                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help_concept/edit_help_concept";

                if ($this->session->flashdata('alert') == "failed_add") {
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                }

                $page_data['help_manage_data'] = $this->db->get_where('help_manage', array(
                        'help_manage_id' => $para2
                    ))->result_array();

                $this->load->view($this->theme . '/index', $page_data);


                
            }elseif ($para1 == "update") {

            	 // var_dump($this->input->post());

            	$this->form_validation->set_rules('name', 'Name', 'required');
                // $this->form_validation->set_rules('email', 'email', 'required|is_unique[help_manage.email]', array('required' => 'The %s is required.', 'is_unique' => 'This %s already exists.'));
                // $this->form_validation->set_rules('mobile', 'mobile no', 'required|is_unique[help_manage.mobile]', array('required' => 'The %s is required.', 'is_unique' => 'This %s already exists.'));
                $this->form_validation->set_rules('joined_on', 'joined_on', 'required');
                $this->form_validation->set_rules('sponsor_id', 'sponsor_id', 'required');
                $this->form_validation->set_rules('country', 'country', 'required');
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('bank_name', 'bank_name', 'required');
                $this->form_validation->set_rules('branch', 'branch', 'required');
                $this->form_validation->set_rules('account_number', 'account_number', 'required');
                $this->form_validation->set_rules('ifsc', 'ifsc', 'required');
                 
                   if ($this->form_validation->run() == FALSE) {

                       $page_data['page'] = "Dashboard";
		                $page_data['title'] = "Dashboard Page || " . $this->system_title;
		                $page_data['page_file'] = "help_concept/edit_help_concept";

		                $page_data['form_contents'] = $this->input->post();

		                $page_data['help_manage_data'] = $this->db->get_where('help_manage', array(
		                        'help_manage_id' => $para2
		                    ))->result_array();

		                $this->load->view($this->theme . '/index', $page_data);

                   }else {

                        

                   	    $data['name'] = $this->input->post('name');
	                    $data['sponsor_id'] = $this->input->post('sponsor_id');
	                    $data['activated_on'] = strtotime($this->input->post('joined_on'));
	                    $data['email'] = $this->input->post('email');
	                    $data['mobile'] = $this->input->post('mobile');
	                    $data['joined_on'] = strtotime($this->input->post('joined_on'));
	                    $data['country'] = $this->input->post('country');
	                    $data['state'] = $this->input->post('state');
	                    $data['city'] = $this->input->post('city');
	                    $data['bank_name'] = $this->input->post('bank_name');
	                    $data['branch'] = $this->input->post('branch');
	                    $data['account_number'] = $this->input->post('account_number');
	                    $data['ifsc'] = $this->input->post('ifsc');
	                    $data['update_on'] = date("Y-m-d H:i:s");

	                    // $this->db->insert('help_manage', $data);

	                    // $insert_id = $this->db->insert_id();
	                    // $help_manage_id = strtoupper(substr(hash('sha512', rand()), 0, 8)) . $insert_id;

	                    $this->db->where('help_manage_id', $para2);
	                    $result = $this->db->update('help_manage', $data);

	                    if ($result) {
	                        $this->session->set_flashdata('alert', 'add');
	                        redirect(base_url() . 'dashboard/help_concept', 'refresh');
	                    } else {
	                        $this->session->set_flashdata('alert', 'failed_add');
	                        redirect(base_url() . 'dashboard/help_concept', 'refresh');
	                    }
                   	
                   }


                
            } elseif ($para1 == "welcome_letter") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help_concept/welcome_letter";

                $this->load->view('front/help_concept/welcome_letter', $page_data);
                
            } elseif ($para1 == "delete") {

            		$this->db->where('help_manage_id', $para2);
				    $result = $this->db->delete('help_manage');
				       
					if ($result) {
						$this->session->set_flashdata('alert', 'delete');
					}
					else {
						$this->session->set_flashdata('alert', 'failed_delete');
					}


                
            } elseif ($para1 == 'views') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help_concept/view_help_concept";

                $page_data['help_concept_data'] = $this->db->get_where('help_manage', array(
                            'help_manage_id' => $para2
                        ))->result_array();


                $this->load->view($this->theme . '/index', $page_data);
            }
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

}

/* End of file dashboard.php */
/* Location: .//D/Ampps/www/mlm.com/app/controllers/dashboard.php */
