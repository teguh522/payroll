<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('id_login') == null) && ($this->session->userdata('status') == null)) {
            $this->session->sess_destroy();
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('level') == 'owner') {
            redirect('owner', 'refresh');
        } else if ($this->session->userdata('level') == 'manager') {
            redirect('manager', 'refresh');
        } else if ($this->session->userdata('level') == 'hrd') {
            redirect('hrd', 'refresh');
        } else if ($this->session->userdata('level') == 'supervisor') {
            redirect('supervisor', 'refresh');
        } else if ($this->session->userdata('level') == 'staff') {
            redirect('staff', 'refresh');
        }
    }
    public function index()
    {
        echo "Admin";
    }
}
