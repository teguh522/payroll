<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
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
    public function datapelamar()
    {
        $data['hasil'] = $this->Muser->get_data_allarray_loker('tgl_akhir >=', date('Y-m-d'), 'lowongan');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vfilterdata', $data);
        $this->load->view('vfooterlogin');
    }
    public function caridata()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $lowongan = $this->input->post('lowongan');
        $status = $this->input->post('status');
        $data['hasil'] = $this->Muser->get_data_filter(
            'tgl_lamar',
            $tgl_awal,
            $tgl_akhir,
            'lowongan',
            $lowongan,
            'submit.status',
            $status,
            'submit'
        );
        // $jawaban = $this->Muser->jumlah_benar('jawaban', 'jawaban_user', 'jawaban_benar');
        // if ($jawaban != null) {
        //     $data['totalbenar'] = count($jawaban);
        // } else {
        //     $data['totalbenar'] = '-';
        // }
        if ($data == null) {
            echo "Data Tidak Di Temukan";
        } else {
            $this->load->view('vheaderlogin');
            $this->load->view('vmenu');
            $this->load->view('admin/vtampildata', $data);
            $this->load->view('vfooterlogin');
        }
    }
    public function detailpelamar()
    {
        $id_submit = $this->input->get('id');
        $submit = $this->Muser->get_data('id_submit', $id_submit, 'submit');

        if ($submit == null || $submit == 'undefined') {
            echo "Data tidak ditemukan";
        } else {
            $id = $submit->id_user;
            $data['id_submit'] = $id_submit;
            $data['submit'] = $this->Muser->get_data_join_str('id_submit', $id_submit, 'submit', 'lowongan', 'submit.lowongan=lowongan.id_lowongan');
            $data['email'] = $this->Muser->get_data_allarray('id_auth', $id, 'auth');
            $data['biodata'] = $this->Muser->get_data_allarray('id_user', $id, 'datautama');
            $data['pendidikan'] = $this->Muser->get_data_join_str('id_user', $id, 'pendidikan', 'jenis_pendidikan', 'pendidikan.tingkat_pendidikan=jenis_pendidikan.id_jenis_pendidikan');
            $data['disabilitas'] = $this->Muser->get_data_join_str('id_user', $id, 'datautama', 'jenis_disabilitas', 'datautama.id_disabilitas=jenis_disabilitas.id_jenis_disabilitas');
            $data['kerja'] = $this->Muser->get_data_allarray('id_user', $id, 'kerja');
            $data['dokumen'] = $this->Muser->get_data_join_str('id_user', $id, 'dokumen', 'jenis_dokumen', 'dokumen.jenis_dokumen=jenis_dokumen.id_jenis_dokumen');
            $data['str'] = $this->Muser->get_data_join_str('id_user', $id, 'str', 'jenis_str', 'str.jenis_str=jenis_str.id_jenis_str');
            $data['pelatihan'] = $this->Muser->get_data_allarray('id_user', $id, 'pelatihan');
            $data['beasiswa'] = $this->Muser->get_data_allarray('id_user', $id, 'beasiswa');
            $this->load->view('vheaderlogin');
            $this->load->view('vmenu');
            $this->load->view('admin/vdetaildata', $data);
            $this->load->view('vfooterlogin');
        }
    }
    public function postlowongan()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updatelowongan') {
            $data['getrow'] = $this->Muser->get_data('id_lowongan', $id_row, 'lowongan');
            $data['action'] = base_url('admin/update_postlowongan');
        } else {
            $data['action'] = base_url('admin/create_postlowongan');
        }
        $data['hasil'] = $this->Muser->get_threejoin_admin(
            'lowongan.id_disabilitas=jenis_disabilitas.id_jenis_disabilitas',
            'lowongan.id_perusahaan=perusahaan_client.id_perusahaan',
            'lowongan',
            'jenis_disabilitas',
            'perusahaan_client'
        );
        $data['jenis_disabilitas'] = $this->Muser->get_data_all('jenis_disabilitas');
        $data['jenis_usaha'] = $this->Muser->get_data_all('perusahaan_client');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vpostlowongan', $data);
        $this->load->view('vfooterlogin');
    }
    public function create_postlowongan()
    {
        $data = array(
            'posisi' => $this->input->post('posisi'),
            'tgl_awal' => $this->input->post('tgl_awal'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_disabilitas' => $this->input->post('id_disabilitas'),
            'id_perusahaan' => $this->input->post('id_perusahaan')
        );
        $this->Muser->create_data('lowongan', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('admin/postlowongan');
    }
    public function update_postlowongan()
    {
        $id = $this->input->post('id_lowongan');
        $data = array(
            'tgl_awal' => $this->input->post('tgl_awal'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_disabilitas' => $this->input->post('id_disabilitas'),
            'id_perusahaan' => $this->input->post('id_perusahaan')
        );
        $this->Muser->update_data('id_lowongan', $id, $data, 'lowongan');
        $this->session->set_flashdata('msg', 'Berhasil di Update!');
        redirect('admin/postlowongan');
    }
    public function validasi()
    {
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vvalidasi');
        $this->load->view('vfooterlogin');
    }
    public function cari_validasi()
    {
        $id_submit = $this->input->get('noreg');
        $submit = $this->Muser->get_data('id_submit', $id_submit, 'submit');
        $id = $submit->id_user;
        if ($id_submit == null) {
            echo "No registrasi tidak boleh kosong";
        } else {
            if ($submit->status != 'terkirim') {
                $url = base_url('admin/validasi');
                echo '<script>';
                echo 'alert("Pelamar ini sudah tervalidasi.!!");';
                echo 'window.location= "' . $url . '";';
                echo '</script>';
            } else {
                $data['submit'] = $this->Muser->get_data_join_str('id_submit', $id_submit, 'submit', 'lowongan', 'submit.lowongan=lowongan.id_lowongan');
                $data['biodata'] = $this->Muser->get_data_allarray('id_user', $id, 'datautama');
                $this->load->view('vheaderlogin');
                $this->load->view('vmenu');
                $this->load->view('admin/vpostvalidasi', $data);
                $this->load->view('vfooterlogin');
            }
        }
    }
    public function validasi_viaajax()
    {
        $id = $this->input->post('id_submit');
        $status = $this->input->post('status');
        $data = array(
            'status' => $status,
        );
        $this->Muser->update_data('id_submit', $id, $data, 'submit');
        echo json_encode("200");
    }
    public function create_validasi()
    {
        $id = $this->input->post('id_submit');
        $data = array(
            'status' => $this->input->post('status'),
        );
        $this->Muser->update_data('id_submit', $id, $data, 'submit');
        $this->session->set_flashdata('msg', 'Berhasil di Validasi!');
        redirect('admin/validasi');
    }
    public function printcv()
    {
        $id = $this->input->get('id');
        $this->load->library('PDF_AutoPrint');
        $data = $this->Muser->get_data_cv('submit.id_submit', $id, 'submit');
        $id_detail = $data[0]->id_user;
        $hasil = $this->Muser->get_data('id_user', $id_detail, 'datautama');
        $id_disabilitas = $hasil->id_disabilitas;
        $disabilitas = $this->Muser->get_data('id_jenis_disabilitas', $id_disabilitas, 'jenis_disabilitas');
        if ($data == null) {
            echo "Data tidak ditemukan";
        } else {
            $arr = array(
                'status_file' => 1,
            );
            $this->Muser->update_data('id_submit', $id, $arr, 'submit');
            $image = base_url('upload/foto/' . $hasil->foto);
            $pdf = new PDF_AutoPrint('l', 'mm', array('180', '100'));
            $pdf->SetAutoPageBreak(true, 1);
            $pdf->AddPage();
            $pdf->SetTitle('CV ' . $hasil->nama);
            $pdf->Image($image, 10, 9, 30);
            $pdf->SetFont('Times', '', '12');
            $pdf->setXY(50, 9);
            $pdf->Cell(40, 5, 'No Registrasi', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $data[0]->id_submit, 0, 1, 'L');
            $pdf->setXY(50, 14);
            $pdf->Cell(40, 5, 'No KTP', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->noktp, 0, 1, 'L');
            $pdf->setXY(50, 19);
            $pdf->Cell(40, 5, 'Nama', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->nama, 0, 1, 'L');
            $pdf->setXY(50, 24);
            $pdf->Cell(40, 5, 'TTL', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->kota_lahir . ', ' . date('d-m-Y', strtotime($hasil->tgl_lahir)), 0, 1, 'L');
            $pdf->setXY(50, 29);
            $pdf->Cell(40, 5, 'Jenis Kelamin', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->jk, 0, 1, 'L');
            $pdf->setXY(50, 34);
            $pdf->Cell(40, 5, 'Status', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->status_pernikahan, 0, 1, 'L');
            $pdf->setXY(50, 39);
            $pdf->Cell(40, 5, 'No HP', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->nohp, 0, 1, 'L');
            $pdf->setXY(50, 44);
            $pdf->Cell(40, 5, 'Melamar Sebagai', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $data[0]->posisi, 0, 1, 'L');
            $pdf->setXY(50, 49);
            $pdf->Cell(40, 5, 'Tingkat Pendidikan', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $data[0]->tingkat, 0, 1, 'L');
            $pdf->setXY(10, 56);
            $pdf->Cell(40, 5, 'Alamat Pelamar', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->alamat, 0, 0, 'L');
            $pdf->Cell(40, 5, 'Disabilitas', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $disabilitas->nama_disabilitas, 0, 1, 'L');
            $pdf->setXY(10, 61);
            $pdf->Cell(40, 5, 'Nama Institusi', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $data[0]->nama_institusi, 0, 0, 'L');
            $pdf->Cell(40, 5, 'Hobi', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->hobi, 0, 1, 'L');
            $pdf->setXY(10, 66);
            $pdf->Cell(40, 5, 'Jurusan', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $data[0]->jurusan, 0, 0, 'L');
            $pdf->Cell(40, 5, 'TB / BB', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->tb . " CM" . " / " . $hasil->bb . " BB", 0, 1, 'L');
            $pdf->setXY(10, 71);
            $pdf->Cell(40, 5, 'IPK/Nilai Akhir', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $data[0]->nilai, 0, 0, 'L');
            $pdf->Cell(40, 5, 'Nama Keluarga', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->nama_kel, 0, 1, 'L');
            $pdf->setXY(10, 76);
            $pdf->Cell(40, 5, 'Tgl Melamar', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . date('d-m-Y', strtotime($data[0]->tgl_lamar)), 0, 0, 'L');
            $pdf->Cell(40, 5, 'No Keluarga', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . $hasil->no_kel, 0, 1, 'L');
            $pdf->Cell(40, 5, 'Jam Melamar', 0, 0, 'L');
            $pdf->Cell(40, 5, ': ' . date('H:m:s', strtotime($data[0]->tgl_lamar)), 0, 0, 'L');
            $pdf->AutoPrint();
            $pdf->Output();
        }
    }
    function perusahaan()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updateperusahaan') {
            $data['getrow'] = $this->Muser->get_data('id_perusahaan', $id_row, 'perusahaan_client');
            $data['action'] = base_url('admin/update_perusahaan');
        } else {
            $data['action'] = base_url('admin/create_perusahaan');
        }
        $data['hasil'] = $this->Muser->get_data_all('perusahaan_client');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vperusahaan', $data);
        $this->load->view('vfooterlogin');
    }
    function create_perusahaan()
    {
        $data = array(
            'nama_usaha' => $this->input->post('nama_usaha'),
            'bidang_usaha' => $this->input->post('bidang_usaha'),
            'lokasi_usaha' => $this->input->post('lokasi_usaha'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'hp_usaha' => $this->input->post('hp_usaha'),
            'email_usaha' => $this->input->post('email_usaha')
        );
        $this->Muser->create_data('perusahaan_client', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('admin/perusahaan');
    }
    function update_perusahaan()
    {
        $id = $this->input->post('id_perusahaan');
        $data = array(
            'nama_usaha' => $this->input->post('nama_usaha'),
            'bidang_usaha' => $this->input->post('bidang_usaha'),
            'lokasi_usaha' => $this->input->post('lokasi_usaha'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'hp_usaha' => $this->input->post('hp_usaha'),
            'email_usaha' => $this->input->post('email_usaha')
        );
        $this->Muser->update_data('id_perusahaan', $id, $data, 'perusahaan_client');
        $this->session->set_flashdata('msg', 'Berhasil di Update!');
        redirect('admin/perusahaan');
    }
    function kontrakkerja()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updatekontrak') {
            $data['getrow'] = $this->Muser->get_dataone_join(
                'id_kontrak_kerja',
                $id_row,
                'kontrak_kerja.id_submit=submit.id_submit',
                'submit.id_user=datautama.id_user',
                'submit.lowongan=lowongan.id_lowongan',
                'kontrak_kerja',
                'submit',
                'datautama',
                'lowongan'
            );
            $data['action'] = base_url('admin/update_kontrakkerja');
        } else {
            $data['action'] = base_url('admin/create_kontrakkerja');
        }
        $data['jenis_disabilitas'] = $this->Muser->get_data_all('jenis_disabilitas');
        $data['jenis_usaha'] = $this->Muser->get_data_all('perusahaan_client');
        $data['hasil'] = $this->Muser->tampilkontrak('kontrak_kerja');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vkontrakkerja', $data);
        $this->load->view('vfooterlogin');
    }
    function create_kontrakkerja()
    {
        $data = array(
            'status_kontrak' => $this->input->post('status_kontrak'),
            'id_submit' => $this->input->post('id_submit'),
            'tgl_awal_kontrak' => $this->input->post('tgl_awal'),
            'tgl_akhir_kontrak' => $this->input->post('tgl_akhir'),
            'nama_pembuat' => $this->input->post('nama_pembuat')
        );
        $this->Muser->create_data('kontrak_kerja', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('admin/kontrakkerja');
    }
    function update_kontrakkerja()
    {
        $id = $this->input->post('id_kontrak_kerja');
        $data = array(
            'status_kontrak' => $this->input->post('status_kontrak'),
            'id_submit' => $this->input->post('id_submit'),
            'tgl_awal_kontrak' => $this->input->post('tgl_awal'),
            'tgl_akhir_kontrak' => $this->input->post('tgl_akhir'),
            'nama_pembuat' => $this->input->post('nama_pembuat')
        );
        $this->Muser->update_data('id_kontrak_kerja', $id, $data, 'kontrak_kerja');
        $this->session->set_flashdata('msg', 'Berhasil di Update!');
        redirect('admin/kontrakkerja');
    }
    public function printkontrakkerja()
    {
        $id = $this->input->get('id');
        $data = $this->Muser->tampilkontrakuser('kontrak_kerja', 'kontrak_kerja.id_kontrak_kerja', $id);
        if ($data == null) {
            echo "Biodata Tidak Ditemukan";
        } else {
            $this->load->library('PDF_AutoPrint');
            $icon = base_url('upload/foto/thisable-logo.png');
            $pdf = new PDF_AutoPrint('p', 'mm', 'a4');
            $pdf->SetAutoPageBreak(true, 1);
            $pdf->AddPage();
            $pdf->SetTitle('Kontrak ' . $data[0]->nama);
            $pdf->Image($icon, 15, 21, 30);
            $pdf->SetFont('Times', '', '12');
            $pdf->Text(10, 7, date('d M Y'));
            $pdf->Cell(0, 7, 'THISABLE ENTERPRISE SISTEM RECRUITMENT', 0, 1, 'C');
            $pdf->Cell(40, 23, '', 1, 0, 'L');
            $pdf->Cell(110, 23, '', 'BTR', 0, 'L');
            $pdf->Cell(40, 23, '', 'BTR', 1, 'L');
            $pdf->Text(172, 27, 'SISTEM');
            $pdf->Text(165, 32, 'RECRUITMENT');
            $pdf->SetFont('Times', 'B', '25');
            $pdf->Text(77, 32, 'Kontrak Kerja');
            $pdf->SetFont('Times', '', '12');
            $pdf->SetY(43);
            $pdf->Cell(40, 7, 'No KTP', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->noktp, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Nama', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama, 0, 1, 'L');
            $pdf->Cell(40, 7, 'TTL', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->kota_lahir . ', ' . date('d-M-Y', strtotime($data[0]->tgl_lahir)), 0, 1, 'L');
            $pdf->Cell(40, 7, 'Jenis Kelamin', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . strtoupper($data[0]->jk), 0, 1, 'L');
            $pdf->Cell(40, 7, 'Status', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->status_pernikahan, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Alamat', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->alamat, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Provinsi', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_prov, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Kota', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_kota, 0, 1, 'L');
            $pdf->Cell(40, 7, 'No Hp', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nohp, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Disabilitas', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_disabilitas, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Alat Bantu', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->alat_bantu, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Nama Keluarga', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_kel, 0, 1, 'L');
            $pdf->Cell(40, 7, 'No Hp Keluarga', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->no_kel, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Status Kontrak', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . strtoupper($data[0]->status_kontrak), 0, 1, 'L');
            $pdf->Cell(40, 7, 'Perusahaan', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_usaha, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Bidang Usaha', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->bidang_usaha, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Lokasi Usaha', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->lokasi_usaha, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Posisi', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->posisi, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Tgl Kontrak', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->tgl_awal_kontrak . " s/d " . $data[0]->tgl_akhir_kontrak, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Pembuat Kontrak', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_pembuat, 0, 1, 'L');
            $pdf->Text(10, 290, base_url('profile/printkontrakkerja'));
            $pdf->AutoPrint();
            $pdf->Output();
        }
    }
    function caripelamarjson()
    {
        $param = $this->input->get('param');
        $data = $this->Muser->caridatapelamarlike('nama', $param, 'submit');
        echo json_encode($data);
    }
    function cariperusahaanjson()
    {
        $param = $this->input->get('param');
        $data = $this->Muser->caridatalike('nama_usaha', $param, 'perusahaan_client');
        echo json_encode($data);
    }
    function interview()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updateinterview') {
            $data['getrow'] = $this->Muser->get_dataone_join(
                'id_interview',
                $id_row,
                'interview.id_submit=submit.id_submit',
                'submit.id_user=datautama.id_user',
                'submit.lowongan=lowongan.id_lowongan',
                'interview',
                'submit',
                'datautama',
                'lowongan'
            );
            $data['action'] = base_url('admin/update_interview');
        } else {
            $data['action'] = base_url('admin/create_interview');
        }
        $data['hasil'] = $this->Muser->get_multijoin(
            'interview.id_submit=submit.id_submit',
            'submit.id_user=datautama.id_user',
            'submit.lowongan=lowongan.id_lowongan',
            'lowongan.id_perusahaan=perusahaan_client.id_perusahaan',
            'interview',
            'submit',
            'datautama',
            'lowongan',
            'perusahaan_client'
        );
        $data['soal'] = $this->Muser->get_data_all('soal_interview');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vinterview', $data);
        $this->load->view('vfooterlogin');
    }
    function create_interview()
    {
        $data = array(
            'id_submit' => $this->input->post('id_submit'),
            'tgl_interview' => $this->input->post('tgl_interview'),
            'nama_interviewer' => $this->input->post('nama_interviewer'),
        );
        $this->Muser->create_data('interview', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('admin/interview');
    }
    function update_interview()
    {
        $id = $this->input->post('id_interview');
        $data = array(
            'id_submit' => $this->input->post('id_submit'),
            'tgl_interview' => $this->input->post('tgl_interview'),
            'nama_interviewer' => $this->input->post('nama_interviewer'),
        );
        $this->Muser->update_data('id_interview', $id, $data, 'interview');
        $this->session->set_flashdata('msg', 'Berhasil di Update!');
        redirect('admin/interview');
    }
    public function printinterview()
    {
        $id = $this->input->get('id');
        $data = $this->Muser->get_multijoinwhere(
            'interview.id_submit=submit.id_submit',
            'submit.id_user=datautama.id_user',
            'submit.lowongan=lowongan.id_lowongan',
            'lowongan.id_perusahaan=perusahaan_client.id_perusahaan',
            'interview',
            'submit',
            'datautama',
            'lowongan',
            'perusahaan_client',
            'id_interview',
            $id
        );
        $jawaban = $this->Muser->get_data_all_where_join(
            'jawaban_interview.id_soal_interview=soal_interview.id_soal_interview',
            'id_interview',
            $id,
            'jawaban_interview',
            'soal_interview',
            'jawaban_interview.id_soal_interview',
            'ASC'
        );
        if ($data == null) {
            echo "Data Tidak Ditemukan";
        } else {
            $this->load->library('PDF_AutoPrint');
            $icon = base_url('upload/foto/thisable-logo.png');
            $pdf = new PDF_AutoPrint('p', 'mm', 'a4');
            $pdf->SetAutoPageBreak(true, 1);
            $pdf->AddPage();
            $pdf->SetTitle('Interview ' . $data[0]->nama);
            $pdf->Image($icon, 15, 21, 30);
            $pdf->SetFont('Times', '', '12');
            $pdf->Text(10, 7, date('d M Y'));
            $pdf->Cell(0, 7, 'THISABLE ENTERPRISE SISTEM RECRUITMENT', 0, 1, 'C');
            $pdf->Cell(40, 23, '', 1, 0, 'L');
            $pdf->Cell(110, 23, '', 'BTR', 0, 'L');
            $pdf->Cell(40, 23, '', 'BTR', 1, 'L');
            $pdf->Text(172, 27, 'SISTEM');
            $pdf->Text(165, 32, 'RECRUITMENT');
            $pdf->SetFont('Times', 'B', '25');
            $pdf->Text(77, 32, 'Print Interview');
            $pdf->SetFont('Times', '', '12');
            $pdf->SetY(43);
            $pdf->Cell(40, 7, 'No KTP', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->noktp, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Nama', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama, 0, 1, 'L');
            $pdf->Cell(40, 7, 'TTL', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->kota_lahir . ', ' . date('d-M-Y', strtotime($data[0]->tgl_lahir)), 0, 1, 'L');
            $pdf->Cell(40, 7, 'Jenis Kelamin', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . strtoupper($data[0]->jk), 0, 1, 'L');
            $pdf->Cell(40, 7, 'Perusahaan', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->nama_usaha, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Bidang Usaha', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->bidang_usaha, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Lokasi Usaha', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->lokasi_usaha, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Posisi', 0, 0, 'L');
            $pdf->Cell(40, 7, ': ' . $data[0]->posisi, 0, 1, 'L');
            foreach ($jawaban as $index => $val) {
                $pdf->SetFont('Times', 'B', '12');
                $pdf->Cell(40, 7, 'Pertanyaan', 0, 1, 'L');
                $pdf->SetFont('Times', '', '12');
                $pdf->Cell(40, 7, ($index + 1) . '. ' . $val->soal_interview, 0, 1, 'L');
                $pdf->SetFont('Times', 'B', '12');
                $pdf->Cell(40, 7, 'Jawaban', 0, 1, 'L');
                $pdf->SetFont('Times', '', '12');
                $pdf->Cell(40, 7,  $val->jawaban_interview, 0, 1, 'L');
            }
            $pdf->Text(10, 290, base_url('profile/printkontrakkerja'));
            $pdf->AutoPrint();
            $pdf->Output();
        }
    }
    public function soalinterview()
    {
        $func = $this->input->get('func');
        $id_row = $this->input->get('id');
        if ($func == 'updatesoalinterview') {
            $data['getrow'] = $this->Muser->get_data('id_soal_interview', $id_row, 'soal_interview');
            $data['action'] = base_url('admin/update_soalinterview');
        } else {
            $data['action'] = base_url('admin/create_soalinterview');
        }
        $data['hasil'] = $this->Muser->get_data_all('soal_interview');
        $this->load->view('vheaderlogin');
        $this->load->view('vmenu');
        $this->load->view('admin/vsoalinterview', $data);
        $this->load->view('vfooterlogin');
    }
    public function create_soalinterview()
    {
        $data = array(
            'soal_interview' => $this->input->post('soal_interview'),
        );
        $this->Muser->create_data('soal_interview', $data);
        $this->session->set_flashdata('msg', 'Berhasil Tersimpan!');
        redirect('admin/soalinterview');
    }
    public function update_soalinterview()
    {
        $id = $this->input->post('id_soal_interview');
        $data = array(
            'soal_interview' => $this->input->post('soal_interview'),
        );
        $this->Muser->update_data('id_soal_interview', $id, $data, 'soal_interview');
        $this->session->set_flashdata('msg', 'Berhasil di Update!');
        redirect('admin/soalinterview');
    }
    function getexistinterview()
    {
        $id = $this->input->post('id_interview');
        $data = $this->Muser->get_data_all_where_join(
            'jawaban_interview.id_soal_interview=soal_interview.id_soal_interview',
            'id_interview',
            $id,
            'jawaban_interview',
            'soal_interview',
            'jawaban_interview.id_soal_interview',
            'ASC'
        );
        echo json_encode($data);
    }
    function jawabaninterview()
    {
        $soal = $this->input->post('id_soal[]');
        $jwb = $this->input->post('jwb_int[]');

        foreach ($soal as $key => $value) {
            $data = array(
                'id_interview' => $this->input->post('id_interview'),
                'id_soal_interview' => $value,
                'jawaban_interview' => $jwb[$key]
            );
            $this->Muser->create_data('jawaban_interview', $data);
        }
        echo json_encode("Berhasil");
    }
    public function delete()
    {
        $func = $this->input->get('func');
        $id = $this->input->get('id');
        if ($func == 'perusahaan') {
            $this->Muser->delete('id_perusahaan', $id, 'perusahaan_client');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('admin/perusahaan');
        } elseif ($func == 'lowongan') {
            $this->Muser->update_data('id_lowongan', $id, ['status_lowongan' => 0], 'lowongan');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('admin/postlowongan');
        } elseif ($func == 'interview') {
            $this->Muser->delete('id_interview', $id, 'interview');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('admin/interview');
        } elseif ($func == 'soalinterview') {
            $this->Muser->delete('id_soal_interview', $id, 'soal_interview');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('admin/soalinterview');
        } elseif ($func == 'kontrakkerja') {
            $this->Muser->delete('id_kontrak_kerja', $id, 'kontrak_kerja');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('admin/kontrakkerja');
        } elseif ($func == 'admindelete') {
            $this->Muser->delete('id_auth', $id, 'auth');
            $this->session->set_flashdata('msg', 'Terhapus!');
            redirect('adminconfig/tambahadmin');
        }
    }
}
