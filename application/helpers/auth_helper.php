<?php
function admin_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_admin')) {
        redirect('Auth');
    }
}
function sadmin_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_sadmin')) {
        redirect('Auth');
    }
}
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_user')) {
        redirect('Auth');
    }
}
