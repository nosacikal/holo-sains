<?php

function cekLogin()
{
    $instance = get_instance();
    if (!$instance->session->userdata('nip')) {
        redirect('auth');
    }
}
