<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function __construct() {
        parent::__construct('Web');
        $this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_phone = $this->Crud_model->get_type_name_by_id('general_settings', '5', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '48', 'value');
    }

    // List all your items
    public function index() {

        $page_data['page'] = "Home";
        $page_data['title'] = "Home Page || " . $this->system_title;
        $page_data['page_file'] = "home/index";

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function about() {
        $page_data['page'] = "Home";
        $page_data['title'] = "Home Page || " . $this->system_title;
        $page_data['page_file'] = "about/index";

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function concept() {
        $page_data['page'] = "Home";
        $page_data['title'] = "Home Page || " . $this->system_title;
        $page_data['page_file'] = "concept/index";

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function products() {
        $page_data['page'] = "Home";
        $page_data['title'] = "Home Page || " . $this->system_title;
        $page_data['page_file'] = "products/index";

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function contact_us() {
        $page_data['page'] = "Home";
        $page_data['title'] = "Home Page || " . $this->system_title;
        $page_data['page_file'] = "contact_us/index";

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function register() {

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
                } elseif ($this->session->flashdata('alert') == "failed_active") {
                    $page_data['danger_alert'] = translate("failed_to_activate_the_data!");
                } elseif ($this->session->flashdata('alert') == "failed_block") {
                    $page_data['danger_alert'] = translate("failed_to_block_the_data!");
                } elseif ($this->session->flashdata('alert') == "active") {
                    $page_data['success_alert'] = translate("you_have_successfully_activate!");
                } elseif ($this->session->flashdata('alert') == "block") {
                    $page_data['danger_alert'] = translate("sponsor_has_successfully_block!");
                } elseif ($this->session->flashdata('alert') == "sponsor_alert") {
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found_in_the_cloud!");
                }
 
                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[sponsor.username]');
                $this->form_validation->set_rules('sponsor_id', 'Sponsor Id', 'trim|required');
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('r_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
               
                $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|is_unique[sponsor.mobile_no]');
                $this->form_validation->set_rules('back_name', 'Back Name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC', 'trim|required');
                $this->form_validation->set_rules('payments', 'Payment Type', 'trim|required');
                $this->form_validation->set_message('is_unique', 'The %s is already taken');

                  if ($this->form_validation->run() == FALSE) {
                      
                       $page_data['page'] = "Dashboard";
                       $page_data['title'] = "Dashboard Page || " . $this->system_title;
                       $page_data['page_file'] = "register/index";
                       $page_data['form_contents'] = $this->input->post();
                       $page_data['peding_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'yes'))->result();
                       $this->load->view($this->theme . '/index', $page_data);
                  }else{

                        $sponsor_id = $this->input->post('sponsor_id');
                        $get_sponsor = $this->db->get_where('sponsor', array('profile_id' => $sponsor_id))->row();
                        $count_sponsor = $this->db->get_where('sponsor', array('sponsor_id' => $sponsor_id))->result();

                         // var_dump($this->input->post());
                         //  die();

                          if ($get_sponsor == null) {
                               $this->session->set_flashdata('alert', 'sponsor_alert');
                               redirect(base_url() . 'web/register', 'refresh');
                          }else{

                             $profile_image[] = array('profile_image' => 'default.jpg',
                            'thumb' => 'default_thumb.jpg'
                                );
                                $profile_image = json_encode($profile_image);

                                $data['username'] = $this->input->post('username');
                                $data['full_name'] = $this->input->post('full_name');
                                $data['gender'] = $this->input->post('gender');
                                $data['last_name'] = $this->input->post('last_name');
                                $data['password'] = sha1($this->input->post('password'));
                                $data['email'] = $this->input->post('email');
                                $data['address'] = $this->input->post('address');
                                $data['position'] = $this->input->post('position');
                                $data['product'] = $get_sponsor->product;
                                $data['date_of_birth'] = $this->input->post('date_of_birth');
                                $data['mobile_no'] = $this->input->post('mobile_no');
                                $data['back_name'] = $this->input->post('back_name');
                                $data['account_no'] = $this->input->post('account_no');
                                $data['branch_name'] = $this->input->post('branch_name');
                                $data['ifsc'] = $this->input->post('ifsc_code');
                                $data['profile_image'] = $profile_image;
                                $data['is_blocked'] = 'yes';
                                $data['active_on'] = time();
                                $data['payment_type'] = $this->input->post('payments');
                                $data['sponsor_referral_id'] = $get_sponsor->sponsor_id;
                                $data['sponsor_referral_profile_id'] = $get_sponsor->profile_id;
                                $data['created_on'] = date("Y-m-d H:i:s");

                               
                                $this->db->insert('sponsor', $data);

                                $insert_id = $this->db->insert_id();
                                $profile_id = strtoupper(substr(hash('sha512', rand()), 0, 8)) . $insert_id;

                                $this->db->where('sponsor_id', $insert_id);
                                $result = $this->db->update('sponsor', array('profile_id' => $profile_id));

                                $invoice['invoice_no'] = str_pad($insert_id, 7, "0", STR_PAD_LEFT);
                                $invoice['sponsor_id'] = $insert_id;
                                $invoice['product'] = $get_sponsor->product;
                                $invoice['payment_type'] = $this->input->post('payments');
                                $invoice['created_at'] = date("Y-m-d H:i:s");

                                $this->db->insert('sponsor_invoice', $invoice);

                                $get_data = $this->db->get_where('sponsor', array(
                                            'sponsor_id' => $insert_id
                                        ))->result_array();

                                if ($this->Email_model->account_opening('sponsor', $data['email'], $this->input->post('password')) == false) {
                                    //$msg = 'done_but_not_sent';
                                } else {
                                    //$msg = 'done_and_sent';
                                }
                                $this->load->model('sms_model');
                                $this->sms_model->send_sms_via_msg91('Congrats & Welcome To TIPSLIFE Details / MemberID '
                                        . $get_data[0]['profile_id'] .
                                        ' Name: ' . $get_data[0]['username'] .
                                        ' password: ' . $data['password'] . 'Wish You Great Success By www.tipslife.in', $data['mobile']);

                                if ($result) {
                                    $this->session->set_flashdata('alert', 'add');
                                    $this->session->set_userdata('register_success');
                                    redirect(base_url() . 'web/register_success', 'refresh');
                                } else {
                                    $this->session->set_flashdata('alert', 'failed_add');
                                    redirect(base_url() . 'web/register_success', 'refresh');
                                }


                          }

                  }

        
    }


    public function register_success()
    {
        
        if ($this->session->userdata('register_success')) {
           $page_data['page'] = "Dashboard";
           $page_data['title'] = "Dashboard Page || " . $this->system_title;
           $page_data['page_file'] = "register/success";
           $page_data['form_contents'] = $this->input->post();
           $page_data['peding_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'yes'))->result();
           $this->load->view($this->theme . '/index', $page_data);
        } else {
           redirect(base_url() . 'web', 'refresh');
        }
        

       

    }

}

/* End of file Web.php */
/* Location: .//C/Program Files (x86)/Ampps/www/tipslife.ag/agnih/controllers/Web.php */
