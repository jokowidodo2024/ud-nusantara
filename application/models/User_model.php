<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database
    }
    
    public function login($username, $password)
    {
        return $this->db->get('role')->result();
    }
}