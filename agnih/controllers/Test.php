<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function __construct() {
        parent::__construct('home');
    }
    
    public function index() {
        
        $page_data['test_array'] = $this->db->get('test')->result();
        $this->load->view('test',$page_data);
    }
    
}