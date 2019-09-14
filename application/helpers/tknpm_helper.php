<?php

function is_logged_in()
{
    $tknpm = get_instance();
    if (!$tknpm->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $tknpm->session->userdata('role_id');
        $menu = $tknpm->uri->segment(1);

        $queryMenu = $tknpm->db->get_where('tknpm_menu', ['menu' => $menu])->row_array();

        $menuId = $queryMenu['id'];

        $userAccess = $tknpm->db->get_where('tknpm_access_menu', ['role_id' => $role_id, 'menu_id' => $menuId]);

        // var_dump($menuId);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
function is_logged_in2()
{
    $tknpm = get_instance();
    if (!$tknpm->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $tknpm->session->userdata('role_id');
        $menu = $tknpm->uri->segment(1);

        $queryMenu = $tknpm->db->get_where('tknpm_sub_menu', ['url' => $menu])->row_array();

        $menuId = $queryMenu['menu_id'];

        $userAccess = $tknpm->db->get_where('tknpm_access_menu', ['role_id' => $role_id, 'menu_id' => $menuId]);
        // var_dump($menuId);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
