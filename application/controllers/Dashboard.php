<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->view('templates/master');
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('dashboard/index');
        $this->load->view('components/sidebar');
        $this->load->view('components/footer');

    }
}