<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrd extends CI_Controller
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
        } else if ($this->session->userdata('level') == 'staff') {
            redirect('staff', 'refresh');
        }
    }
    public function index()
    {
        $this->groupkaryawan();
    }
    function datakaryawan()
    {
    }

    function create_karyawan()
    {
    }
    function update_karyawan()
    {
    }
    function groupkaryawan()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updategroup') {
            $data['getrow'] = $this->Mhrd->get_dataone('id_group', $id_row, 'mgroup');
            $data['action'] = base_url('hrd/update_group');
        } else {
            $data['action'] = base_url('hrd/create_group');
        }
        $data['hasil'] = $this->Mhrd->get_all_groupby('mgroup', 'id_group', 'DESC');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('hrd/vgroup', $data);
        $this->load->view('vfooterlogin');
    }
    function create_group()
    {
        $data = array(
            'nama_group' => $this->input->post('nama_group')
        );
        $this->Mhrd->create_data('mgroup', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('hrd/groupkaryawan');
    }
    public function delete()
    {
        $func = $this->input->get('func');
        $id = $this->input->get('id');
        if ($func == 'groupkaryawan') {
            $this->Mhrd->delete('id_group', $id, 'mgroup');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('hrd/groupkaryawan');
        }
    }
}
