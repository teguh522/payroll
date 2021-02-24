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
    function get_all_groupby($tabel, $order, $conf)
    {
        $this->db->order_by($order, $conf);
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
