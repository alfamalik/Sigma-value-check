<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'My Profile';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
    }

    public function change_password()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[3]|matches[repeat_password]');
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|trim|min_length[3]|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Change Password';
            $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/change_password', $data);
        } else {
            $password_hash = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            $username = $this->session->userdata('username');

            $this->db->set('password', $password_hash);
            $this->db->where('username', $username);
            $this->db->update('users');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed!</div>');
            redirect('user/change_password');
        }
    }

    public function edit_profile()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_profile', $data);
        } else {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $birthdate = $this->input->post('birthdate');
            $username = $this->session->userdata('username');
            $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));

            // Mengecek jika ada file gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

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
            $this->db->set('name', $name);
            $this->db->set('address', $address);
            $this->db->set('birthdate', $birthdate);
            $this->db->where('username', $username);
            $this->db->update('users');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile has been edited!</div>');
            redirect('user');
        }
    }
}
