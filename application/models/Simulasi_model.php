<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simulasi_model extends CI_Model
{

    public function getSimulasi($id = null)
    {
        if ($id == null) {
            $this->db->select('*');
            $this->db->from('simulasi');
            $this->db->join('sub_tema', 'sub_tema.id_sub_tema = simulasi.id_sub_tema', 'left');
            $this->db->order_by('sub_tema.id_sub_tema', 'asc');
            $this->db->order_by('simulasi.id_simulasi', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('simulasi');
            $this->db->join('sub_tema', 'sub_tema.id_sub_tema = simulasi.id_sub_tema', 'left');
            $this->db->where('id_simulasi', $id);
            $this->db->order_by('sub_tema.id_sub_tema', 'asc');
            $this->db->order_by('simulasi.id_simulasi', 'asc');
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function getSimulasiLimit($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('simulasi');
        $this->db->join('sub_tema', 'sub_tema.id_sub_tema = simulasi.id_sub_tema', 'left');
        $this->db->order_by('sub_tema.id_sub_tema', 'asc');
        $this->db->order_by('simulasi.id_simulasi', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSimulasiWithSubTema($id)
    {

        $this->db->select('*');
        $this->db->from('simulasi');
        $this->db->join('sub_tema', 'simulasi.id_sub_tema = sub_tema.id_sub_tema');
        $this->db->where('simulasi.id_sub_tema', $id);
        $simulasi = $this->db->get()->result_array();

        $i = 0;
        foreach ($simulasi as $dataSimulasi) {
            $res[$i] = [
                'judul_simulasi' => $dataSimulasi['judul_simulasi'],
                'gambar' => $dataSimulasi['gambar'],
            ];

            $i++;
        }

        foreach ($simulasi as $m) {
            $result = [
                'id_sub_tema' => $m['id_sub_tema'],
                'judul' => $m['judul'],
                'simulasi' => $res
            ];
        }

        return $result;
    }

    public function createSimulasi($data)
    {
        $this->db->insert('simulasi', $data);
        return $this->db->affected_rows();
    }

    public function updateSimulasi($data, $id_simulasi)
    {
        $this->db->update('simulasi', $data, ['id_simulasi' => $id_simulasi]);
        return $this->db->affected_rows();
    }

    public function deleteSimulasi($id_simulasi)
    {
        $this->db->delete('simulasi', ['id_simulasi' => $id_simulasi]);
        return $this->db->affected_rows();
    }
}

/* End of file Simulasi_model.php */
