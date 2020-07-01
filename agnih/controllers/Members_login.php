<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Members_login extends CI_Controller {

    public function __construct() {
        parent::__construct('members_login');
        $this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '47', 'value');
    }

    // List all your items
    public function index() {

        if ($this->member_permission() == TRUE) {
            redirect(base_url() . 'members/', 'refresh');
        } else {

            $page_data['page'] = "Members Now";
            $page_data['login_error'] = "";

            if ($this->session->flashdata('alert') == "login_error") {
                $page_data['login_error'] = translate('invalid_username_or_password!');
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

        if ($this->member_permission() == TRUE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));

            $remember_me = $this->input->post('remember_me');

            $result = $this->Crud_model->check_members('sponsor', $username, $password);

            //echo $this->db->last_query();

            $data = array();
            if ($result) {

                if ($result->is_blocked == "no") {
                    $data['sponsor_state'] = 'yes';
                    $data['sponsor_id'] = $result->sponsor_id;
                    $data['sponsor_name'] = $result->username;
                    $data['sponsor_email'] = $result->email;
                    $data['sponsor_product'] = $result->product;


                    if ($remember_me == 'checked') {

                        $this->session->set_userdata($data);

                        setcookie('cookie_sponsor_id', $this->session->userdata('sponsor_id'), time() + (1296000), "/");
                        setcookie('cookie_sponsor_name', $this->session->userdata('sponsor_name'), time() + (1296000), "/");
                        setcookie('cookie_sponsor_email', $this->session->userdata('sponsor_email'), time() + (1296000), "/");
                    } else {
                        $this->session->set_userdata($data);
                    }

                    redirect(base_url() . 'members/', 'refresh');
                } elseif ($result->is_blocked == "yes") {

                    $this->session->set_flashdata('alert', 'blocked');

                    redirect(base_url() . 'members_login/block', 'refresh');
                }
            } else {

                $this->session->set_flashdata('alert', 'login_error');

                redirect(base_url() . 'members_login', 'refresh');
            }
        }
    }

    public function block() {
        $page_data['page'] = "Dashboard";
        $page_data['title'] = "Dashboard Page || " . $this->system_title;


        $this->load->view($this->theme . '/login/block', $page_data);
    }

    public function logout() {

        setcookie("cookie_sponsor_id", "", time() - 3600, "/");
        setcookie("cookie_sponsor_name", "", time() - 3600, "/");
        setcookie("cookie_sponsor_email", "", time() - 3600, "/");

        $this->session->unset_userdata('sponsor_state');
        $this->session->unset_userdata('sponsor_id');
        $this->session->unset_userdata('sponsor_name');
        $this->session->unset_userdata('sponsor_email');

        // $this->session->sess_destroy();

        redirect(base_url() . 'members_login/', 'refresh');
    }

    function member_permission() {
        $login_state = $this->session->userdata('sponsor_state');
        if ($login_state == 'yes') {
            $sponsor_id = $this->session->userdata('sponsor_id');
            if ($sponsor_id == NULL) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

}
