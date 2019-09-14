<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $name = $this->input->post('fullname');
            $user = $this->input->post('username');


            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('fullname', $name);
            $this->db->where('username', $user);
            $this->db->update('tknpm_login');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Success</div>');
            redirect('user/edit');
        }
    }
    public function ganti()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('tknpm_login', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('currentPass', 'Password', 'required|trim');
        // $this->form_validation->set_rules('newPass1', 'Password', 'required|trim|matches[newPass2]');
        // $this->form_validation->set_rules('newPass2', 'Password', 'required|trim|matches[newPass1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ganti', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $currentPass = $this->input->post('currentPass');
            $newPass = $this->input->post('newPass1');
            $newPass2 = $this->input->post('newPass2');
            if (!password_verify($currentPass, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                redirect('user/ganti');
            } else {

                if ($currentPass == $newPass || $currentPass == $newPass2) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama tidak boleh sama dengan Password Baru</div>');
                    redirect('user/ganti');
                } else {
                    if ($newPass != $newPass2) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru dan Ulangi Password tidak sama</div>');
                        redirect('user/ganti');
                    } else {

                        $passwordHash = password_hash($newPass, PASSWORD_DEFAULT);

                        $this->db->set('password', $passwordHash);
                        $this->db->where('username', $this->session->userdata('username'));
                        $this->db->update('tknpm_login');

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change password Success</div>');
                        redirect('user/ganti');
                    }
                }
            }
        }
    }
}
