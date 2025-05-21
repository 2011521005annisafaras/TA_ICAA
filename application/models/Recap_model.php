<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recap_model extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('recap');
        return $query->result();

    }

    public function insert($data = [])
    {
        $result = $this->db->insert('recap', $data);
        return $result;
    }
}