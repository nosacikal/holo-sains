<?php


defined('BASEPATH') or exit('No direct script access allowed');

class SubTema_Model extends CI_Model
{
    public function getSubTema($id = null)
    {
        if ($id == null) {
            return $this->db->get('sub_tema')->result_array();
        } else {
            return $this->db->get_where('sub_tema', ['id_sub_tema' => $id])->result_array();
        }
    }
}

/* End of file SubTema.php */
