<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session'); 
    }

    public function index()
    {
        // Load the login view with potential validation errors or flash messages
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('auth/login', $data);
    }

    public function login()
    {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // Run validation
        if ($this->form_validation->run() === TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Check user credentials
            $user = $this->User_model->login($username, $password);

            if ($user) {
                // Set session data
                $this->session->set_userdata([
                    'username' => $user->username,
                    'logged_in' => TRUE,
                ]);
                redirect('dashboard/index');
            } else {
                // Set flash message and redirect on failure
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth');
            }
        } else {
            // Reload the login view with validation errors
            $this->index(); // This method will handle displaying validation errors
        }
    }

    public function logout()
    {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('auth');
    }
}
