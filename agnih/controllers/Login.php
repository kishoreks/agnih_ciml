<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct('login');
        $this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '46', 'value');
    }

    public function index() {

        $this->users();
    }

    // List all your items
    public function users() {

        if ($this->admin_permission() == TRUE) {
            redirect(base_url() . 'home/', 'refresh');
        }

        if ($this->admin_permission() == TRUE) {
            redirect(base_url() . 'home/', 'refresh');
        } else {

            $page_data['page'] = "login Now";
            $page_data['login_error'] = "";

            if ($this->session->flashdata('alert') == "login_error") {
                $page_data['login_error'] = translate('invalid_email_or_password!');
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


            $this->load->view($this->theme . '/login/index', $page_data);
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
                    $data['role'] = $result->role;

                    if ($remember_me == 'checked') {
                        $this->session->set_userdata($data);
                        setcookie('cookie_admin_id', $this->session->userdata('admin_id'), time() + (1296000), "/");
                        setcookie('cookie_admin_name', $this->session->userdata('admin_name'), time() + (1296000), "/");
                        setcookie('cookie_admin_email', $this->session->userdata('admin_email'), time() + (1296000), "/");
                    } else {
                        $this->session->set_userdata($data);
                    }

                    redirect(base_url() . 'home/', 'refresh');
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

        setcookie("cookie_admin_id", "", time() - 3600, "/");
        setcookie("cookie_admin_name", "", time() - 3600, "/");
        setcookie("cookie_admin_email", "", time() - 3600, "/");

        $this->session->unset_userdata('login_state');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_email');

        // $this->session->sess_destroy();

        redirect(base_url() . 'login/', 'refresh');
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
