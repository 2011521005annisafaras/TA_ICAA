<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan_model extends CI_Model
{

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }
    public function get_alternatif()
    {
        $query = $this->db->get('alternatif');
        return $query->result();
    }

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.id_sub_kriteria=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
        return $query->row_array();
    }

    public function get_hasil()
    {
        $query = $this->db->query("SELECT * FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif ORDER BY nilai DESC;");
        return $query->result();
    }

    public function insert_hasil($hasil_akhir = [])
    {
        $result = $this->db->insert('hasil', $hasil_akhir);
        return $result;
    }

    public function hapus_hasil()
    {
        $query = $this->db->query("TRUNCATE TABLE hasil;");
        return $query;
    }

    public function hasil_id($id_alternatif)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        $query = $this->db->get('hasil');
        return $query->row();
    }
}