<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhrd');
        if (($this->session->userdata('id_login') == null) && ($this->session->userdata('status') == null)) {
            $this->session->sess_destroy();
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('level') == 'admin') {
            redirect('admin', 'refresh');
        } else if ($this->session->userdata('level') == 'owner') {
            redirect('owner', 'refresh');
        } else if ($this->session->userdata('level') == 'manager') {
            redirect('manager', 'refresh');
        } else if ($this->session->userdata('level') == 'supervisor') {
            redirect('supervisor', 'refresh');
        } else if ($this->session->userdata('level') == 'hrd') {
            redirect('hrd', 'refresh');
        }
    }
    public function index()
    {
        $this->mykpi();
    }

    function mykpi()
    {
        $id_login = $this->session->userdata('id_login');
        $data['hasil'] = $this->Mhrd->get_jointwo_wheregroupby(
            'auth',
            'auth.id_auth=mkaryawan.id_auth',
            'mkaryawan',
            'mkpi.id_karyawan=mkaryawan.id_karyawan',
            'mkpi',
            'mkpi.id_kpi',
            'desc',
            'auth.id_auth',
            $id_login
        );
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('staff/vmykpi', $data);
        $this->load->view('vfooterlogin');
    }

    function laporprogress()
    {
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('staff/vmyprogress');
        $this->load->view('vfooterlogin');
    }
}
