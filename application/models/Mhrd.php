<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mhrd extends CI_Model
{
    function get_onedata($coloum, $where, $tabel)
    {
        $this->db->where($coloum, $where);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->row();
        }
        return null;
    }
    function get_twodata($coloum, $where, $tabel, $tabel2, $coloum2)
    {
        $this->db->join($tabel2, $coloum2);
        $this->db->where($coloum, $where);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->row();
        }
        return null;
    }
    function get_all_groupby($tabel, $order, $conf)
    {
        $this->db->order_by($order, $conf);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->result();
        }
        return null;
    }
    function get_allwhere_groupby($tabel, $order, $conf, $kolom, $where2)
    {
        $this->db->where($kolom, $where2);
        $this->db->order_by($order, $conf);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->result();
        }
        return null;
    }
    function caridatalike($kolom, $where2, $tabel)
    {
        $this->db->like($kolom, $where2);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->result();
        }
        return null;
    }
    function get_joinone_groupby($tabel, $coloum, $tabel2, $order, $conf)
    {
        $this->db->join($tabel2, $coloum);
        $this->db->order_by($order, $conf);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->result();
        }
        return null;
    }
    function get_jointwo_groupby($tabel, $coloum, $tabel2, $coloum2, $tabel3, $order, $conf)
    {
        $this->db->join($tabel2, $coloum);
        $this->db->join($tabel3, $coloum2);
        $this->db->order_by($order, $conf);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->result();
        }
        return null;
    }
    function get_jointwo_wheregroupby(
        $tabel,
        $coloum,
        $tabel2,
        $coloum2,
        $tabel3,
        $order,
        $conf,
        $coloum3,
        $where
    ) {
        $this->db->join($tabel2, $coloum);
        $this->db->join($tabel3, $coloum2);
        $this->db->where($coloum3, $where);
        $this->db->order_by($order, $conf);
        $data = $this->db->get($tabel);
        if ($data->num_rows() > 0) {
            return $data->result();
        }
        return null;
    }
    function create_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    function delete($coloum, $where, $tabel)
    {
        $this->db->where($coloum, $where);
        $this->db->delete($tabel);
    }
    function update_data($coloum, $where, $data, $tabel)
    {
        $this->db->where($coloum, $where);
        $this->db->update($tabel, $data);
    }
}
