<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeding extends CI_Controller {

	function __construct()
    {
        parent::__construct();
 		 // initiate faker
        $this->faker = Faker\Factory::create();
 		
 		 // load any required models
        $this->load->model('seeding_model');
    }
 	
 	function index()
 	{
 		$data['Seedings'] = $this->seeding_model->get();

 		$this->load->view('seedings', $data);
 	}
    /**
     * seed local database
     */
    function seed()
    {
        // purge existing data
        $this->_truncate_db();
 
        // seed users
        $this->_seed_users(25);
 
        // call more seeds here...
    }
 
    /**
     * seed users
     *
     * @param int $limit
     */
    function _seed_users($limit)
    {
     
 
        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {
          
 
            $data = array(
                'profile_id' => rand(1111111, 9999999), // get a unique nickname
                'username' => $this->faker->unique()->userName, // run this via your password hashing function
                'full_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'gender' => rand(1, 2) ? 'male' : 'female',
                'password' => sha1('123456'),
                'email' => $this->faker->email,
                'position' => 1,
                'product' => 6,
                'date_of_birth' => time(),
                'mobile_no' => $this->faker->phoneNumber,
                'back_name' => 'ICICI',
                'account_no' => mt_rand(0, 1) ? '0' : '1',
                'branch_name' => 'Coimbatore',
                'ifsc' => '3366',
                'address' => $this->faker->streetAddress,
                'is_blocked' => 'no',
                'sponsor_referral_id' => $i === 0 ? true : rand(0, 1),
                'sponsor_referral_profile_id' => $i === 0 ? true : rand(0, 1),
                'profile_image' => $i === 0 ? true : rand(0, 1),
                'payment_type' => $i === 0 ? true : rand(0, 1),
                'active_on' => time(),
                'created_on' => time(),
                'update_on' => '',
                
            );
 
            $this->seeding_model->insert($data);
        }
 		$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        redirect('seeding', 'location');
    }
 
    private function _truncate_db()
    {
        $this->seeding_model->truncate();
    }



}
