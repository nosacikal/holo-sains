<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Soal_Evaluasi_model extends CI_Model
{

    public function getSoalEvaluasi($id = null)
    {
        if ($id == null) {
            $this->db->select('*');
            $this->db->from('soal_evaluasi');
            $this->db->join('sub_tema', 'sub_tema.id_sub_tema = soal_evaluasi.id_sub_tema', 'left');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('soal_evaluasi');
            $this->db->join('sub_tema', 'sub_tema.id_sub_tema = soal_evaluasi.id_sub_tema');
            $this->db->where('soal_evaluasi.id_soal_evaluasi', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function getSoalEvalusiWithSubTema($id)
    {
        $this->db->select('*');
        $this->db->from('soal_evaluasi');
        $this->db->join('sub_tema', 'soal_evaluasi.id_sub_tema = sub_tema.id_sub_tema');
        $this->db->where('soal_evaluasi.id_sub_tema', $id);
        $soal_evaluasi = $this->db->get()->result_array();

        $i = 0;
        foreach ($soal_evaluasi as $dataSoalEvalusi) {
            $res[$i] = [
                'id_soal_evaluasi' => $dataSoalEvalusi['id_soal_evaluasi'],
                'pertanyaan' => $dataSoalEvalusi['pertanyaan'],
                'jawaban_benar' => $dataSoalEvalusi['jawaban_benar'],
                'pilihan_1' => $dataSoalEvalusi['pilihan_1'],
                'pilihan_2' => $dataSoalEvalusi['pilihan_2'],
                'pilihan_3' => $dataSoalEvalusi['pilihan_3'],
                'pilihan_4' => $dataSoalEvalusi['pilihan_4'],
                'gambar' => $dataSoalEvalusi['gambar']
            ];

            $i++;
        }

        foreach ($soal_evaluasi as $s) {
            $result = [
                'id_sub_tema' => $s['id_sub_tema'],
                'judul' => $s['judul'],
                'soal' => $res
            ];
        }

        return $result;
    }

    public function deleteSoalEvalusi($id)
    {
        $this->db->delete('soal_evaluasi', ['id_soal_evaluasi' => $id]);
        return $this->db->affected_rows();
    }

    public function createSoalEvaluasi($data)
    {
        $this->db->insert('soal_evaluasi', $data);
        return $this->db->affected_rows();
    }

    public function updateSoalEvaluasi($data, $id)
    {
        $this->db->update('soal_evaluasi', $data, ['id_soal_evaluasi' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Soal_model.php */
