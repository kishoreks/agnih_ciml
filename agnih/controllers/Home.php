<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct('home');
        $this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_phone = $this->Crud_model->get_type_name_by_id('general_settings', '5', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '46', 'value');
        $this->Crud_model->timezone();
    }
    // List all your items
    public function index() {

        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        }

        $page_data['page'] = "Home";
        $page_data['title'] = "Home Page || " . $this->system_title;
        $page_data['page_file'] = "home/index";
        $page_data['peding_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'yes'))->result();
        $page_data['active_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->num_rows();
        $page_data['count_tickets'] = $this->db->get('tickets')->num_rows();
        $page_data['count_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->num_rows();
        $this->db->limit(4)->order_by('tickets_id', 'desc');
        $page_data['new_ticket'] = $this->db->get('tickets')->result();
        $payout = $this->db->get_where('released_income', array('status' => 'Paid'))->result();

            $ewallet = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->result(); 
            $package = $this->db->get('package')->result();

            $ewallet_total = 0;

                foreach ($ewallet as $key) {

                   $ewallet_total +=  $this->Crud_model->get_type_name_by_id('package', $key->product, 'fee'); 

                }

               $payout_amount = 0;
               
                foreach ($payout as $row) {
                    $payout_amount += $row->paid_amount;
                 } 

            $page_data['ewallet_total'] = $ewallet_total;      
            $page_data['payout_amount'] = $payout_amount;      
        $this->load->view($this->theme . '/index', $page_data);
    }

    public function ewallet(){
        
            $ewallet = $this->db->get('sponsor')->result(); 
            $package = $this->db->get('package')->result();
            $ewallet_total = 0;

                foreach ($ewallet as $key) {

                   $ewallet_total +=  $this->Crud_model->get_type_name_by_id('package', $key->product, 'fee');       
                }

           return $page_data['ewallet_total'] = $ewallet_total;
    }

    public function account_settings($para1 = '', $para2 = '') {
        if ($this->admin_permission() == FALSE) {

            redirect(base_url() . 'login/', 'refresh');
        } else {

            if ($para1 == 'profile') {

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
                } elseif ($this->session->flashdata('alert') == "sponsor_alert") {
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found!");
                } elseif ($this->session->flashdata('alert') == "sponsor_count") {
                    $page_data['info_alert'] = translate("sponsor_exit_27_members!");
                } elseif ($this->session->flashdata('alert') == "withdrawal") {
                    $page_data['info_success'] = translate("withdrawal_Wallet_success!");
                } elseif ($this->session->flashdata('alert') == "failed_withdrawal") {
                    $page_data['danger_alert'] = translate("withdrawal_Wallet_failed!");
                }

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "account_settings/profile";
                $page_data['form_contents'] = $this->input->post();

                $page_data['get_admin'] = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->row();

                $this->load->view($this->theme . '/index', $page_data);
                
            } elseif ($para1 == "update_profile") {

                $this->form_validation->set_rules('name', 'name', 'trim|required');
                $this->form_validation->set_rules('phone', 'phone', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'address', 'trim|required');


                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "account_settings/profile";
                    $page_data['form_contents'] = $this->input->post();

                    $page_data['get_admin'] = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->row();

                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $profile_image[] = array('profile_image' => 'default.jpg',
                        'thumb' => 'default_thumb.jpg'
                    );
                    $profile_image = json_encode($profile_image);

                    $data['name'] = $this->input->post('name');
                    $data['phone'] = $this->input->post('phone');
                    $data['address'] = $this->input->post('address');
                    $data['email'] = $this->input->post('email');
                    // $data['admin_image'] = $profile_image;
                    $this->db->where('admin_id', $this->session->userdata('admin_id'));
                    $result = $this->db->update('admin', $data);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'home/account_settings/profile', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'home/account_settings/profile', 'refresh');
                    }
                }
            } elseif ($para1 == "upload_profile") {

                if ($_FILES['admin_image']['name'] !== '') {
                    $id = $this->session->userdata('admin_id');
                    $path = $_FILES['admin_image']['name'];
                    $ext = '.' . pathinfo($path, PATHINFO_EXTENSION);

                    if ($ext == ".jpg" || $ext == ".JPG" || $ext == ".jpeg" || $ext == ".JPEG" || $ext == ".png" || $ext == ".PNG") {


                        $this->Crud_model->file_up("admin_image", "admin", $id, '', '', $ext);


                        $images[] = array('admin_image' => 'admin_' . $id . $ext, 'thumb' => 'admin_' . $id . '_thumb' . $ext);
                        $data['admin_image'] = json_encode($images);

                        $this->db->where('admin_id', $this->session->userdata('admin_id'));
                        $result = $this->db->update('admin', $data);

                        $this->session->set_flashdata('alert', 'edit_image');
                        redirect(base_url() . 'home/account_settings/profile', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed');
                        redirect(base_url() . 'home/account_settings/profile', 'refresh');
                    }
                }
            } elseif ($para1 == "change_password") {

                $user_id = $this->session->userdata('admin_id');
                $current_password = sha1($this->input->post('current_password'));
                $new_password = sha1($this->input->post('new_password'));
                $confirm_password = sha1($this->input->post('confirm_password'));
                $prev_password = $this->db->get_where('admin', array('admin_id' => $user_id))->row()->password;
                if ($prev_password == $current_password) {
                    if ($new_password == $current_password) {
                        $ajax_error[] = array('ajax_error' => "<p>" . translate('new_password_and_current_password_are_same') . "!</p>");
                        echo json_encode($ajax_error);
                    }
                    if ($new_password == $confirm_password) {
                        $this->db->where('admin_id', $user_id);
                        $this->db->update('admin', array('password' => $new_password));
                    } else {
                        $ajax_error[] = array('ajax_error' => "<p>" . translate('new_password_does_not_matched_with_confirm_password') . "!</p>");
                        echo json_encode($ajax_error);
                    }
                } else {
                    $ajax_error[] = array('ajax_error' => "<p>" . translate('invalid_current_password') . "!</p>");
                    echo json_encode($ajax_error);
                }
            }
        }
    }

    public function sponsor_register($para1 = "", $para2 = "", $para3 = "", $para4 = "") {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {

            if ($para1 == '') {

                $page_data['title'] = "Admin || " . $this->system_title;

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "user_register/index";
                $page_data['form_contents'] = $this->input->post();
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
                } elseif ($this->session->flashdata('alert') == "sponsor_alert") {
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found!");
                } elseif ($this->session->flashdata('alert') == "sponsor_count") {
                    $page_data['info_alert'] = translate("sponsor_exit_27_members!");
                } elseif ($this->session->flashdata('alert') == "withdrawal") {
                    $page_data['info_success'] = translate("withdrawal_Wallet_success!");
                } elseif ($this->session->flashdata('alert') == "failed_withdrawal") {
                    $page_data['danger_alert'] = translate("withdrawal_Wallet_failed!");
                } elseif ($this->session->flashdata('alert') == "failed_delete_role") {
                    $page_data['danger_alert'] = translate("failed_!_only_admin_can_delete!");
                }

                $this->load->view($this->theme . '/index', $page_data);

            } elseif ($para1 == "register") {

                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[sponsor.username]');
                $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('r_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('product', 'Product', 'trim|required');
                $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|is_unique[sponsor.mobile_no]');
                $this->form_validation->set_rules('back_name', 'Back Name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC', 'trim|required');
                $this->form_validation->set_rules('payments', 'Payment Type', 'trim|required');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_message('is_unique', 'The %s is already taken');

                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "user_register/index";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                    $this->load->view($this->theme . '/index', $page_data);
                } else {

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
                    $data['product'] = $this->input->post('product');
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
                    $data['created_on'] = date("Y-m-d H:i:s");

                    $this->db->insert('sponsor', $data);

                    $insert_id = $this->db->insert_id();
                    $profile_id = strtoupper(substr(hash('sha512', rand()), 0, 8)) . $insert_id;

                    $this->db->where('sponsor_id', $insert_id);
                    $result = $this->db->update('sponsor', array('profile_id' => $profile_id));

                    $invoice['invoice_no'] = str_pad($insert_id, 7, "0", STR_PAD_LEFT);
                    $invoice['sponsor_id'] = $insert_id;
                    $invoice['product'] = $this->input->post('product');
                    $invoice['payment_type'] = $this->input->post('payments');
                    $invoice['username'] = $this->input->post('username');
                    $invoice['created_at'] = date("Y-m-d H:i:s");

                    $this->db->insert('sponsor_invoice', $invoice);

                   

                     $this->Email_model->account_opening('sponsor', $data['email'], $this->input->post('password'));
                    
                     // $this->load->model('sms_model');
                     //    $this->sms_model->send_sms_via_msg91('Congrats & Welcome To TIPSLIFE Details-MemberID ' . $get_data[0]['manage_profile_id'] . ' Name: '.$get_data[0]['name'].' Wish You Great Success By www.tipslife.in', $data['mobile']);
                    $this->load->model('sms_model');
                    $message = 'Congrats & Welcome To TIPSLIFE Details / MemberID '.$profile_id.' Username: ' .$data['username']. ' Password: ' .$this->input->post('password'). ' Wish You Great Success By www.tipslife.in';    

                    $this->sms_model->send_sms_via_msg91($message,$data['mobile_no']);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'home/sponsor_register/all_sponsor', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'home/sponsor_register/all_sponsor', 'refresh');
                    }
                }
            } elseif ($para1 == "all_sponsor") {


                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "user_register/all_sponsor";

                //$this->db->where_not_in('help_manage_id', 1);
                $page_data['all_sponsor'] = $this->db->get("sponsor")->result();
                $page_data['package'] = $this->db->get_where('package', array('package_id' => 1))->row();


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
                } elseif ($this->session->flashdata('alert') == "sponsor_alert") {
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found!");
                } elseif ($this->session->flashdata('alert') == "sponsor_count") {
                    $page_data['info_alert'] = translate("sponsor_exit_27_members!");
                } elseif ($this->session->flashdata('alert') == "withdrawal") {
                    $page_data['info_success'] = translate("withdrawal_Wallet_success!");
                } elseif ($this->session->flashdata('alert') == "failed_withdrawal") {
                    $page_data['danger_alert'] = translate("withdrawal_Wallet_failed!");
                } elseif ($this->session->flashdata('alert') == "active") {
                    $page_data['success_alert'] = translate("you_have_successfully_activate!");
                } elseif ($this->session->flashdata('alert') == "block") {
                    $page_data['danger_alert'] = translate("sponsor_has_successfully_block!");
                }

                $this->load->view($this->theme . '/index', $page_data);

            } elseif ($para1 == 'sponsor_invoice') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "user_register/invoice";

                $page_data['invoice_sponsor'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                $page_data['invoice_data'] = $this->db->get_where('sponsor_invoice', array('sponsor_id' => $para2))->row();
               


                $this->load->view($this->theme . '/user_register/invoice', $page_data);

            } elseif ($para1 == "update_sponsor") {


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
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found_in_the_data!");
                }


                $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('product', 'Product', 'trim|required');
                $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
                $this->form_validation->set_rules('back_name', 'Back Name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC', 'trim|required');
                $this->form_validation->set_rules('payment_type', 'Payment Type', 'trim|required');
                // $this->form_validation->set_message('is_unique', 'The %s is already taken');

                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "user_register/update_sponsor";
                    $page_data['get_sponsor'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();

                    $this->load->view($this->theme . '/index', $page_data);

                } else {

                    $data['full_name'] = $this->input->post('full_name');
                    $data['last_name'] = $this->input->post('last_name');
                    $data['gender'] = $this->input->post('gender');
                    $data['password'] = sha1($this->input->post('password'));
                    $data['email'] = $this->input->post('email');
                    $data['address'] = $this->input->post('address');
                    $data['position'] = $this->input->post('position');
                    $data['product'] = $this->input->post('product');
                    $data['date_of_birth'] = $this->input->post('date_of_birth');
                    $data['back_name'] = $this->input->post('back_name');
                    $data['account_no'] = $this->input->post('account_no');
                    $data['branch_name'] = $this->input->post('branch_name');
                    $data['ifsc'] = $this->input->post('ifsc_code');
                    $data['active_on'] = time();
                    $data['payment_type'] = $this->input->post('payment_type');
                    $data['created_on'] = date("Y-m-d H:i:s");

                    $this->db->where('sponsor_id', $para2);
                    $result = $this->db->update('sponsor', $data);


                    if ($result) {
                        $this->session->set_flashdata('alert', 'edit');
                        redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $para2 . '', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_edit');
                        redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $para2 . '', 'refresh');
                    }
                }
            } elseif ($para1 == "delete_sponsor") {

                $role = $this->session->userdata('role');


                if ($role == '1') {
                   
                    $get_delete_sponsor = $this->db->get_where('sponsor' , array('sponsor_id' => $para2))->row();
                    $get_invoice_sponsor = $this->db->get_where('sponsor_invoice' , array('sponsor_id' => $para2))->row();

                    $data1['sponsor_id'] = $get_delete_sponsor->sponsor_id;
                    $data1['profile_id'] = $get_delete_sponsor->profile_id;
                    $data1['username']   = $get_delete_sponsor->username;
                    $data1['full_name']  = $get_delete_sponsor->full_name;
                    $data1['last_name']  = $get_delete_sponsor->last_name;
                    $data1['gender']     = $get_delete_sponsor->gender;
                    $data1['password']   = $get_delete_sponsor->password;
                    $data1['position']      = $get_delete_sponsor->position;
                    $data1['product']      = $get_delete_sponsor->product;
                    $data1['date_of_birth']      = $get_delete_sponsor->date_of_birth;
                    $data1['mobile_no']      = $get_delete_sponsor->mobile_no;
                    $data1['back_name']      = $get_delete_sponsor->back_name;
                    $data1['account_no']      = $get_delete_sponsor->account_no;
                    $data1['branch_name']      = $get_delete_sponsor->branch_name;
                    $data1['ifsc']      = $get_delete_sponsor->ifsc;
                    $data1['address']      = $get_delete_sponsor->address;
                    $data1['is_blocked']      = $get_delete_sponsor->is_blocked;
                    $data1['sponsor_referral_id']      = $get_delete_sponsor->sponsor_referral_id;
                    $data1['sponsor_referral_profile_id']      = $get_delete_sponsor->sponsor_referral_profile_id;
                    $data1['profile_image']      = $get_delete_sponsor->profile_image;
                    $data1['payment_type']      = $get_delete_sponsor->payment_type;
                    $data1['active_on']       = $get_delete_sponsor->active_on;
                    $data1['created_on']      = $get_delete_sponsor->created_on;
                    $data1['update_on']       = $get_delete_sponsor->update_on;
                    $data1['deleted_at']       = time();

                    $this->db->insert('sponsor_delete', $data1);

                    $data2['sponsor_invoice_id'] = $get_invoice_sponsor->sponsor_invoice_id;
                    $data2['invoice_no'] = $get_invoice_sponsor->invoice_no;
                    $data2['sponsor_id'] = $get_invoice_sponsor->sponsor_id;
                    $data2['username'] = $get_invoice_sponsor->username;
                    $data2['product'] = $get_invoice_sponsor->product;
                    $data2['payment_type'] = $get_invoice_sponsor->payment_type;
                    $data2['created_at'] = $get_invoice_sponsor->created_at;
                    $data2['deleted_at']       = time();
                    $this->db->insert('sponsor_invoice_delete', $data2);

                    $this->db->where('sponsor_id', $para2);
                    $result = $this->db->delete('sponsor');

                    $this->db->where('sponsor_id', $para2);
                    $result = $this->db->delete('sponsor_invoice');


                    if ($result) {
                        $this->session->set_flashdata('alert', 'delete');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_delete');
                    }
                } else {
                    $this->session->set_flashdata('alert', 'failed_delete_role');
                }
            } elseif ($para1 == "sponsor_update_password") {
                $user_id = $this->input->post('sponsor_id');

                $new_password = sha1($this->input->post('new_password'));
                $confirm_password = sha1($this->input->post('confirm_password'));

                if ($new_password == $confirm_password) {
                    $this->db->where('sponsor_id', $user_id);
                    $this->db->update('sponsor', array('password' => $new_password));
                } else {
                    $ajax_error[] = array('ajax_error' => "<p>" . translate('new_password_does_not_matched_with_confirm_password') . "!</p>");
                    echo json_encode($ajax_error);
                }
            } elseif ($para1 == "sponsor_active") {
                $user_id = $para2;
                $is_blocked = $this->input->post('is_blocked');
                $data['is_blocked'] = $is_blocked;
                $this->db->where('sponsor_id', $para2);
                $result = $this->db->update('sponsor', $data);
                $profile_info = $this->db->get_where('sponsor' , array('sponsor_id' => $para2))->row();
             
                 $this->load->model('sms_model');
                  $message = 'Congrats & Your Account is Active By Admin To TIPSLIFE Details / MemberID '.$profile_id.' Username: ' . $profile_info->username .' Wish You Great Success By www.tipslife.in you can login ' ;    

                 $this->sms_model->send_sms_via_msg91($message,$profile_info->mobile_no);

                if ($result) {
                    $this->session->set_flashdata('alert', 'active');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                } else {
                    $this->session->set_flashdata('alert', 'failed_active');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                }
            } elseif ($para1 == "sponsor_block") {
                $user_id = $para2;
                $is_blocked = $this->input->post('is_blocked');
                $data['is_blocked'] = $is_blocked;
                $this->db->where('sponsor_id', $para2);
                $result = $this->db->update('sponsor', $data);
                 $profile_info = $this->db->get_where('sponsor' , array('sponsor_id' => $para2))->row();
             
                 $this->load->model('sms_model');
                  $message = 'Your Account is Blocked By Admin To TIPSLIFE Details / MemberID '.$profile_id.' Username: ' . $profile_info->username .' kindly Contact the Admin  ' ;    

                 $this->sms_model->send_sms_via_msg91($message,$profile_info->mobile_no);

                if ($result) {
                    $this->session->set_flashdata('alert', 'block');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                } else {
                    $this->session->set_flashdata('alert', 'failed_block');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                }
            } elseif ($para1 == "sponsor_active_home") {
                $user_id = $para2;
                $is_blocked = 'no';
                $data['is_blocked'] = $is_blocked;
                $data['active_on'] = time();
                $this->db->where('sponsor_id', $para2);
                $result = $this->db->update('sponsor', $data);
                 $profile_info = $this->db->get_where('sponsor' , array('sponsor_id' => $para2))->row();
             
                 $this->load->model('sms_model');
                  $message = 'Congrats & Your Account is Active By Admin To TIPSLIFE Details / MemberID '.$profile_id.' Username: ' . $profile_info->username .' Wish You Great Success By www.tipslife.in you can login ' ;    

                 $this->sms_model->send_sms_via_msg91($message,$profile_info->mobile_no);
                if ($result) {
                    $this->session->set_flashdata('alert', 'active');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                } else {
                    $this->session->set_flashdata('alert', 'failed_active');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                }
            } elseif ($para1 == "sponsor_block_home") {
                $user_id = $para2;
                $is_blocked = 'yes';
                $data['is_blocked'] = $is_blocked;
                $data['active_on'] = time();
                $this->db->where('sponsor_id', $para2);
                $result = $this->db->update('sponsor', $data);

                 $profile_info = $this->db->get_where('sponsor' , array('sponsor_id' => $para2))->row();
             
                 $this->load->model('sms_model');
                  $message = 'Your Account is Blocked By Admin To TIPSLIFE Details / MemberID '.$profile_id.' Username: ' . $profile_info->username .' kindly Contact the Admin  ' ;    

                 $this->sms_model->send_sms_via_msg91($message,$profile_info->mobile_no);
                if ($result) {
                    $this->session->set_flashdata('alert', 'block');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                } else {
                    $this->session->set_flashdata('alert', 'failed_block');
                    redirect(base_url() . 'home/sponsor_register/update_sponsor/' . $user_id . '', 'refresh');
                }
            } elseif ($para1 == "pending_sponsor") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "user_register/pending_sponsor";
                $page_data['peding_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'yes'))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "new_sub_sponsor") {

                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[sponsor.username]');
                $this->form_validation->set_rules('sponsor_id', 'Sponsor Id', 'trim|required');
                $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('r_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('product', 'Product', 'trim|required');
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
                    $page_data['page_file'] = "user_register/new_sub_sponsor";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                    $page_data['peding_sponsor'] = $this->db->get_where('sponsor', array('is_blocked' => 'yes'))->result();
                    $this->load->view($this->theme . '/index', $page_data);

                } else {

                    $sponsor_id = $this->input->post('sponsor_id');
                    $get_sponsor = $this->db->get_where('sponsor', array('profile_id' => $sponsor_id))->row();
                    $count_sponsor = $this->db->get_where('sponsor', array('sponsor_id' => $sponsor_id))->result();

                    if ($get_sponsor == null) {

                        $this->session->set_flashdata('alert', 'sponsor_alert');
                        redirect(base_url() . 'home/sponsor_register/all_sponsor', 'refresh');

                    } elseif (count($count_sponsor) > 27) {

                        $this->session->set_flashdata('alert', 'sponsor_count');
                        redirect(base_url() . 'home/sponsor_register/all_sponsor', 'refresh');
                        
                    } else {

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
                        $data['product'] = $this->input->post('product');
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

                        $invoice['invoice_no'] = strtoupper(rand(000000, 999999)) . $insert_id;
                        $invoice['sponsor_id'] = $insert_id;
                        $invoice['product'] = $this->input->post('product');
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
                            redirect(base_url() . 'home/sponsor_register/all_sponsor', 'refresh');
                        } else {
                            $this->session->set_flashdata('alert', 'failed_add');
                            redirect(base_url() . 'home/sponsor_register/all_sponsor', 'refresh');
                        }
                    }
                }
            }
        }
    }

    public function sponsor_overview($para1 = "", $para2 = "") {

        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {

            if ($para1 == "search") {

                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]|max_length[10]');

                if ($this->form_validation->run() == FALSE) {
                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "sponsor_overview/search";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['mobile_no'] = $this->db->get('sponsor')->result();
                    
                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('mobile_no' => $this->input->post('mobile_no')))->row();

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "sponsor_overview/search";
                    $page_data['form_contents'] = $this->input->post();

                    $this->load->view($this->theme . '/index', $page_data);
                }
            } elseif ($para1 == "profile") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_overview/profile";
                $page_data['form_contents'] = $this->input->post();

                $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "earnings") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_overview/earnings";
                $page_data['form_contents'] = $this->input->post();
                $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                $page_data['sponsor_earnings'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $para2))->result();
                $page_data['user_earnings'] = $this->db->get_where('released_income', array('sponsor_id' => $para2))->result();
                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "referrals") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_overview/referrals";
                $page_data['form_contents'] = $this->input->post();

                $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                $page_data['sponsor_referrals'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $para2))->result(); 
                $page_data['user_referrals'] = $this->db->get_where('sponsor_tree', array('referral_id' => $para2))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "ewallet") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_overview/ewallet";
                $page_data['form_contents'] = $this->input->post();

                $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                $page_data['sponsor_ewallet'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $para2))->result();
                $page_data['user_ewallet'] = $this->db->get_where('released_income', array('sponsor_id' => $para2))->result();


                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "released_income") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_overview/released_income";
                $page_data['form_contents'] = $this->input->post();

                $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                $page_data['sponsor_released_income'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $para2))->result();
                $page_data['user_released'] = $this->db->get_where('released_income', array('sponsor_id' => $para2, 'status' => 'Paid'))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "business") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_overview/business";
                $page_data['form_contents'] = $this->input->post();

                $page_data['sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                $page_data['sponsor_business'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $para2))->result();

                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function online_payment($para1 = "", $para2 = "")
    {
         
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {
            
            if ($para1 == "payments") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "online_payment/index";
                $page_data['online_payment'] = $this->db->get('package_payment')->result();
                $page_data['due_payment'] = $this->db->get_where('package_payment', array('payment_status' => 'due'))->num_rows();
                $page_data['paid_payment'] = $this->db->get_where('package_payment', array('payment_status' => 'paid'))->num_rows();
                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function payout($para1 = "", $para2 = "", $para3 = "")
    {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {

            if ($para1 == "release") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "payout/release";
                $page_data['form_contents'] = $this->input->post();
                $page_data['release_pay'] = $this->db->get('released_income')->result();
                $this->load->view($this->theme . '/index', $page_data);
                
            }elseif ($para1 == "confirm_transfer") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "payout/confirm_transfer";
                $page_data['form_contents'] = $this->input->post();
                $this->load->view($this->theme . '/index', $page_data);

            }elseif ($para1 == "payment_conf") {
                
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "payout/payment_conf";
                $page_data['form_contents'] = $this->input->post();               
                $page_data['get_sponsor'] = $this->db->get_where('sponsor' , array('sponsor_id' => $para2))->row(); 
                $page_data['release_get'] = $this->db->get_where('released_income', array('released_income_id' => $para3))->row();                   

                $this->load->view($this->theme . '/index', $page_data);

            }
        }
    }

    public function tickets($para1 = '', $para2 = '', $para3 = '', $para4 = '') {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {

            if ($para1 == "") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "tickets/show_tickets";
                $page_data['form_contents'] = $this->input->post();
                $page_data['total_tickets'] = $this->db->get('tickets')->num_rows();
                $page_data['solved_tickets'] = $this->db->get_where('tickets', array('view_at' => 1))->num_rows();
                $page_data['new_tickets'] = $this->db->get_where('tickets', array('view_at' => 0))->num_rows();
                $page_data['tickets'] = $this->db->get_where('tickets', array('view_at' => 0))->result();

                $this->load->view($this->theme . '/index', $page_data);
                # code...
            } elseif ($para1 == "view_tickets") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "tickets/view_tickets";
                $page_data['form_contents'] = $this->input->post();

                $page_data['view_tickets'] = $this->db->get_where('tickets', array('view_at' => 1))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "info_tickets") {

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

                $this->form_validation->set_rules('status', 'status', 'trim|required');
                $this->form_validation->set_rules('department', 'department', 'trim|required');
                $this->form_validation->set_rules('priority', 'priority', 'trim|required');
                $this->form_validation->set_rules('comments', 'comments', 'trim|required');

                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "tickets/info_tickets";
                    $page_data['form_contents'] = $this->input->post();

                    $page_data['info_tickets'] = $this->db->get_where('tickets', array('tickets_id' => $para2))->row();

                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $data['status'] = $this->input->post('status');
                    $data['department'] = $this->input->post('department');
                    $data['priority'] = $this->input->post('priority');
                    $data['comments'] = $this->input->post('comments');
                    $data['solved_at'] = '1';
                    $data['view_at'] = '1';
                    $data['updated_at'] = time();
                    $data['admin_id'] = $this->session->userdata('admin_id');

                    $this->db->where('tickets_id', $para2);
                    $result = $this->db->update('tickets', $data);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'home/tickets/info_tickets/' . $para2 . '', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'home/tickets/info_tickets/' . $para2 . '', 'refresh');
                    }
                }
            } elseif ($para1 == "resolved_tickets") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "tickets/resolved_tickets";
                $page_data['form_contents'] = $this->input->post();
                $page_data['resolved_tickets'] = $this->db->get_where('tickets', array('solved_at' => 1))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "category") {
                // 
                if ($para2 == "") {

                    if ($this->session->flashdata('alert') == "edit") {

                        $page_data['success_alert'] = translate("you_have_successfully_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "failed_edit") {

                        $page_data['success_alert'] = translate("you_have_not_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "delete") {

                        $page_data['danger_alert'] = translate("you_have_successfully_deleted_the_data!");
                    } elseif ($this->session->flashdata('alert') == "add") {

                        $page_data['success_alert'] = translate("you_have_successfully_updated_the_data!");
                    }

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "tickets/category";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['department'] = $this->db->get('department')->result();
                    $this->load->view($this->theme . '/index', $page_data);
                } elseif ($para2 == "edit") {

                    $this->form_validation->set_rules('name', 'Name', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {

                        $page_data['page'] = "Dashboard";
                        $page_data['title'] = "Dashboard Page || " . $this->system_title;
                        $page_data['page_file'] = "tickets/category_edit";
                        $page_data['form_contents'] = $this->input->post();
                        $page_data['department'] = $this->db->get('department')->result();
                        $page_data['get_department'] = $this->db->get_where('department', array('department_id' => $para3))->row();

                        $this->load->view($this->theme . '/index', $page_data);
                    } else {

                        $data['name'] = $this->input->post('name');

                        $this->db->where('department_id', $para3);
                        $result = $this->db->update('department', $data);

                        if ($result) {
                            $this->session->set_flashdata('alert', 'edit');
                            redirect(base_url() . 'home/tickets/category/', 'refresh');
                        } else {
                            $this->session->set_flashdata('alert', 'failed_edit');
                            redirect(base_url() . 'home/tickets/category/', 'refresh');
                        }
                    }
                } elseif ($para2 == "delete") {

                    $this->db->where('department_id', $para3);
                    $result = $this->db->delete('department');

                    if ($result) {
                        $this->session->set_flashdata('alert', 'delete');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_delete');
                    }
                } elseif ($para2 == "do_add") {

                    $this->form_validation->set_rules('name', 'name', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {

                        $page_data['page'] = "Dashboard";
                        $page_data['title'] = "Dashboard Page || " . $this->system_title;
                        $page_data['page_file'] = "tickets/category";
                        $page_data['form_contents'] = $this->input->post();
                        $page_data['department'] = $this->db->get('department')->result();
                        $this->load->view($this->theme . '/index', $page_data);
                        # code...
                    } else {

                        $data['name'] = $this->input->post('name');
                        $result = $this->db->insert('department', $data);

                        if ($result) {
                            $this->session->set_flashdata('alert', 'add');
                            redirect(base_url() . 'home/tickets/category', 'refresh');
                        } else {
                            $this->session->set_flashdata('alert', 'failed_add');
                            redirect(base_url() . 'home/tickets/category', 'refresh');
                        }
                    }
                }
            } elseif ($para1 == "configuration") {

                if ($para2 == "") {

                    if ($this->session->flashdata('alert') == "edit") {

                        $page_data['success_alert'] = translate("you_have_successfully_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "failed_edit") {

                        $page_data['success_alert'] = translate("you_have_not_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "delete") {

                        $page_data['danger_alert'] = translate("you_have_successfully_deleted_the_data!");
                    } elseif ($this->session->flashdata('alert') == "add") {

                        $page_data['success_alert'] = translate("you_have_successfully_updated_the_data!");
                    }

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "tickets/configuration";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['status'] = $this->db->get('status')->result();
                    $page_data['priority'] = $this->db->get('priority')->result();

                    $this->load->view($this->theme . '/index', $page_data);
                } elseif ($para2 == "status") {

                    if ($this->session->flashdata('alert') == "edit") {

                        $page_data['success_alert'] = translate("you_have_successfully_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "failed_edit") {

                        $page_data['success_alert'] = translate("you_have_not_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "delete") {

                        $page_data['danger_alert'] = translate("you_have_successfully_deleted_the_data!");
                    } elseif ($this->session->flashdata('alert') == "add") {

                        $page_data['success_alert'] = translate("you_have_successfully_updated_the_data!");
                    }

                    if ($para3 == "edit") {

                        $this->form_validation->set_rules('name', 'name', 'trim|required');

                        if ($this->form_validation->run() == FALSE) {

                            $page_data['page'] = "Dashboard";
                            $page_data['title'] = "Dashboard Page || " . $this->system_title;
                            $page_data['page_file'] = "tickets/configuration";
                            $page_data['form_contents'] = $this->input->post();
                            $page_data['status'] = $this->db->get('status')->result();
                            $page_data['priority'] = $this->db->get('priority')->result();
                            $page_data['get_status'] = $this->db->get_where('status', array('status_id' => $para4))->row();
                            $this->load->view($this->theme . '/index', $page_data);
                        } else {

                            $data['name'] = $this->input->post('name');

                            $this->db->where('status_id', $para4);
                            $result = $this->db->update('status', $data);

                            if ($result) {
                                $this->session->set_flashdata('alert', 'edit');
                                redirect(base_url() . 'home/tickets/configuration/status/edit/' . $para4 . '', 'refresh');
                            } else {
                                $this->session->set_flashdata('alert', 'failed_edit');
                                redirect(base_url() . 'home/tickets/configuration/status/edit/' . $para4 . '', 'refresh');
                            }
                        }
                    } elseif ($para3 == "do_add") {

                        $this->form_validation->set_rules('name', 'name', 'trim|required');

                        if ($this->form_validation->run() == FALSE) {

                            $page_data['page'] = "Dashboard";
                            $page_data['title'] = "Dashboard Page || " . $this->system_title;
                            $page_data['page_file'] = "tickets/configuration";
                            $page_data['form_contents'] = $this->input->post();
                            $page_data['status'] = $this->db->get('status')->result();
                            $page_data['priority'] = $this->db->get('priority')->result();
                            $page_data['get_status'] = $this->db->get_where('status', array('status_id' => $para4))->row();
                            $this->load->view($this->theme . '/index', $page_data);
                        } else {
                            $data['name'] = $this->input->post('name');

                            $result = $this->db->insert('status', $data);

                            if ($result) {
                                $this->session->set_flashdata('alert', 'add');
                                redirect(base_url() . 'home/tickets/configuration/', 'refresh');
                            } else {
                                $this->session->set_flashdata('alert', 'failed_add');
                                redirect(base_url() . 'home/tickets/configuration/', 'refresh');
                            }
                        }
                    } elseif ($para3 == "delete") {

                        $this->db->where('status_id', $para4);
                        $result = $this->db->delete('status');

                        if ($result) {
                            $this->session->set_flashdata('alert', 'delete');
                        } else {
                            $this->session->set_flashdata('alert', 'failed_delete');
                        }
                    }
                } elseif ($para2 == "priority") {

                    if ($this->session->flashdata('alert') == "edit") {

                        $page_data['success_alert'] = translate("you_have_successfully_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "failed_edit") {

                        $page_data['success_alert'] = translate("you_have_not_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "delete") {

                        $page_data['danger_alert'] = translate("you_have_successfully_deleted_the_data!");
                    } elseif ($this->session->flashdata('alert') == "add") {

                        $page_data['success_alert'] = translate("you_have_successfully_updated_the_data!");
                    }

                    if ($para3 == "edit_priority") {


                        $this->form_validation->set_rules('name', 'Name', 'trim|required');

                        if ($this->form_validation->run() == FALSE) {
                            $page_data['page'] = "Dashboard";
                            $page_data['title'] = "Dashboard Page || " . $this->system_title;
                            $page_data['page_file'] = "tickets/configuration";
                            $page_data['form_contents'] = $this->input->post();
                            $page_data['status'] = $this->db->get('status')->result();
                            $page_data['priority'] = $this->db->get('priority')->result();
                            $page_data['get_priority'] = $this->db->get_where('priority', array('priority_id' => $para4))->row();

                            $this->load->view($this->theme . '/index', $page_data);
                        } else {

                            $data['name'] = $this->input->post('name');

                            $this->db->where('priority_id', $para4);
                            $result = $this->db->update('priority', $data);

                            if ($result) {
                                $this->session->set_flashdata('alert', 'edit');
                                redirect(base_url() . 'home/tickets/configuration/priority/edit_priority/' . $para4 . '', 'refresh');
                            } else {
                                $this->session->set_flashdata('alert', 'failed_edit');
                                redirect(base_url() . 'home/tickets/configuration/priority/edit_priority/' . $para4 . '', 'refresh');
                            }
                        }
                    } elseif ($para3 == "do_add") {

                        $this->form_validation->set_rules('name', 'name', 'trim|required');

                        if ($this->form_validation->run() == FALSE) {

                            $page_data['page'] = "Dashboard";
                            $page_data['title'] = "Dashboard Page || " . $this->system_title;
                            $page_data['page_file'] = "tickets/configuration";
                            $page_data['form_contents'] = $this->input->post();
                            $page_data['status'] = $this->db->get('status')->result();
                            $page_data['priority'] = $this->db->get('priority')->result();
                            $page_data['get_status'] = $this->db->get_where('status', array('status_id' => $para4))->row();
                            $this->load->view($this->theme . '/index', $page_data);
                        } else {
                            $data['name'] = $this->input->post('name');

                            $result = $this->db->insert('priority', $data);

                            if ($result) {
                                $this->session->set_flashdata('alert', 'add');
                                redirect(base_url() . 'home/tickets/configuration/', 'refresh');
                            } else {
                                $this->session->set_flashdata('alert', 'failed_add');
                                redirect(base_url() . 'home/tickets/configuration/', 'refresh');
                            }
                        }
                    } elseif ($para3 == "delete") {
                        $this->db->where('priority_id', $para4);
                        $result = $this->db->delete('priority');

                        if ($result) {
                            $this->session->set_flashdata('alert', 'delete');
                        } else {
                            $this->session->set_flashdata('alert', 'failed_delete');
                        }
                    }
                }
            }
        }
    }

    public function user_invoice($para1 = '', $para2 = '') {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {

            if ($para1 == "sponsor_invoice") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "user_invoice/sponsor_invoice";
                $page_data['form_contents'] = $this->input->post();
                $page_data['all_invoice'] = $this->db->get('sponsor_invoice')->result();



                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "pdf_invoice") {


                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "user_invoice/pdf_invoice";
                $page_data['form_contents'] = $this->input->post();

                $page_data['all_invoice'] = $this->db->get('sponsor_invoice')->result();

                $this->load->view('front/user_invoice/pdf_invoice', $page_data);
                //$this->load->view('welcome_message');
                //Get output html
                // $html = $this->output->get_output();
                // $this->load->library('pdf');
                // $this->dompdf->loadHtml($html);
                // $this->dompdf->setPaper('A4', 'portrait');
                // $this->dompdf->render();
                // $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
            }
        }
    }

    public function FunctionName($count,$amount,$coms)
    {
       $Total_count_amount =  $count * $amount;
    }

    public function ewallets($para1 = "", $para2 = "")
    {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {
           
            if ($para1 == "ewallet_summary") {
                
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "Ewallet/ewallet_summary";
                $page_data['form_contents'] = $this->input->post();
                $page_data['earned_income'] = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->result();
                $page_data['earned_count'] = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->num_rows();
                $page_data['payout_release'] = $this->db->get_where('released_income', array('status' => 'Paid'))->result();


                   foreach ($page_data['earned_income'] as $key) {
                       
                        $fee = $this->Crud_model->get_type_name_by_id('package', $key->product, 'fee');
                        $commission = $this->Crud_model->get_type_name_by_id('package', $key->product, 'commission'); 
                        $page_data['credited_amount'] += $fee;
                          
                   }

                   foreach ($page_data['payout_release'] as $value) {
                       
                        $page_data['Payout'] += $value->paid_amount;

                   }
                                   

                $this->load->view($this->theme . '/index', $page_data);

            }elseif ($para1 == "all_transactions") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "Ewallet/all_transactions";
                $page_data['form_contents'] = $this->input->post();
                $page_data['all_transactions'] = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->result();

                $this->load->view($this->theme . '/index', $page_data);

            }elseif ($para1 == "outward_funds") {

                 if ($this->session->flashdata('alert') == "edit") {

                        $page_data['success_alert'] = translate("you_have_successfully_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "failed_edit") {

                        $page_data['success_alert'] = translate("you_have_not_edited_the_data!");
                    } elseif ($this->session->flashdata('alert') == "delete") {

                        $page_data['danger_alert'] = translate("you_have_successfully_deleted_the_data!");
                    } elseif ($this->session->flashdata('alert') == "add") {

                        $page_data['success_alert'] = translate("you_have_successfully_updated_the_data!");
                    }
               
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "Ewallet/outward_funds";
                $page_data['form_contents'] = $this->input->post();
                $page_data['claim_sponsor'] = $this->db->get_where('released_income', array('status' => 'Paid'))->result();

                $this->load->view($this->theme . '/index', $page_data); 

            }elseif ($para1 == "transfer_history") {
               
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "Ewallet/my_transfer_details";
                $page_data['form_contents'] = $this->input->post();
                $page_data['transfer_history'] = $this->db->get_where('released_income' , array('status' => 'Paid'))->result();

                $this->load->view($this->theme . '/index', $page_data); 

            }elseif ($para1 == "balance_report") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "Ewallet/balance_report";
                $page_data['form_contents'] = $this->input->post();
                $page_data['released_history'] = $this->db->get_where('released_income' , array('status' => 'Paid'))->result();
                $page_data['earned_income'] = $this->db->get_where('sponsor', array('is_blocked' => 'no'))->result();

                $this->load->view($this->theme . '/index', $page_data); 
            }elseif ($para1 == "conform_funds") {

                $data['claimed'] = 5;
                $data['paid'] = 1;
                $data['approved_by'] = $this->session->userdata('admin_id');
                $data['paid_date'] = time();
                $this->db->where('claim_sponsor_id', $para2);
                $result=$this->db->update('claim_sponsor', $data);
               
                if ($result) {
                    $this->session->set_flashdata('alert', 'add');
                    redirect(base_url().'home/ewallets/outward_funds', 'refresh');
                }
                else {
                    $this->session->set_flashdata('alert', 'failed_add');
                    redirect(base_url().'home/ewallets/outward_funds', 'refresh');
                }

            }

        }
    }

    public function qrcode($Qr_Code = "252525") {

        ob_end_clean();
        $this->load->library('ciqrcode');

        QRcode::png(
                $Qr_Code, $outfile = false, $level = QR_ECLEVEL_H, $size = 5, $margin = 2
        );
        // 
        // $params['data'] = '05225852';
        // $params['level'] = 'H';
        // $params['size'] = 6;
        // $params['savename'] = FCPATH.'tes.png';
        // $this->ciqrcode->generate($params);
        // echo '<img src="'.base_url().'tes.png" />';
    }

    public function barcode($code) {
        ob_end_clean();
        //load library
        $this->load->library('zend');
        //load in folder Zend
        $this->zend->load('zend/barcode');
        //generate barcode
        return Zend_Barcode::render('code128', 'image', array('text' => $code), array());
    }

    public function admins($para1 = '', $para2 = "") {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login/', 'refresh');
        } else {


            if ($para1 == 'admin_list') {

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
                } elseif ($this->session->flashdata('alert') == "sponsor_alert") {
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found!");
                } elseif ($this->session->flashdata('alert') == "sponsor_count") {
                    $page_data['info_alert'] = translate("sponsor_exit_27_members!");
                } elseif ($this->session->flashdata('alert') == "withdrawal") {
                    $page_data['info_success'] = translate("withdrawal_Wallet_success!");
                } elseif ($this->session->flashdata('alert') == "failed_withdrawal") {
                    $page_data['danger_alert'] = translate("withdrawal_Wallet_failed!");
                } elseif ($this->session->flashdata('alert') == "active") {
                    $page_data['success_alert'] = translate("you_have_successfully_activate!");
                } elseif ($this->session->flashdata('alert') == "block") {
                    $page_data['danger_alert'] = translate("admin_has_successfully_block!");
                } elseif ($this->session->flashdata('alert') == "sponsor_alert") {
                    $page_data['danger_alert'] = translate("enter_sponsor_id_not_found_in_the_data!");
                }

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "admins/admin_list";
                $page_data['form_contents'] = $this->input->post();
                //$page_data['danger_alert'] = translate("failed_to_add_the_data!");

                $this->db->where_not_in('admin_id', 1);
                $page_data['all_admins'] = $this->db->get("admin")->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == 'admin_new') {

                $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[30]');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[10]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('status', 'Status', 'trim|required');

                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "admins/admin_new";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $admin_image[] = array('admin_image' => 'default.jpg',
                        'thumb' => 'default_thumb.jpg'
                    );
                    $admin_image = json_encode($admin_image);


                    $data['name'] = $this->input->post('name');
                    $data['phone'] = $this->input->post('phone');
                    $data['email'] = $this->input->post('email');
                    $data['password'] = sha1($this->input->post('password'));
                    $data['address'] = $this->input->post('address');
                    $data['is_blocked'] = $this->input->post('status');
                    $data['admin_image'] = $admin_image;
                    $data['role'] = '12';
                    $data['timestamp'] = time();

                    $result = $this->db->insert('admin', $data);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'home/admins/admin_list', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'home/admins/admin_list', 'refresh');
                    }
                }
            } elseif ($para1 == "block") {
                $user_id = $para2;
                $is_blocked = 'yes';
                $data['is_blocked'] = $is_blocked;
                $this->db->where('admin_id', $para2);
                $result = $this->db->update('admin', $data);
                if ($result) {
                    $this->session->set_flashdata('alert', 'block');
                    redirect(base_url() . 'home/admins/admin_list/' . $user_id . '', 'refresh');
                } else {
                    $this->session->set_flashdata('alert', 'failed_active');
                    redirect(base_url() . 'home/admins/admin_list/' . $user_id . '', 'refresh');
                }
            } elseif ($para1 == "active") {
                $user_id = $para2;

                $is_blocked = 'no';
                $data['is_blocked'] = $is_blocked;
                $this->db->where('admin_id', $para2);
                $result = $this->db->update('admin', $data);

                if ($result) {
                    $this->session->set_flashdata('alert', 'active');
                    redirect(base_url() . 'home/admins/admin_list/', 'refresh');
                } else {
                    $this->session->set_flashdata('alert', 'failed_active');
                    redirect(base_url() . 'home/admins/admin_list/', 'refresh');
                }
            } elseif ($para1 == "delete") {

                $this->db->where('admin_id', $para2);
                $result = $this->db->delete('admin');

                if ($result) {
                    $this->session->set_flashdata('alert', 'delete');
                } else {
                    $this->session->set_flashdata('alert', 'failed_delete');
                }
            } elseif ($para1 == "update") {

                $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[30]');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[10]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('status', 'Status', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "admins/admin_update";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");

                    $page_data['get_admin'] = $this->db->get_where('admin', array('admin_id' => $para2))->row();

                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $data['name'] = $this->input->post('name');
                    $data['phone'] = $this->input->post('phone');
                    $data['email'] = $this->input->post('email');
                    $data['password'] = sha1($this->input->post('password'));
                    $data['address'] = $this->input->post('address');
                    $data['is_blocked'] = $this->input->post('status');


                    $this->db->where('admin_id', $para2);
                    $result = $this->db->update('admin', $data);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'home/admins/admin_list', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'home/admins/admin_list', 'refresh');
                    }
                }
            }
        }
    }

    public function helps($para1 = "", $para2 = "")
    {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {

           $page_data['title'] = "Admin || " . $this->system_title;

           if ($para1 == "request_help") {
               
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "helps/request_help";
                $page_data['form_contents'] = $this->input->post();
                $page_data['help_request'] = $this->db->get('request_help')->result();

                $this->load->view($this->theme . '/index', $page_data);

           }elseif ($para1 == "sponsor_paid") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "helps/sponsor_paid";
                $page_data['form_contents'] = $this->input->post();

                $this->load->view($this->theme . '/index', $page_data);

           }elseif ($para1 == "cancel_sponsor") {
            
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "helps/cancel_sponsor";
                $page_data['form_contents'] = $this->input->post();

                $this->load->view($this->theme . '/index', $page_data);

           }elseif ($para1 == "request_approve") {
                
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "helps/request_approve";
                $page_data['form_contents'] = $this->input->post();
                $page_data['get_sponsor_request'] = $this->db->get_where('request_help', array('request_help_id' => $this->uri->segment(4)))->row();

                $packages_id = $page_data['get_sponsor_request']->package_amount;
                $members_count = $this->db->get_where('package', array('package_id' => $packages_id))->row();
                $this->db->where_not_in('sponsor_id', $page_data['get_sponsor_request']->sponsor_id);
                $this->db->order_by("sponsor_id", "random");
                $this->db->limit($members_count->members_count);
                $page_data['select_sponsor'] = $this->db->get_where('sponsor', array('product' => $packages_id))->result();
               
                $this->load->view($this->theme . '/index', $page_data);
           }

        }
    }

    function packages($para1 = "", $para2 = "") {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {
            $page_data['title'] = "Admin || " . $this->system_title;
            if ($para1 == "") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "packages/all_packages";
                $page_data['form_contents'] = $this->input->post();
                //$page_data['danger_alert'] = translate("failed_to_add_the_data!");

                $this->db->order_by('package_id', 'desc');
                $page_data['all_plans'] = $this->db->get("package")->result();
                if ($this->session->flashdata('alert') == "edit") {
                    $page_data['success_alert'] = translate("you_have_successfully_edited_the_package!");
                } elseif ($this->session->flashdata('alert') == "add") {
                    $page_data['success_alert'] = translate("you_have_successfully_added_the_package!");
                } elseif ($this->session->flashdata('alert') == "delete") {
                    $page_data['danger_alert'] = translate("you_have_successfully_deleted_the_package!");
                } elseif ($this->session->flashdata('alert') == "failed_image") {
                    $page_data['danger_alert'] = translate("failed_to_upload_your_image._make_sure_the_image_is_JPG,_JPEG_or_PNG!");
                }

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "add_package") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "packages/add_package";
                $page_data['form_contents'] = $this->input->post();
                $page_data['danger_alert'] = translate("failed_to_add_the_data!");

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "do_add") {

                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('price', 'Price', 'trim|required');
                $this->form_validation->set_rules('members_count', 'Members Count', 'trim|required');
                $this->form_validation->set_rules('max_commission', 'Commission', 'trim|required');
                $this->form_validation->set_rules('publish', 'Publish', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "packages/add_package";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");

                    $this->load->view($this->theme . '/index', $page_data);
                } else {
                    $data['name'] = $this->input->post('name');
                    $data['fee'] = $this->input->post('price');
                    $data['members_count'] = $this->input->post('members_count');
                    $data['max_commission'] = $this->input->post('max_commission');
                    $data['commission'] = $this->input->post('max_commission');
                    $data['publish'] = $this->input->post('publish');

                    $this->db->insert('package', $data);
                    $result = $this->db->insert_id();

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'home/packages', 'refresh');
                    } else {
                        echo "Data Failed to Edit!";
                    }
                }
            } elseif ($para1 == "edit_package") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "packages/edit_package";
                $page_data['form_contents'] = $this->input->post();
                $page_data['get_package'] = $this->db->get_where("package", array("package_id" => $para2))->row();
                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "update") {

                $package_id = $para2;
                $data['name'] = $this->input->post('name');
                $data['fee'] = $this->input->post('price');
                $data['members_count'] = $this->input->post('members_count');
                $data['max_commission'] = $this->input->post('max_commission');


                $this->db->where('package_id', $package_id);
                $result = $this->db->update('package', $data);


                if ($result) {
                    $this->session->set_flashdata('alert', 'edit');
                    redirect(base_url() . 'home/packages', 'refresh');
                } else {
                    echo "Data Failed to Edit!";
                }
                exit;
            } elseif ($para1 == "delete") {
                $package_id = $para2;
                $this->db->where('package_id', $para2);
                $result = $this->db->delete('package');

                if ($result) {
                    $this->session->set_flashdata('alert', 'delete');
                    redirect(base_url() . 'home/packages', 'refresh');
                } else {
                    echo "Data Failed to Delete!";
                }
                exit;
            }
            $page_data['page_name'] = "packages";
            // $this->load->view('back/index', $page_data);
        }
    }

    public function settings($para1 = "", $para2 = "") {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {

            if ($para1 == "") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "settings/index";
                $page_data['form_contents'] = $this->input->post();
                if ($this->session->flashdata('alert') == "edit") {
                    $page_data['success_alert'] = translate("you_have_successfully_edited_the_settings!");
                }
                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "update_general_settings") {

                $data1['value'] = trim($this->input->post('system_name'));
                $this->db->where('type', 'system_name');
                $this->db->update('general_settings', $data1);

                $data2['value'] = $this->input->post('system_email');
                $this->db->where('type', 'system_email');
                $this->db->update('general_settings', $data2);

                $data3['value'] = $this->input->post('system_title');
                $this->db->where('type', 'system_title');
                $this->db->update('general_settings', $data3);

                $data4['value'] = $this->input->post('address');
                $this->db->where('type', 'address');
                $this->db->update('general_settings', $data4);

                $data5['value'] = $this->input->post('phone');
                $this->db->where('type', 'phone');
                $this->db->update('general_settings', $data5);

                $this->session->set_flashdata('alert', 'edit');

                redirect(base_url() . 'home/settings', 'refresh');
            } elseif ($para1 == "update_social_links") {
                $data1['value'] = $this->input->post('facebook');
                $this->db->where('type', 'facebook');
                $this->db->update('social_links', $data1);

                $data2['value'] = $this->input->post('google-plus');
                $this->db->where('type', 'google-plus');
                $this->db->update('social_links', $data2);

                $data3['value'] = $this->input->post('twitter');
                $this->db->where('type', 'twitter');
                $this->db->update('social_links', $data3);

                $data4['value'] = $this->input->post('pinterest');
                $this->db->where('type', 'pinterest');
                $this->db->update('social_links', $data4);

                $data5['value'] = $this->input->post('skype');
                $this->db->where('type', 'skype');
                $this->db->update('social_links', $data5);

                $data5['value'] = $this->input->post('youtube');
                $this->db->where('type', 'youtube');
                $this->db->update('social_links', $data5);

                $this->session->set_flashdata('alert', 'edit');

                redirect(base_url() . 'home/settings', 'refresh');
            } elseif ($para1 == "update_terms_and_conditions") {

                $data['value'] = $this->input->post('terms_and_conditions');
                $this->db->where('type', 'terms_conditions');
                $this->db->update('general_settings', $data);

                $this->session->set_flashdata('alert', 'edit');

                redirect(base_url() . 'home/settings', 'refresh');
            } elseif ($para1 == "update_privacy_policy") {

                $data['value'] = $this->input->post('privacy_policy');
                $this->db->where('type', 'privacy_policy');
                $this->db->update('general_settings', $data);

                $this->session->set_flashdata('alert', 'edit');

                redirect(base_url() . 'home/settings', 'refresh');
            }
        }
    }

    public function sms_settings($para1 = "") {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {
            $page_data['title'] = "Admin || " . $this->system_title;

            if ($para1 == "msg91") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sms_settings/index";
                $page_data['form_contents'] = $this->input->post();
                if ($this->session->flashdata('alert') == "edit") {
                    $page_data['success_alert'] = translate("you_have_successfully_edited_the_settings!");
                }
                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function update_sms_settings($para1 = "") {

        if ($para1 == "msg91") {
            $msg91_activation = $this->input->post('msg91_activation');
            if (isset($msg91_activation)) {
                $data1['value'] = "ok";
            } else {
                $data1['value'] = "no";
            }
            $data2['value'] = $this->input->post('authentication_key');
            $data3['value'] = $this->input->post('sender_id');
            $data6['value'] = $this->input->post('type');

            $data4['value'] = $this->input->post('country_code');
            $data5['value'] = $this->input->post('route');


            $this->db->where('type', 'msg91_status');
            $result = $this->db->update('third_party_settings', $data1);

            $this->db->where('type', 'msg91_authentication_key');
            $result = $this->db->update('third_party_settings', $data2);

            $this->db->where('type', 'msg91_sender_id');
            $result = $this->db->update('third_party_settings', $data3);

            $this->db->where('type', 'msg91_country_code');
            $result = $this->db->update('third_party_settings', $data4);

            $this->db->where('type', 'msg91_route');
            $result = $this->db->update('third_party_settings', $data5);
            $this->db->where('type', 'msg91_type');
            $result = $this->db->update('third_party_settings', $data6);

            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/sms_settings/msg91', 'refresh');
        }
    }

    public function email_setup() {
        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {
            $page_data['page'] = "Dashboard";
            $page_data['title'] = "Dashboard Page || " . $this->system_title;
            $page_data['page_file'] = "email_setup/index";
            $page_data['form_contents'] = $this->input->post();
            if ($this->session->flashdata('alert') == "edit") {
                $page_data['success_alert'] = translate("you_have_successfully_updated_the_settings!");
            } elseif ($this->session->flashdata('alert') == "failed_edit") {
                $page_data['danger_alert'] = translate("failed_to_updated_the_settings!");
            }

            $this->load->view($this->theme . '/index', $page_data);
        }
    }

    public function update_email_setup($para1 = "") {
        if ($para1 == "password_reset_email") {
            $data1['subject'] = $this->input->post('password_reset_email_sub');
            $data2['body'] = $this->input->post('password_reset_email_body');

            $this->db->where('email_template_id', 1);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 1);
            $result = $this->db->update('email_template', $data2);


            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        } elseif ($para1 == "package_purchase_email") {
            $data1['subject'] = $this->input->post('account_approval_email_sub');
            $data2['body'] = $this->input->post('account_approval_email_body');

            $this->db->where('email_template_id', 2);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 2);
            $result = $this->db->update('email_template', $data2);


            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        } elseif ($para1 == "account_opening_email") {
            $data1['subject'] = $this->input->post('account_opening_email_sub');
            $data2['body'] = $this->input->post('account_opening_email_body');

            $this->db->where('email_template_id', 4);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 4);
            $result = $this->db->update('email_template', $data2);


            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        } elseif ($para1 == "account_opening_from_admin_email") {
            $data1['subject'] = $this->input->post('account_opening_from_admin_email_sub');
            $data2['body'] = $this->input->post('account_opening_from_user_email_body');

            $this->db->where('email_template_id', 7);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 7);
            $result = $this->db->update('email_template', $data2);

            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        } elseif ($para1 == "staff_add_email") {
            $data1['subject'] = $this->input->post('staff_add_email_sub');
            $data2['body'] = $this->input->post('staff_add_email_body');

            $this->db->where('email_template_id', 5);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 5);
            $result = $this->db->update('email_template', $data2);


            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        } elseif ($para1 == "member_approval_email") {
            $data1['subject'] = $this->input->post('member_approval_email_sub');
            $data2['body'] = $this->input->post('member_approval_email_body');

            $this->db->where('email_template_id', 6);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 6);
            $result = $this->db->update('email_template', $data2);


            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        } elseif ($para1 == "member_registration_email_to_admin") {
            $data1['subject'] = $this->input->post('member_registration_email_to_admin_sub');
            $data2['body'] = $this->input->post('member_registration_email_to_admin_body');

            $this->db->where('email_template_id', 8);
            $result = $this->db->update('email_template', $data1);

            $this->db->where('email_template_id', 8);
            $result = $this->db->update('email_template', $data2);


            if ($result) {
                $this->session->set_flashdata('alert', 'edit');
            } else {
                $this->session->set_flashdata('alert', 'failed_edit');
            }
            redirect(base_url() . 'home/email_setup', 'refresh');
        }
    }

  

    public function genealogy_tree($para1 = "", $para2 = "") {

        if ($this->admin_permission() == FALSE) {
            redirect(base_url() . 'login', 'refresh');
        } else {

            if ($para1 == "tree") {
                                             
                      
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "genealogy_tree/index"; #
                $page_data['sponsor'] = (array) $this->db->get('sponsor')->first_row();


                 if ($para2 == true ) {
                    $page_data['sponsor'] = (array) $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                       $sponsor_id =  $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                       $id = $sponsor_id->sponsor_id;
                       
                  } elseif ($page_data['sponsor'] == true) {
                      $page_data['sponsor'] = (array) $this->db->get('sponsor')->first_row();
                       $id = $page_data['sponsor']['sponsor_id'];
                    
                  } 


                $getChildSponsor = $this->Crud_model->GetChildId('sponsor_tree',$id); 
                 
                  $arr = [];
                  $Total_nsv1_id[] = $id;
                  $Total_nsv2_id[] = [];
                  $Total_nsv3_id[] = [];
                  $Total_nsv4_id[] = [];
                  $Total_nsv5_id[] = [];
                  $Total_nsv6_id[] = [];
                  $Total_nsv7_id[] = [];

                 $total_net_sale_v = []; 

                 foreach ($getChildSponsor as $row) {
                     
                      $Total_nsv2_id[] = $row['sponsor_id'];
                      $level_2_loop = $this->Crud_model->GetChildId('sponsor_tree',$row['sponsor_id']);
                      $arr_level_2 = [];
                     // var_dump($level_2_loop);                                            

                     foreach ($level_2_loop as $level_2) {
                        
                        $Total_nsv3_id[] = $level_2['sponsor_id'];
                        $level_3_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_2['sponsor_id']);
                        $arr_level_3 = [];
                         //var_dump($level_3_loop);
                         //
                         //
                         foreach ($level_3_loop as $level_3) {
                            $Total_nsv4_id[] = $level_3['sponsor_id'];
                            $level_4_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_3['sponsor_id']);
                            $arr_level_4 = [];

                            //var_dump($level_4_loop);

                             foreach ($level_4_loop as $level_4) {
                                 $Total_nsv5_id[] = $level_4['sponsor_id'];
                                 $level_5_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_4['sponsor_id']);
                                 $arr_level_5 = [];

                               // var_dump($level_5_loop);

                                  foreach ($level_5_loop as $level_5) {
                                      $Total_nsv6_id[] = $level_5['sponsor_id'];
                                      $level_6_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_5['sponsor_id']);
                                      $arr_level_6 = [];

                                      //var_dump($level_6_loop);

                                       foreach ($level_6_loop as $level_6) {
                                           $Total_nsv7_id[] = $level_6['sponsor_id'];
                                           $level_7_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_6['sponsor_id']);
                                           $arr_level_7 = [];

                                           //var_dump($level_7_loop);
                                           $arr_level_6[] = [
                                            'sponsor_id' => $level_6['sponsor_id'], 'name' => $level_6['name'],
                                            'profile_id' => $level_6['profile_id'],
                                            'member_id' => $level_6['member_id'],
                                            'parent_id' => $level_6['parent_id'],
                                            'sponsor_tree_id' => $level_6['sponsor_tree_id'],
                                            'L_6' => $arr_level_7,
                                            ];
                                       }

                                       $arr_level_5[] = [
                                        'sponsor_id' => $level_5['sponsor_id'], 'name' => $level_5['name'],
                                        'profile_id' => $level_5['profile_id'],
                                        'member_id' => $level_5['member_id'],
                                        'parent_id' => $level_5['parent_id'],
                                        'sponsor_tree_id' => $level_5['sponsor_tree_id'],
                                        'L_5' => $arr_level_6,
                                        ];
                                  }

                                    $arr_level_4[] = [
                                    'sponsor_id' => $level_4['sponsor_id'], 'name' => $level_4['name'],
                                    'profile_id' => $level_4['profile_id'],
                                    'member_id' => $level_4['member_id'],
                                    'parent_id' => $level_4['parent_id'],
                                    'sponsor_tree_id' => $level_4['sponsor_tree_id'],
                                    'L_4' => $arr_level_5,
                                    ];
                             }
                           
                           $arr_level_3[] = [
                            'sponsor_id' => $level_3['sponsor_id'], 'name' => $level_3['name'],
                            'profile_id' => $level_3['profile_id'],
                            'member_id' => $level_3['member_id'],
                            'parent_id' => $level_3['parent_id'],
                            'sponsor_tree_id' => $level_3['sponsor_tree_id'],
                            'L_3' => $arr_level_4,
                            ];

                         }

                         $arr_level_2[] = [
                            'sponsor_id' => $level_2['sponsor_id'], 'name' => $level_2['name'],
                            'profile_id' => $level_2['profile_id'],
                            'member_id' => $level_2['member_id'],
                            'parent_id' => $level_2['parent_id'],
                            'sponsor_tree_id' => $level_2['sponsor_tree_id'],
                            'L_2' => $arr_level_3,
                            ];


                     } // level2

                     $arr[] = [
                            'sponsor_id' => $row['sponsor_id'], 'name' => $row['name'],
                            'profile_id' => $row['profile_id'],
                            'member_id' => $row['member_id'],
                            'parent_id' => $row['parent_id'],
                            'sponsor_tree_id' => $row['sponsor_tree_id'],
                            'L_1' => $arr_level_2,
                        ];

                     
                 }

                 
                     // echo array_sum($total_net_sale_v);
                     //  echo '<br>';
                     //  print_r($Total_nsv3_id);
                     //  echo 'Total : '.count($Total_nsv3_id);
                     //  echo '<br>';

                     //  print_r($Total_nsv4_id);
                     //  echo 'Total : '.count($Total_nsv4_id);
                     //  echo '<br>';
                     //  print_r($Total_nsv5_id);
                     //  echo 'Total : '.count($Total_nsv5_id);
                     //  echo '<br>';
                     //  print_r($Total_nsv6_id);
                     //  echo 'Total : '.count($Total_nsv6_id);
                     //  echo '<br>';
                     //  print_r($Total_nsv7_id);
                     //  echo 'Total : '.count($Total_nsv7_id);

                 // echo '<pre>'; print_r($arr);  die; 

                 $total_ids = array_merge($Total_nsv1_id, $Total_nsv2_id, $Total_nsv3_id, $Total_nsv4_id, $Total_nsv5_id, $Total_nsv6_id, $Total_nsv7_id);


                 $page_data['teamNetwork'] = count($total_ids);
                 $page_data['memberlist'] = $arr;
              

                $this->load->view($this->theme . '/index', $page_data);
            }elseif ($para1 == "tabular") {
              
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "genealogy_tree/tabular"; #
                $page_data['sponsor'] = (array) $this->db->get('sponsor')->first_row();


                 if ($para2 == true ) {
                    $page_data['sponsor'] = (array) $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                       $sponsor_id =  $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                       $id = $sponsor_id->sponsor_id;
                       
                  } elseif ($page_data['sponsor'] == true) {
                      $page_data['sponsor'] = (array) $this->db->get('sponsor')->first_row();
                       $id = $page_data['sponsor']['sponsor_id'];
                    
                  } 

                
                $getChildSponsor = $this->Crud_model->GetChildId('sponsor_tree',$id); 
                 
                  $arr = [];
                  $Total_nsv1_id[] = $id;
                  $Total_nsv2_id[] = [];
                  $Total_nsv3_id[] = [];
                  $Total_nsv4_id[] = [];
                  $Total_nsv5_id[] = [];
                  $Total_nsv6_id[] = [];
                  $Total_nsv7_id[] = [];

                 $total_net_sale_v = []; 

                 foreach ($getChildSponsor as $row) {
                     
                      $Total_nsv2_id[] = $row['sponsor_id'];
                      $level_2_loop = $this->Crud_model->GetChildId('sponsor_tree',$row['sponsor_id']);
                      $arr_level_2 = [];
                     // var_dump($level_2_loop);                                            

                     foreach ($level_2_loop as $level_2) {
                        
                        $Total_nsv3_id[] = $level_2['sponsor_id'];
                        $level_3_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_2['sponsor_id']);
                        $arr_level_3 = [];
                         //var_dump($level_3_loop);
                         //
                         //
                         foreach ($level_3_loop as $level_3) {
                            $Total_nsv4_id[] = $level_3['sponsor_id'];
                            $level_4_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_3['sponsor_id']);
                            $arr_level_4 = [];

                            //var_dump($level_4_loop);

                             foreach ($level_4_loop as $level_4) {
                                 $Total_nsv5_id[] = $level_4['sponsor_id'];
                                 $level_5_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_4['sponsor_id']);
                                 $arr_level_5 = [];

                               // var_dump($level_5_loop);

                                  foreach ($level_5_loop as $level_5) {
                                      $Total_nsv6_id[] = $level_5['sponsor_id'];
                                      $level_6_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_5['sponsor_id']);
                                      $arr_level_6 = [];

                                      //var_dump($level_6_loop);

                                       foreach ($level_6_loop as $level_6) {
                                           $Total_nsv7_id[] = $level_6['sponsor_id'];
                                           $level_7_loop = $this->Crud_model->GetChildId('sponsor_tree',$level_6['sponsor_id']);
                                           $arr_level_7 = [];

                                           //var_dump($level_7_loop);
                                           $arr_level_6[] = [
                                            'sponsor_id' => $level_6['sponsor_id'], 'name' => $level_6['name'],
                                            'profile_id' => $level_6['profile_id'],
                                            'member_id' => $level_6['member_id'],
                                            'parent_id' => $level_6['parent_id'],
                                            'sponsor_tree_id' => $level_6['sponsor_tree_id'],
                                            'L_6' => $arr_level_7,
                                            ];
                                       }

                                       $arr_level_5[] = [
                                        'sponsor_id' => $level_5['sponsor_id'], 'name' => $level_5['name'],
                                        'profile_id' => $level_5['profile_id'],
                                        'member_id' => $level_5['member_id'],
                                        'parent_id' => $level_5['parent_id'],
                                        'sponsor_tree_id' => $level_5['sponsor_tree_id'],
                                        'L_5' => $arr_level_6,
                                        ];
                                  }

                                    $arr_level_4[] = [
                                    'sponsor_id' => $level_4['sponsor_id'], 'name' => $level_4['name'],
                                    'profile_id' => $level_4['profile_id'],
                                    'member_id' => $level_4['member_id'],
                                    'parent_id' => $level_4['parent_id'],
                                    'sponsor_tree_id' => $level_4['sponsor_tree_id'],
                                    'L_4' => $arr_level_5,
                                    ];
                             }
                           
                           $arr_level_3[] = [
                            'sponsor_id' => $level_3['sponsor_id'], 'name' => $level_3['name'],
                            'profile_id' => $level_3['profile_id'],
                            'member_id' => $level_3['member_id'],
                            'parent_id' => $level_3['parent_id'],
                            'sponsor_tree_id' => $level_3['sponsor_tree_id'],
                            'L_3' => $arr_level_4,
                            ];

                         }

                         $arr_level_2[] = [
                            'sponsor_id' => $level_2['sponsor_id'], 'name' => $level_2['name'],
                            'profile_id' => $level_2['profile_id'],
                            'member_id' => $level_2['member_id'],
                            'parent_id' => $level_2['parent_id'],
                            'sponsor_tree_id' => $level_2['sponsor_tree_id'],
                            'L_2' => $arr_level_3,
                            ];


                     } // level2

                     $arr[] = [
                            'sponsor_id' => $row['sponsor_id'], 'name' => $row['name'],
                            'profile_id' => $row['profile_id'],
                            'member_id' => $row['member_id'],
                            'parent_id' => $row['parent_id'],
                            'sponsor_tree_id' => $row['sponsor_tree_id'],
                            'L_1' => $arr_level_2,
                        ];

                     
                 }

                 
                     // echo array_sum($total_net_sale_v);
                     //  echo '<br>';
                     //  print_r($Total_nsv3_id);
                     //  echo 'Total : '.count($Total_nsv3_id);
                     //  echo '<br>';

                     //  print_r($Total_nsv4_id);
                     //  echo 'Total : '.count($Total_nsv4_id);
                     //  echo '<br>';
                     //  print_r($Total_nsv5_id);
                     //  echo 'Total : '.count($Total_nsv5_id);
                     //  echo '<br>';
                     //  print_r($Total_nsv6_id);
                     //  echo 'Total : '.count($Total_nsv6_id);
                     //  echo '<br>';
                     //  print_r($Total_nsv7_id);
                     //  echo 'Total : '.count($Total_nsv7_id);

                 // echo '<pre>'; print_r($arr);  die; 

                 $total_ids = array_merge($Total_nsv1_id, $Total_nsv2_id, $Total_nsv3_id, $Total_nsv4_id, $Total_nsv5_id, $Total_nsv6_id, $Total_nsv7_id);


                 $page_data['teamNetwork'] = count($total_ids);
                 $page_data['memberlist'] = $arr;

                  $this->load->view($this->theme . '/index', $page_data);

                
            }
        }
    }

    public function display_children($parent , $level) {
        $count = 0;
       // $result = mysql_query('SELECT user_id FROM sponsers '.'WHERE parent_id="'.$parent.'"');
                   $this->db->select('sponsor_id');
                   //$this->db->from('sponsor_tree');
                   $this->db->where('parent_id', $parent);
                   //$this->db->select('SELECT sponsor_id FROM sponsor_tree WHERE parent_id=66');
                   $result = $this->db->get('sponsor_tree')->result_array(); 

               

                    foreach ($result as $row ) {
                        $var = str_repeat(' ',$level).$row['sponsor_id']."\n";

                       //echo $var  after remove comment check tree

                       // i call function in while loop until count all user_id 

                       $count += 1 +$this->display_children($row['sponsor_id'], $level+1);
                    }


        // while ($row = $result)
        // {
              
          


        //        $var = str_repeat(' ',$level).$row['sponsor_id']."\n";

                    

        //        $count += 1 +$this->display_children($row['sponsor_id'], $level+1);

        // }
        return $count;


    }

    public function invoice_template() {
        $this->load->view($this->theme . '/invoice/invoice', $page_data);
    }

    public function admin_block($para1, $para2) {
        if ($para1 == 'no') {
            $data['is_blocked'] = 'yes';
            $this->session->set_flashdata('alert', 'block');
        } elseif ($para1 == 'yes') {
            $data['is_blocked'] = 'no';
            $this->session->set_flashdata('alert', 'unblock');
        }

        $this->db->where('member_id', $para2);
        $this->db->update('member', $data);
    }

    public function sponsor_block($para1, $para2) {
        if ($para1 == 'no') {
            $data['is_blocked'] = 'yes';
            $this->session->set_flashdata('alert', 'block');
        } elseif ($para1 == 'yes') {
            $data['is_blocked'] = 'no';
            $this->session->set_flashdata('alert', 'unblock');
        }

        $this->db->where('sponsor_id', $para2);
        $this->db->update('sponsor', $data);
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
