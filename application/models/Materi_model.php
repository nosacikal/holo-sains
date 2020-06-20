<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Materi_model extends CI_Model
{

    public function getMateri($id = null)
    {
        if ($id == null) {
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('sub_tema', 'sub_tema.id_sub_tema = materi.id_sub_tema', 'left');
            $this->db->order_by('sub_tema.id_sub_tema', 'asc');
            $this->db->order_by('materi.id_materi', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('sub_tema', 'sub_tema.id_sub_tema = materi.id_sub_tema', 'left');
            $this->db->where('id_materi', $id);
            $this->db->order_by('sub_tema.id_sub_tema', 'asc');
            $this->db->order_by('materi.id_materi', 'asc');
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function getMateriWithSubTema($id)
    {

        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('sub_tema', 'materi.id_sub_tema = sub_tema.id_sub_tema', 'INNER');
        $this->db->where('materi.id_sub_tema', $id);
        $materi = $this->db->get()->result_array();

        $i = 0;
        foreach ($materi as $dataMateri) {
            $res[$i] = [
                'judul_materi' => $dataMateri['judul_materi'],
                'isi_materi' => $dataMateri['isi_materi'],
                'gambar' => $dataMateri['gambar']
            ];

            $i++;
        }

        foreach ($materi as $m) {
            $result = [
                'id_sub_tema' => $m['id_sub_tema'],
                'judul' => $m['judul'],
                'materi' => $res
            ];
        }

        return $result;
    }

    public function createMateri($data)
    {
        $this->db->insert('materi', $data);
        return $this->db->affected_rows();
    }

    public function updateMateri($data, $id_materi)
    {
        $this->db->update('materi', $data, ['id_materi' => $id_materi]);
        return $this->db->affected_rows();
    }

    public function deleteMateri($id_materi)
    {
        $this->db->delete('materi', ['id_materi' => $id_materi]);
        return $this->db->affected_rows();
    }
}

/* End of file Materi_model.php */
