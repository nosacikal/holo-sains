<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getSiswa($id = null)
    {
        if ($id == null) {
            return $this->db->get('siswa')->result_array();
        } else {
            return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
        }
    }

    public function getSiswaWithKelas($id = null)
    {
        if ($id == null) {
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
            $this->db->where('siswa.id_kelas', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function deleteSiswa($id)
    {
        $this->db->delete('siswa', ['id_siswa' => $id]);
        return $this->db->affected_rows();
    }

    public function createSiswa($data)
    {
        $this->db->insert('siswa', $data);
        return $this->db->affected_rows();
    }

    public function updateSiswa($data, $id)
    {
        $this->db->update('siswa', $data, ['id_siswa' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Siswa_model.php */
