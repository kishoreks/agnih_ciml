<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('assets/razorpay/Razorpay.php');

use Razorpay\Api\Api;

class Members extends CI_Controller {

    public function __construct() {
        parent::__construct('members');
        $this->load->library('pum');
        $this->system_name  = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        $this->system_phone = $this->Crud_model->get_type_name_by_id('general_settings', '5', 'value');
        $this->system_twitter = $this->Crud_model->get_type_name_by_id('social_links', '3', 'value');
        $this->system_facebook = $this->Crud_model->get_type_name_by_id('social_links', '1', 'value');
        $this->theme = $this->Crud_model->get_type_name_by_id('frontend_settings', '47', 'value');
    }

    // List all your items
    public function index() {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        }

        $page_data['page'] = "members Home";
        $page_data['title'] = "members Home Page || " . $this->system_title;
        $page_data['page_file'] = "home/index";
        $page_data['get_package'] = $this->db->get_where("sponsor", array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
        $page_data['get_sponsor'] = $this->db->get_where("sponsor", array('sponsor_referral_id' => $this->session->userdata('sponsor_id'), 'product' => $page_data['get_package']->product))->result();
        $page_data['package'] = $this->db->get_where('package', array('package_id' => $page_data['get_package']->product))->row();
        $this->db->order_by("tickets_id", "desc")->limit(1);
        $page_data['tickets'] = $this->db->get_where('tickets', array('sponsor_id' => $this->session->userdata('sponsor_id')))->result();
        $page_data['get_sponsor_successed'] = $this->db->get_where("sponsor", array('sponsor_referral_id' => $this->session->userdata('sponsor_id'), 'is_blocked' => 'no'))->result();
        $page_data['get_sponsor_pending'] = $this->db->get_where("sponsor", array('sponsor_referral_id' => $this->session->userdata('sponsor_id'), 'is_blocked' => 'yes'))->result();
        $page_data['all_package'] = $this->db->get("package")->result();

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function sponsor($para1 = "", $para2 = "") {


        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'all_sponsor') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor/index";
                $page_data['get_sponsor'] = $this->db->get_where("sponsor", array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
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
                }

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == 'sponsor_register') {

                $page_data['title'] = "Admin || " . $this->system_title;
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_register/index";
                $page_data['referral'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
                $page_data['count_referral'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->num_rows();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == 'add_sponsor') {

                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[sponsor.username]');
                $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('r_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_rules('product', 'Product', 'trim|required');
                $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]|max_length[10]|is_unique[sponsor.mobile_no]');
                $this->form_validation->set_rules('back_name', 'Back Name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC', 'trim|required');
                $this->form_validation->set_rules('google_pay', 'Google Pay', 'trim');
                $this->form_validation->set_rules('bhim', 'BHIM', 'trim');
                $this->form_validation->set_message('is_unique', 'The %s is already taken');

                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "sponsor_register/index";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                    $page_data['referral'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();

                    $this->load->view($this->theme . '/index', $page_data);
                } else {
                    $page_data['referral'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
                    $page_data['referral_tree'] = $this->db->get_where('sponsor', array('profile_id' => $this->input->post('referral')))->row();

                    $profile_image[] = array('profile_image' => 'default.jpg',
                        'thumb' => 'default_thumb.jpg'
                    );
                    $profile_image = json_encode($profile_image);

                    $data['sponsor_referral_id'] = $page_data['referral']->sponsor_id;
                    $data['sponsor_referral_profile_id'] = $page_data['referral']->profile_id;
                    $data['username'] = $this->input->post('username');
                    $data['full_name'] = $this->input->post('full_name');
                    $data['last_name'] = $this->input->post('last_name');
                    $data['password'] = sha1($this->input->post('password'));
                    $data['gender'] = $this->input->post('gender');
                    $data['email'] = $this->input->post('email');
                    $data['address'] = $this->input->post('address');
                    $data['position'] = $this->input->post('position');
                    $data['product'] = $this->input->post('product');
                    $data['date_of_birth'] = $this->input->post('date_of_birth');
                    $data['mobile_no'] = $this->input->post('mobile_no');
                    $data['back_name'] = $this->input->post('back_name');
                    $data['account_no'] = $this->input->post('account_no');
                    $data['branch_name'] = $this->input->post('branch_name');
                    $data['payment_type'] = $this->input->post('payments');
                    $data['ifsc'] = $this->input->post('ifsc_code');
                    $data['profile_image'] = $profile_image;
                    $data['google_pay'] = $this->input->post('google_pay');
                    $data['bhim'] = $this->input->post('bhim');
                    $data['is_blocked'] = 'yes';
                    $data['created_on'] = date("Y-m-d H:i:s");


                    $this->db->insert('sponsor', $this->security->xss_clean($data));

                    $insert_id = $this->db->insert_id();
                    $profile_id = strtoupper(substr(hash('sha512', rand()), 0, 8)) . $insert_id;

                    $this->db->where('sponsor_id', $insert_id);
                    $result = $this->db->update('sponsor', array('profile_id' => $profile_id));

                    $invoice['invoice_no'] = str_pad($insert_id, 7, "0", STR_PAD_LEFT);
                    $invoice['sponsor_id'] = $this->session->userdata('sponsor_id');
                    $invoice['product'] = $this->input->post('product');
                    $invoice['payment_type'] = $this->input->post('payments');
                    $invoice['username'] = $this->input->post('username');
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

                    $tree['member_id'] = $insert_id;
                    $tree['parent_id'] = $page_data['referral_tree']->sponsor_id;
                    $tree['sponsor_id'] = $insert_id;
                    $tree['name'] = $data['username'];
                    $tree['profile_id'] = $profile_id;
                    $tree['referral_id'] = $data['sponsor_referral_id'];

                    $this->db->insert('sponsor_tree', $tree);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'members/sponsor/all_sponsor', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'members/sponsor/all_sponsor', 'refresh');
                    }
                }
            } elseif ($para1 == 'update_sponsor') {


                $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('r_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('product', 'Product', 'trim|required');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|is_unique[sponsor.mobile_no]');
                $this->form_validation->set_rules('back_name', 'Back Name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "sponsor_register/update_sponsor";
                    $page_data['form_contents'] = $this->input->post();
                    $page_data['danger_alert'] = translate("failed_to_add_the_data!");
                    $page_data['referral'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
                    $page_data['sponsor_get'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();
                    $this->load->view($this->theme . '/index', $page_data);
                } else {
                    $data['full_name'] = $this->input->post('full_name');
                    $data['last_name'] = $this->input->post('last_name');
                    $data['password'] = sha1($this->input->post('password'));
                    $data['email'] = $this->input->post('email');
                    $data['address'] = $this->input->post('address');
                    $data['position'] = $this->input->post('position');
                    $data['product'] = $this->input->post('product');
                    $data['date_of_birth'] = $this->input->post('date_of_birth');
                    $data['gender'] = $this->input->post('gender');
                    $data['mobile_no'] = $this->input->post('mobile_no');
                    $data['back_name'] = $this->input->post('back_name');
                    $data['account_no'] = $this->input->post('account_no');
                    $data['branch_name'] = $this->input->post('branch_name');
                    $data['ifsc'] = $this->input->post('ifsc_code');

                    $this->db->where('sponsor_id', $para2);
                    $result = $this->db->update('sponsor', $data);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'edit');
                        redirect(base_url() . 'members/sponsor/all_sponsor', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_edit');
                        redirect(base_url() . 'members/sponsor/all_sponsor', 'refresh');
                    }
                }
            } elseif ($para1 == 'search') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "sponsor_register/search";
                $page_data['form_contents'] = $this->input->post();
                $page_data['search_result'] = $this->db->get_where('sponsor', array('mobile_no' => trim($this->input->post('search')), 'sponsor_referral_id' => $this->session->userdata('sponsor_id')))->row();

                if ($page_data['search_result'] == NULL) {
                    redirect(base_url() . 'members/', 'refresh');
                }

                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function claim_sponsor($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'eligible_claim') {

                if ($this->session->flashdata('alert') == "add") {
                    $page_data['success_alert'] = translate("you_have_successfully_claim_the_data!");
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
                $page_data['page_file'] = "claim_sponsor/eligible_claim";
                $page_data['get_package'] = $this->db->get_where("sponsor", array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
                $page_data['get_sponsor'] = $this->db->get_where("sponsor", array('sponsor_referral_id' => $this->session->userdata('sponsor_id'), 'product' => $page_data['get_package']->product))->result();

                $page_data['package'] = $this->db->get_where('package', array('package_id' => $page_data['get_package']->product))->row();
                $page_data['all_package'] = $this->db->get("package")->result();

                $page_data['claim_sponsor'] = $this->db->get_where('claim_sponsor', array('sponsor_id' => $page_data['get_package']->sponsor_id, 'package' => $page_data['get_package']->product, 'claimed' => 1))->row();
                $page_data['all_claim'] = $this->db->get_where('claim_sponsor', array('sponsor_id' => $page_data['get_package']->sponsor_id))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "claim_now") {

                $this->form_validation->set_rules('sponsor_id', 'sponsor_id', 'trim|required');
                $this->form_validation->set_rules('package', 'package', 'trim|required');
                $this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
                $this->form_validation->set_rules('bank_name', 'bank_name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'account_no', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'ifsc_code', 'trim|required');
                $this->form_validation->set_rules('amount', 'amount', 'trim|required');

                if ($this->form_validation->run() == FALSE) {

                    redirect(base_url() . 'claim_sponsor/eligible_claim', 'refresh');
                } else {

                    $data['sponsor_id'] = $this->input->post('sponsor_id');
                    $data['package'] = $this->input->post('package');
                    $data['created_at'] = $this->input->post('created_at');
                    $data['bank_name'] = $this->input->post('bank_name');
                    $data['account_no'] = $this->input->post('account_no');
                    $data['ifsc_code'] = $this->input->post('ifsc_code');
                    $data['approved_by'] = 'Pending';
                    $data['amount'] = $this->input->post('amount');


                    $result = $this->db->insert('claim_sponsor', $data);

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'members/claim_sponsor/eligible_claim', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'members/claim_sponsor/eligible_claim', 'refresh');
                    }
                }
            }
        }
    }

    public function genealogy($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'genealogy_tree') {

                // var_dump($this->db->get_where('sponsor_tree' , array('sponsor_tree_id >' => 1))->num_rows());
                // die();
                // 
                // $this->db->select('sponsor_id,username,sponsor_referral_id');
                // $query = $this->db->get('sponsor')->result();
                // var_dump($query);
                // die();
                // $id = $this->session->userdata('sponsor_id');

                if ($para2 == true) {
                    $id = $para2;
                } elseif ($this->session->userdata('sponsor_id') == true) {
                    echo $id = $this->session->userdata('sponsor_id');
                }

                $id = $this->session->userdata('sponsor_id');

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "genealogy/genealogy_tree";
                $page_data['sponsor'] = $this->db->get_where('sponsor', array('sponsor_id' => $id))->row_array();
                $getChildSponsor = $this->Crud_model->GetChildId('sponsor_tree', $id);

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
                    $level_2_loop = $this->Crud_model->GetChildId('sponsor_tree', $row['sponsor_id']);
                    $arr_level_2 = [];
                    // var_dump($level_2_loop);                                            

                    foreach ($level_2_loop as $level_2) {

                        $Total_nsv3_id[] = $level_2['sponsor_id'];
                        $level_3_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_2['sponsor_id']);
                        $arr_level_3 = [];
                        //var_dump($level_3_loop);
                        //
                         //
                         foreach ($level_3_loop as $level_3) {
                            $Total_nsv4_id[] = $level_3['sponsor_id'];
                            $level_4_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_3['sponsor_id']);
                            $arr_level_4 = [];

                            //var_dump($level_4_loop);

                            foreach ($level_4_loop as $level_4) {
                                $Total_nsv5_id[] = $level_4['sponsor_id'];
                                $level_5_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_4['sponsor_id']);
                                $arr_level_5 = [];

                                // var_dump($level_5_loop);

                                foreach ($level_5_loop as $level_5) {
                                    $Total_nsv6_id[] = $level_5['sponsor_id'];
                                    $level_6_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_5['sponsor_id']);
                                    $arr_level_6 = [];

                                    //var_dump($level_6_loop);

                                    foreach ($level_6_loop as $level_6) {
                                        $Total_nsv7_id[] = $level_6['sponsor_id'];
                                        $level_7_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_6['sponsor_id']);
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

    public function plans($para1 = "", $para2 = "")
    {
       
       if ($this->member_permission() == FALSE) {
            redirect(base_url() . 'members_login/', 'refresh');
        } else {
            
            if ($para1 == "payment") {
                
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "plans/index";
                $page_data['pum_sponsor'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->uri->segment(4)))->row();
                               
                $this->load->view($this->theme . '/index', $page_data);

            }elseif ($para1 == "pum") {
                               
                $sponsor_id = $this->session->userdata('sponsor_id');
                $member_id = $this->input->post('member_id');
                $plan_id = $this->input->post('plan_id');
                $amount = $this->db->get_where('package', array('package_id' => $plan_id))->row()->fee;
                $package_name = $this->db->get_where('package', array('package_id' => $plan_id))->row()->name;
                $member_name = $this->db->get_where('sponsor', array('sponsor_id' => $member_id))->row()->full_name;
                $member_email = $this->db->get_where('sponsor', array('sponsor_id' => $member_id))->row()->email;
                $member_phone = $this->db->get_where('sponsor', array('sponsor_id' => $member_id))->row()->mobile_no;

                $data['plan_id']            = $plan_id;
                $data['member_id']          = $member_id;
                $data['sponsor_id']         = $sponsor_id;
                $data['payment_type']       = 'payUMoney';
                $data['payment_status']     = 'due';
                $data['payment_details']    = 'none';
                $data['amount']             = $amount;
                $data['purchase_datetime']  = time();

                $pum_merchant_key = $this->Crud_model->get_settings_value('business_settings', 'pum_merchant_key', 'value');
                $pum_merchant_salt = $this->Crud_model->get_settings_value('business_settings', 'pum_merchant_salt', 'value');

                $this->db->insert('package_payment', $data);
                $payment_id = $this->db->insert_id();

                $data['payment_code'] = date('Ym', $data['purchase_datetime']) . $payment_id;

                $this->session->set_userdata('payment_id', $payment_id);

                /****TRANSFERRING USER TO PAYPAL TERMINAL****/
                $this->pum->add_field('key', $pum_merchant_key);
                $this->pum->add_field('txnid',substr(hash('sha256', mt_rand() . microtime()), 0, 20));
                $this->pum->add_field('amount', $amount);
                $this->pum->add_field('firstname', $member_name);
                $this->pum->add_field('email', $member_email);
                $this->pum->add_field('phone', $member_phone);
                $this->pum->add_field('productinfo', 'Package Purchage : '.$package_name);
                $this->pum->add_field('service_provider', 'payu_paisa');
                $this->pum->add_field('udf1', $payment_id);

                $this->pum->add_field('surl', base_url().'members/pum_success');
                $this->pum->add_field('furl', base_url().'members/pum_failure');

                // submit the fields to pum
                $this->pum->submit_pum_post();
                 
            }

        }

    }

    public function pum_success() {
        $status = $_POST["status"];
        $firstname = $_POST["firstname"];
        $amount = $_POST["amount"];
        $txnid = $_POST["txnid"];
        $posted_hash = $_POST["hash"];
        $key = $_POST["key"];
        $productinfo = $_POST["productinfo"];
        $email = $_POST["email"];
        $udf1 = $_POST['udf1'];
        $salt = $this->Crud_model->get_settings_value('business_settings', 'pum_merchant_salt', 'value');

        if (isset($_POST["additionalCharges"])) {
            $additionalCharges = $_POST["additionalCharges"];
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||' . $udf1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
            $retHashSeq = $salt . '|' . $status . '||||||||||' . $udf1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            $payment_id = $this->session->userdata('payment_id');
            $this->db->where('package_payment_id', $payment_id);
            $this->db->delete('package_payment');
            // recache();
            $this->session->set_userdata('payment_id', '');
            $this->session->set_flashdata('alert', 'pum_fail');
            redirect(base_url() . 'members/sponsor/all_sponsor', 'refresh');
        } else {
            $payment_id = $_POST['udf1'];
            $payment = $this->db->get_where('package_payment', array('package_payment_id' => $payment_id))->row();
            $data['payment_details'] = json_encode($_POST);
            $data['purchase_datetime'] = time();
            $data['payment_code'] = date('Ym', $data['purchase_datetime']) . $payment_id;
            $data['payment_timestamp'] = time();
            $data['payment_type'] = 'PayUMoney';
            $data['payment_status'] = 'paid';
            $data['expire'] = 'no';
            $this->db->where('package_payment_id', $payment_id);
            $this->db->update('package_payment', $data);

            $prev_sponsor_id = $this->db->get_where('sponsor', array('sponsor_id' => $payment->sponsor_id))->row()->sponsor_id;
            $prev_is_blocked = $this->db->get_where('sponsor', array('sponsor_id' => $payment->sponsor_id))->row()->is_blocked;
            

            $data1['membership'] = 2;
            $data1['express_interest'] = $prev_express_interest + $this->db->get_where('plan', array('plan_id' => $payment->plan_id))->row()->express_interest;
            $data1['direct_messages'] = $prev_direct_messages + $this->db->get_where('plan', array('plan_id' => $payment->plan_id))->row()->direct_messages;
            $data1['photo_gallery'] = $prev_photo_gallery + $this->db->get_where('plan', array('plan_id' => $payment->plan_id))->row()->photo_gallery;

            $package_info[] = array('current_package' => $this->Crud_model->get_type_name_by_id('plan', $payment->plan_id),
                'package_price' => $this->Crud_model->get_type_name_by_id('plan', $payment->plan_id, 'amount'),
                'payment_type' => $data['payment_type'],
            );
            $data1['package_info'] = json_encode($package_info);

            $this->db->where('sponsor_id', $payment->sponsor_id);
            $this->db->update('sponsor', $data1);
            // recache();

            if ($this->Email_model->subscruption_email('sponsor', $payment->sponsor_id, $payment->plan_id)) {
                //echo 'email_sent';
            } else {
                //echo 'email_not_sent';
                $this->session->set_flashdata('alert', 'not_sent');
            }
            $this->session->set_flashdata('alert', 'pum_success');
            redirect(base_url() . 'members/invoice/sponsor_invoice/' . $this->session->userdata('payment_id'), 'refresh');
            $this->session->set_userdata('payment_id', '');
        }
    }

    /* FUNCTION: Verify paypal payment by IPN */

    public function pum_failure() {
        $payment_id = $this->session->userdata('payment_id');
        $this->db->where('package_payment_id', $payment_id);
        $this->db->delete('package_payment');
        // recache();
        $this->session->set_userdata('payment_id', '');
        $this->session->set_flashdata('alert', 'pum_fail');
        redirect(base_url() . 'members/sponsor/all_sponsor', 'refresh');
    }

    public function tabular($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'select_tree') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "tabular/select_tree";
                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function earned_income($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'sponsor_income') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "earned_income/sponsor_income";
                $page_data['form_contents'] = $this->input->post();
                $page_data['earned_income'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'is_blocked' => 'no'))->row();
                // $page_data['package'] = $this->db->get_where('package', array('package_id' => $page_data['earned_income'][0]->product))->row();
                // 
                // var_dump($page_data['earned_income']['sponsor_id']);
                $income = $this->db->get_where('sponsor', array('sponsor_id >' => $this->session->userdata('sponsor_id')))->result_array();


                $getdownLink = $this->Crud_model->GetChildId('sponsor_tree', $page_data['earned_income']->sponsor_id);

                $arr = [];
                $Total_nsv1_id[] = $page_data['earned_income']->sponsor_id;
                $Total_nsv2_id[] = [];
                $Total_nsv3_id[] = [];
                $Total_nsv4_id[] = [];
                $Total_nsv5_id[] = [];
                $Total_nsv6_id[] = [];
                $Total_nsv7_id[] = [];
                $Total_nsv8_id[] = [];

                $total_net_sale_v = [];

                foreach ($getdownLink as $row) {

                    $Total_nsv2_id[] = $row['sponsor_id'];
                    $level_2_loop = $this->Crud_model->GetChildId('sponsor_tree', $row['sponsor_id']);
                    $arr_level_2 = [];
                    // var_dump($level_2_loop);                                            

                    foreach ($level_2_loop as $level_2) {

                        $Total_nsv3_id[] = $level_2['sponsor_id'];
                        $level_3_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_2['sponsor_id']);
                        $arr_level_3 = [];
                        //var_dump($level_3_loop);
                        //
                         //
                         foreach ($level_3_loop as $level_3) {
                            $Total_nsv4_id[] = $level_3['sponsor_id'];
                            $level_4_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_3['sponsor_id']);
                            $arr_level_4 = [];

                            //var_dump($level_4_loop);

                            foreach ($level_4_loop as $level_4) {
                                $Total_nsv5_id[] = $level_4['sponsor_id'];
                                $level_5_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_4['sponsor_id']);
                                $arr_level_5 = [];

                                // var_dump($level_5_loop);

                                foreach ($level_5_loop as $level_5) {
                                    $Total_nsv6_id[] = $level_5['sponsor_id'];
                                    $level_6_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_5['sponsor_id']);
                                    $arr_level_6 = [];

                                    //var_dump($level_6_loop);

                                    foreach ($level_6_loop as $level_6) {
                                        $Total_nsv7_id[] = $level_6['sponsor_id'];
                                        $level_7_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_6['sponsor_id']);
                                        $arr_level_7 = [];

                                        foreach ($level_7_loop as $level_7) {

                                            $Total_nsv8_id[] = $level_7['sponsor_id'];
                                            $level_8_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_7['sponsor_id']);
                                            $arr_level_8 = [];


                                            foreach ($level_8_loop as $level_8) {

                                                $Total_nsv8_id[] = $level_8['sponsor_id'];
                                                $level_8_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_8['sponsor_id']);
                                                $arr_level_9 = [];

                                                //var_dump($level_7_loop);
                                                $arr_level_8[] = [
                                                    'sponsor_id' => $level_8['sponsor_id'], 'name' => $level_8['name'],
                                                    'profile_id' => $level_8['profile_id'],
                                                    'member_id' => $level_8['member_id'],
                                                    'parent_id' => $level_8['parent_id'],
                                                    'sponsor_tree_id' => $level_8['sponsor_tree_id'],
                                                    'L_8' => $arr_level_9,
                                                ];
                                            }


                                            //var_dump($level_7_loop);
                                            $arr_level_7[] = [
                                                'sponsor_id' => $level_7['sponsor_id'], 'name' => $level_7['name'],
                                                'profile_id' => $level_7['profile_id'],
                                                'member_id' => $level_7['member_id'],
                                                'parent_id' => $level_7['parent_id'],
                                                'sponsor_tree_id' => $level_7['sponsor_tree_id'],
                                                'L_7' => $arr_level_8,
                                            ];
                                        }

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

                //var_dump($arr);



                $total_ids = array_merge($Total_nsv1_id, $Total_nsv2_id, $Total_nsv3_id, $Total_nsv4_id, $Total_nsv5_id, $Total_nsv6_id, $Total_nsv7_id, $Total_nsv8_id);


                $page_data['teamNetwork'] = count($total_ids);
                $page_data['downlist'] = $arr;
                $page_data['Slevel_1'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->num_rows();

                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function loop_fun() {

        // $page_data['Slevel_1'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id') ))->num_rows();
    }

    public function released_income($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'sponsor_released') {

                if ($this->session->flashdata('alert') == "add") {
                    $page_data['success_alert'] = translate("you_have_successfully_added_the_received_amount_!");
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
                $page_data['page_file'] = "released_income/sponsor_released";
                $page_data['form_contents'] = $this->input->post();
                $page_data['claim_sponsor'] = $this->db->get_where('claim_sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->result();
                $page_data['released_income'] = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id')))->result();

                $earned_income = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'is_blocked' => 'no'))->row();
                // $page_data['package'] = $this->db->get_where('package', array('package_id' => $page_data['earned_income'][0]->product))->row();
                // 
                // var_dump($page_data['earned_income']['sponsor_id']);
                $income = $this->db->get_where('sponsor', array('sponsor_id >' => $this->session->userdata('sponsor_id')))->result_array();


                $getdownLink = $this->Crud_model->GetChildId('sponsor_tree', $earned_income->sponsor_id);

                $arr = [];
                $Total_nsv1_id[] = $earned_income->sponsor_id;
                $Total_nsv2_id[] = [];
                $Total_nsv3_id[] = [];
                $Total_nsv4_id[] = [];
                $Total_nsv5_id[] = [];
                $Total_nsv6_id[] = [];
                $Total_nsv7_id[] = [];
                $Total_nsv8_id[] = [];

                $total_net_sale_v = [];

                foreach ($getdownLink as $row) {

                    $Total_nsv2_id[] = $row['sponsor_id'];
                    $level_2_loop = $this->Crud_model->GetChildId('sponsor_tree', $row['sponsor_id']);
                    $arr_level_2 = [];
                    // var_dump($level_2_loop);                                            

                    foreach ($level_2_loop as $level_2) {

                        $Total_nsv3_id[] = $level_2['sponsor_id'];
                        $level_3_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_2['sponsor_id']);
                        $arr_level_3 = [];
                        //var_dump($level_3_loop);
                        //
                         //
                         foreach ($level_3_loop as $level_3) {
                            $Total_nsv4_id[] = $level_3['sponsor_id'];
                            $level_4_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_3['sponsor_id']);
                            $arr_level_4 = [];

                            //var_dump($level_4_loop);

                            foreach ($level_4_loop as $level_4) {
                                $Total_nsv5_id[] = $level_4['sponsor_id'];
                                $level_5_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_4['sponsor_id']);
                                $arr_level_5 = [];

                                // var_dump($level_5_loop);

                                foreach ($level_5_loop as $level_5) {
                                    $Total_nsv6_id[] = $level_5['sponsor_id'];
                                    $level_6_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_5['sponsor_id']);
                                    $arr_level_6 = [];

                                    //var_dump($level_6_loop);

                                    foreach ($level_6_loop as $level_6) {
                                        $Total_nsv7_id[] = $level_6['sponsor_id'];
                                        $level_7_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_6['sponsor_id']);
                                        $arr_level_7 = [];

                                        foreach ($level_7_loop as $level_7) {

                                            $Total_nsv8_id[] = $level_7['sponsor_id'];
                                            $level_8_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_7['sponsor_id']);
                                            $arr_level_8 = [];


                                            foreach ($level_8_loop as $level_8) {

                                                $Total_nsv8_id[] = $level_8['sponsor_id'];
                                                $level_8_loop = $this->Crud_model->GetChildId('sponsor_tree', $level_8['sponsor_id']);
                                                $arr_level_9 = [];

                                                //var_dump($level_7_loop);
                                                $arr_level_8[] = [
                                                    'sponsor_id' => $level_8['sponsor_id'], 'name' => $level_8['name'],
                                                    'profile_id' => $level_8['profile_id'],
                                                    'member_id' => $level_8['member_id'],
                                                    'parent_id' => $level_8['parent_id'],
                                                    'sponsor_tree_id' => $level_8['sponsor_tree_id'],
                                                    'L_8' => $arr_level_9,
                                                ];
                                            }


                                            //var_dump($level_7_loop);
                                            $arr_level_7[] = [
                                                'sponsor_id' => $level_7['sponsor_id'], 'name' => $level_7['name'],
                                                'profile_id' => $level_7['profile_id'],
                                                'member_id' => $level_7['member_id'],
                                                'parent_id' => $level_7['parent_id'],
                                                'sponsor_tree_id' => $level_7['sponsor_tree_id'],
                                                'L_7' => $arr_level_8,
                                            ];
                                        }

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



                $total_ids = array_merge($Total_nsv1_id, $Total_nsv2_id, $Total_nsv3_id, $Total_nsv4_id, $Total_nsv5_id, $Total_nsv6_id, $Total_nsv7_id, $Total_nsv8_id);


                $teamNetwork = count($total_ids);
                $page_data['downlist'] = $arr;

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == 'sponsor_released_pay') {


                $this->form_validation->set_rules('paid_amount', 'paid_amount', 'trim|required');
                $this->form_validation->set_rules('level', 'level', 'trim|required');


                if ($this->form_validation->run() == FALSE) {

                    redirect(bse_url() . 'members/released_income/sponsor_released', 'refresh');
                } else {

                    $data['sponsor_id'] = $this->session->userdata('sponsor_id');
                    $data['paid_amount'] = (int) $this->input->post('paid_amount');
                    $data['level'] = $this->input->post('level');
                    $data['paid_date'] = time();
                    $data['status'] = 'Open';

                    $result = $this->db->insert('released_income', $data);

                    $insert_id = $this->db->insert_id();

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'members/released_income/sponsor_released', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'members/released_income/sponsor_released', 'refresh');
                    }
                }
            }
        }
    }

    public function balance_sheet($para1 = "", $para2 = "") {
        if ($this->member_permission() == FALSE) {
            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "balance") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "balance_sheet/balance";
                $page_data['claim_sponsor'] = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'status' => 'Paid'))->result();
                $page_data['earned_income'] = $this->db->get_where('released_income', array('sponsor_id' => $this->session->userdata('sponsor_id')))->result();
                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function payments($para1="", $para2="")
    {
        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "payments_success") {
                
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "payments/payments_success";
                $page_data['form_contents'] = $this->input->post();
                $page_data['payments'] = $this->db->get_where('package_payment' , array('sponsor_id' => $this->session->userdata('sponsor_id')))->result();

                $this->load->view($this->theme . '/index', $page_data);

            }
        }
    }

    public function help($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'sent_donation') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help/send_help";
                $page_data['form_contents'] = $this->input->post();
                // $page_data['earned_income'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
                // $page_data['package'] = $this->db->get_where('package' , array('package_id' => $page_data['earned_income'][0]->product))->row(); 

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "received_donation") {

                if ($this->session->flashdata('alert') == "add") {
                    $page_data['success_alert'] = translate("you_have_successfully_added_the_received_donation_!");
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
                $page_data['page_file'] = "help/get_help";
                $page_data['form_contents'] = $this->input->post();

                $page_data['get_sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
                $page_data['package_info'] = $this->db->get_where('package', array('package_id <' => $page_data['get_sponsor_info']->product))->previous_row();


                $page_data['donation_make'] = $this->db->get_where('request_help', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'package_amount <' => $page_data['get_sponsor_info']->product))->row();


                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "make_request") {

                $page_data['get_sponsor_info'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();
                $page_data['package_info'] = $this->db->get_where('package', array('package_id <' => $page_data['get_sponsor_info']->product))->previous_row();

                if ($page_data['package_info'] != NULL) {

                    $startTime = date("Y-m-d H:i:s");
                    $time_duration = date('Y-m-d H:i:s ', strtotime('+48 hour +30 minutes +45 seconds', strtotime($startTime)));

                    $data['sponsor_id'] = $this->session->userdata('sponsor_id');
                    $data['request_on'] = time();
                    $data['package_amount'] = $page_data['package_info']->package_id;
                    $data['time_duration'] = strtotime($time_duration);

                    $result = $this->db->insert('request_help', $data);

                    $insert_id = $this->db->insert_id();

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'members/help/received_donation', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'members/help/received_donation', 'refresh');
                    }
                }
            } elseif ($para1 == "received_all_donation") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help/received_help";

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "missed_donation") {
                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "help/missed_donation";

                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function history($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'send_history') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "history/send_history";
                $page_data['form_contents'] = $this->input->post();
                // $page_data['earned_income'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
                // $page_data['package'] = $this->db->get_where('package' , array('package_id' => $page_data['earned_income'][0]->product))->row(); 

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "get_history") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "history/get_history";
                $page_data['form_contents'] = $this->input->post();
                // $page_data['earned_income'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
                // $page_data['package'] = $this->db->get_where('package' , array('package_id' => $page_data['earned_income'][0]->product))->row(); 

                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function account_settings($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == 'profile') {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "account_settings/profile";
                $page_data['form_contents'] = $this->input->post();
                $page_data['earned_income'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
                $page_data['package'] = $this->db->get_where('package', array('package_id' => $page_data['earned_income'][0]->product))->row();
                $page_data['get_profile'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();

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

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "update_profile") {


                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[sponsor.username]');
                $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('position', 'Position', 'trim|required');
                $this->form_validation->set_rules('product', 'Product', 'trim|required');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
                $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|max_length[10]|is_unique[sponsor.mobile_no]');
                $this->form_validation->set_rules('back_name', 'Back Name', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC', 'trim|required');
                $this->form_validation->set_message('is_unique', 'The %s is already taken');


                if ($this->form_validation->run() == FALSE) {

                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "account_settings/profile";

                    $page_data['earned_income'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
                    $page_data['package'] = $this->db->get_where('package', array('package_id' => $page_data['earned_income'][0]->product))->row();
                    $page_data['get_profile'] = $this->db->get_where('sponsor', array('sponsor_id' => $this->session->userdata('sponsor_id')))->row();

                    $page_data['form_contents'] = $this->input->post();

                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $profile_image[] = array('profile_image' => 'default.jpg',
                        'thumb' => 'default_thumb.jpg'
                    );
                    $profile_image = json_encode($profile_image);

                    $data['username'] = $this->input->post('username');
                    $data['full_name'] = $this->input->post('full_name');
                    $data['last_name'] = $this->input->post('last_name');
                    $data['email'] = $this->input->post('email');
                    $data['address'] = $this->input->post('address');
                    $data['position'] = $this->input->post('position');
                    $data['product'] = $this->input->post('product');
                    $data['date_of_birth'] = $this->input->post('date_of_birth');
                    $data['mobile_no'] = $this->input->post('mobile_no');
                    $data['gender'] = $this->input->post('gender');
                    $data['back_name'] = $this->input->post('back_name');
                    $data['account_no'] = $this->input->post('account_no');
                    $data['branch_name'] = $this->input->post('branch_name');
                    $data['ifsc'] = $this->input->post('ifsc_code');
                    $data['profile_image'] = $profile_image;
                    $data['update_on'] = date("Y-m-d H:i:s");

                    $this->db->where('sponsor_id', $this->session->userdata('sponsor_id'));
                    $result = $this->db->update('sponsor', $data);



                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'members/account_settings/profile', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'members/account_settings/profile', 'refresh');
                    }
                }
            } elseif ($para1 == "upload_profile") {

                if ($_FILES['profile_image']['name'] !== '') {
                    $id = $this->session->userdata('sponsor_id');
                    $path = $_FILES['profile_image']['name'];
                    $ext = '.' . pathinfo($path, PATHINFO_EXTENSION);
                    if ($ext == ".jpg" || $ext == ".JPG" || $ext == ".jpeg" || $ext == ".JPEG" || $ext == ".png" || $ext == ".PNG") {
                        $this->Crud_model->file_up("profile_image", "profile", $id, '', '', $ext);
                        $images[] = array('profile_image' => 'profile_' . $id . $ext, 'thumb' => 'profile_' . $id . '_thumb' . $ext);
                        $data['profile_image'] = json_encode($images);

                        $this->db->where('sponsor_id', $this->session->userdata('sponsor_id'));
                        $result = $this->db->update('sponsor', $data);

                        $this->session->set_flashdata('alert', 'edit_image');
                        redirect(base_url() . 'members/account_settings/profile', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed');
                        redirect(base_url() . 'members/account_settings/profile', 'refresh');
                    }
                }
            } elseif ($para1 == "change_password") {

                $user_id = $this->session->userdata('sponsor_id');
                $current_password = sha1($this->input->post('current_password'));
                $new_password = sha1($this->input->post('new_password'));
                $confirm_password = sha1($this->input->post('confirm_password'));
                $prev_password = $this->db->get_where('sponsor', array('sponsor_id' => $user_id))->row()->password;
                if ($prev_password == $current_password) {
                    if ($new_password == $current_password) {
                        $ajax_error[] = array('ajax_error' => "<p>" . translate('new_password_and_current_password_are_same') . "!</p>");
                        echo json_encode($ajax_error);
                    }
                    if ($new_password == $confirm_password) {
                        $this->db->where('sponsor_id', $user_id);
                        $this->db->update('sponsor', array('password' => $new_password));
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

    private function get_curl_handle($payment_id, $amount) {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/ca-bundle.crt');
        return $ch;
    }

    public function razorpay($para1 = "", $para2 = "") {

        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "") {

                if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
                    $razorpay_payment_id = $this->input->post('razorpay_payment_id');
                    $merchant_order_id = $this->input->post('merchant_order_id');
                    $currency_code = RAZOR_CURRENCY;
                    $amount = $this->input->post('merchant_total');
                    $success = false;
                    $error = '';
                    try {
                        $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                        //execute post
                        $result = curl_exec($ch);
                        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        if ($result === false) {
                            $success = false;
                            $error = 'Curl error: ' . curl_error($ch);
                        } else {
                            $response_array = json_decode($result, true);
                            // echo "<pre>";print_r($response_array);exit;
                            //Check success response
                            if ($http_status === 200 and isset($response_array['error']) === false) {
                                $success = true;
                            } else {
                                $success = false;
                                if (!empty($response_array['error']['code'])) {
                                    $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                                } else {
                                    $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                                }
                            }
                        }
                        //close connection
                        curl_close($ch);
                    } catch (Exception $e) {
                        $success = false;
                        $error = 'OPENCART_ERROR:Request to Razorpay Failed';
                    }
                    if ($success === true) {
                        if (!empty($this->session->userdata('ci_subscription_keys'))) {
                            $this->session->unset_userdata('ci_subscription_keys');
                        }
                        if (!$order_info['order_status_id']) {
                            redirect($this->input->post('merchant_surl_id'));
                        } else {
                            redirect($this->input->post('merchant_surl_id'));
                        }
                    } else {
                        redirect($this->input->post('merchant_furl_id'));
                    }
                } else {
                    echo 'An error occured. Contact site administrator, please!';
                }
            } elseif ($para1 == "success") {
                echo "success";
            } elseif ($para1 == "failed") {

                echo "failed";
            }
        }

        // var_dump($this->input->post());
    }

    public function cal() {

        $plan = 1000;
        $per = 33.31;

        echo $i = 1000 * 81;
        echo '<br>';
        echo $b = 1000 * 27;
        echo '<br>';
        echo $i - $b;
        echo '<br>';
        $ans = $plan * $per / 100;

        echo ceil($ans * 81);
    }

    
    

    public function faq($para1 = "", $para2 = "") {
        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "faq_help") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "faq/faq_help";
                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function invoice($para1 = "", $para2 = "") {
        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "sponsor_invoice") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "invoice/sponsor_invoice";

                // $page_data['invoice_no'] = $this->db->get_where('sponsor_invoice', 
                //     array('sponsor_id' => $this->session->userdata('sponsor_id')
                //       ))->row();
                // var_dump($page_data['invoice_no']->username);

                $page_data['s_invoice'] = $this->db->get_where('sponsor', array('sponsor_id' => $para2))->row();

                $page_data['invoice_no'] = $this->db->get_where('sponsor_invoice', array('username' => $page_data['s_invoice']->username))->row();


                $this->load->view($this->theme . '/invoice/sponsor_invoice', $page_data);
            }
        }
    }

    public function my_invoice($para1 = "", $para2 = "") {
        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "all_invoice") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "invoice/my_invoice";
                $page_data['my_invoice'] = $this->db->get_where('sponsor_invoice', array('sponsor_id' => $this->session->userdata('sponsor_id'), 'username' => $this->session->userdata('sponsor_name')))->row();
                $this->load->view($this->theme . '/index', $page_data);
            }
        }
    }

    public function ticket($para1 = "", $para2 = "") {
        if ($this->member_permission() == FALSE) {

            redirect(base_url() . 'members_login/', 'refresh');
        } else {

            if ($para1 == "open_ticket") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "ticket/open_ticket";

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

                $page_data['tickets'] = $this->db->get_where('tickets', array('sponsor_id' => $this->session->userdata('sponsor_id')))->result();

                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "new_ticket") {

                $page_data['page'] = "Dashboard";
                $page_data['title'] = "Dashboard Page || " . $this->system_title;
                $page_data['page_file'] = "ticket/new_ticket";
                $this->load->view($this->theme . '/index', $page_data);
            } elseif ($para1 == "add_ticket") {

                $this->form_validation->set_rules('username', 'Username', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required');
                $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
                $this->form_validation->set_rules('department', 'Department', 'trim|required');
                $this->form_validation->set_rules('priority', 'Priority', 'trim|required');
                $this->form_validation->set_rules('message', 'Message', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $page_data['page'] = "Dashboard";
                    $page_data['title'] = "Dashboard Page || " . $this->system_title;
                    $page_data['page_file'] = "ticket/new_ticket";
                    $page_data['form_contents'] = $this->input->post();
                    $this->load->view($this->theme . '/index', $page_data);
                } else {

                    $data['sponsor_id'] = $this->session->userdata('sponsor_id');
                    $data['sponsor_username'] = $this->session->userdata('sponsor_name');
                    $data['sponsor_email'] = $this->session->userdata('sponsor_email');
                    $data['subject'] = $this->input->post('subject');
                    $data['department'] = $this->input->post('department');
                    $data['priority'] = $this->input->post('priority');
                    $data['message'] = $this->input->post('message');
                    $data['status'] = '2';
                    $data['date_at'] = time();


                    $this->db->insert('tickets', $data);

                    $insert_id = $this->db->insert_id();
                    //$ticket_no = strtoupper(substr(hash('md5', rand()), 0, 3)) . $insert_id;
                    $ticket_no = strtoupper(rand(000000, 999999)) . $insert_id;

                    $this->db->where('tickets_id', $insert_id);
                    $result = $this->db->update('tickets', array('ticket_no' => $ticket_no));

                    if ($result) {
                        $this->session->set_flashdata('alert', 'add');
                        redirect(base_url() . 'members/ticket/open_ticket', 'refresh');
                    } else {
                        $this->session->set_flashdata('alert', 'failed_add');
                        redirect(base_url() . 'members/ticket/open_ticket', 'refresh');
                    }
                }
            }
        }
    }

    public function terms_and_conditions() {
        $page_data['page'] = "Dashboard";
        $page_data['title'] = "Dashboard Page || " . $this->system_title;
        $page_data['page_file'] = "terms_and_conditions/index";
        $page_data['form_contents'] = $this->input->post();

        $page_data['terms_and_conditions'] = $this->db->get_where('general_settings', array('type' => 'terms_conditions'))->row()->value;

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function privacy_policy() {
        $page_data['page'] = "Dashboard";
        $page_data['title'] = "Dashboard Page || " . $this->system_title;
        $page_data['page_file'] = "privacy_policy/index";
        $page_data['form_contents'] = $this->input->post();

        $page_data['privacy_policy'] = $this->db->get_where('general_settings', array('type' => 'privacy_policy'))->row()->value;

        $this->load->view($this->theme . '/index', $page_data);
    }

    public function notifications() {

        $page_data['notifications'] = $this->db->get_where('sponsor', array('sponsor_referral_id' => $this->session->userdata('sponsor_id')))->result();
    }

    public function member_permission() {
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
