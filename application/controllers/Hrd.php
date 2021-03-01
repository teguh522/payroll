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
    function kpikaryawan()
    {
        $data['action'] = base_url('hrd/carikpi');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('hrd/vcarikpi', $data);
        $this->load->view('vfooterlogin');
    }
    function carikpi()
    {
        $id_karyawan = $this->input->get('karyawan');
        $data['id_karyawan'] = $id_karyawan;
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updatekpi') {
            $data['getrow'] = $this->Mhrd->get_twodata(
                'id_kpi',
                $id_row,
                'mkpi',
                'mkaryawan',
                'mkpi.id_karyawan=mkaryawan.id_karyawan'
            );
            $data['action'] = base_url('hrd/update_kpi');
        } else {
            $data['action'] = base_url('hrd/create_kpi');
        }
        $data['hasil'] = $this->Mhrd->get_allwhere_groupby(
            'mkpi',
            'id_karyawan',
            'DESC',
            'id_karyawan',
            $id_karyawan
        );
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('hrd/vtkpi', $data);
        $this->load->view('vfooterlogin');
    }
    function create_kpi()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $data = array(
            'id_karyawan' => $id_karyawan,
            'nama_kpi' => $this->input->post('nama_kpi'),
            'bobot_target' => $this->input->post('bobot_target'),
            'nominal' => $this->input->post('nominal'),
        );
        $this->Mhrd->create_data('mkpi', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect("hrd/carikpi?karyawan=$id_karyawan");
    }
    function update_kpi()
    {
        $id = $this->input->post('id_kpi');
        $id_karyawan = $this->input->post('id_karyawan');
        $data = array(
            'id_karyawan' => $id_karyawan,
            'nama_kpi' => $this->input->post('nama_kpi'),
            'bobot_target' => $this->input->post('bobot_target'),
            'nominal' => $this->input->post('nominal'),
        );
        $this->Mhrd->update_data('id_kpi', $id, $data, 'mkpi');
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect("hrd/carikpi?karyawan=$id_karyawan");
    }
    function cariatasan()
    {
        $param = $this->input->get('param');
        $data = $this->Mhrd->caridatalike('nama_karyawan', $param, 'mkaryawan');
        echo json_encode($data);
    }
    function cariemail()
    {
        $param = $this->input->get('param');
        $data = $this->Mhrd->caridatalike('email', $param, 'auth');
        echo json_encode($data);
    }
    function datakaryawan()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updatekaryawan') {
            $data['getrow'] = $this->Mhrd->get_twodata(
                'id_karyawan',
                $id_row,
                'mkaryawan',
                'auth',
                'mkaryawan.id_auth=auth.id_auth'
            );
            $data['action'] = base_url('hrd/update_karyawan');
        } else {
            $data['action'] = base_url('hrd/create_karyawan');
        }
        $data['hasil'] = $this->Mhrd->get_jointwo_groupby(
            'mkaryawan',
            'mkaryawan.id_group=mgroup.id_group',
            'mgroup',
            'mkaryawan.id_auth=auth.id_auth',
            'auth',
            'id_karyawan',
            'DESC'
        );
        $data['group'] = $this->Mhrd->get_all_groupby('mgroup', 'id_group', 'DESC');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('hrd/vkaryawan', $data);
        $this->load->view('vfooterlogin');
    }

    function create_karyawan()
    {
        $data = array(
            'id_group' => $this->input->post('id_group'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'jabatan' => $this->input->post('jabatan'),
            'status_karyawan' => $this->input->post('status_karyawan'),
            'atasan_langsung' => $this->input->post('atasan'),
            'id_auth' => $this->input->post('id_auth'),
        );
        $this->Mhrd->create_data('mkaryawan', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('hrd/datakaryawan');
    }
    function update_karyawan()
    {
        $id = $this->input->post('id_karyawan');
        $data = array(
            'id_group' => $this->input->post('id_group'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'jabatan' => $this->input->post('jabatan'),
            'status_karyawan' => $this->input->post('status_karyawan'),
            'atasan_langsung' => $this->input->post('atasan'),
            'id_auth' => $this->input->post('id_auth'),
        );
        $this->Mhrd->update_data('id_karyawan', $id, $data, 'mkaryawan');
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('hrd/datakaryawan');
    }
    function groupkaryawan()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updategroup') {
            $data['getrow'] = $this->Mhrd->get_onedata('id_group', $id_row, 'mgroup');
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
    function update_group()
    {
        $id = $this->input->post('id_group');
        $data = array(
            'nama_group' => $this->input->post('nama_group')
        );
        $this->Mhrd->update_data('id_group', $id, $data, 'mgroup');
        $this->session->set_flashdata('msg', 'Berhasil di Update!');
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
        } else if ($func == 'datakaryawan') {
            $this->Mhrd->delete('id_karyawan', $id, 'mkaryawan');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('hrd/datakaryawan');
        } else if ($func == 'deletekpi') {
            $karyawan = $this->input->get('karyawan');
            $this->Mhrd->delete('id_kpi', $id, 'mkpi');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect("hrd/carikpi?karyawan=$karyawan");
        }
    }
}
