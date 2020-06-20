<?php

function getSessionGuru()
{
    $instance = get_instance();
    $instance->db->select('*');
    $instance->db->from('guru');
    $instance->db->join('kelas', 'kelas.id_guru = guru.id_guru');
    $instance->db->where('nip', $instance->session->userdata('nip'));
    $query = $instance->db->get()->row_array();
    return $query;
}
