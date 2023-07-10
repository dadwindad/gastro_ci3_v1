<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public $userCRUD;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session']);

        $this->load->model('UserCRUDModel');
        $this->userCRUD = new UserCRUDModel;
    }

    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login/header');
            $this->load->view('login/login');
            $this->load->view('login/footer');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tb_user', ['email' => $email])->row();

            if (!$user) {
                $this->session->set_flashdata('login_error', 'กรุณาตรวจสอบอีเมล์ หรือ รหัสผ่าน อีกครั้ง', 300);
                redirect(uri_string());
            }

            $password = $this->input->post('password');
            if (!password_verify($password, $user->password)) {
                $this->session->set_flashdata('login_error', 'กรุณาตรวจสอบอีเมล์ หรือ รหัสผ่าน', 300);
                redirect(uri_string());
            }

            $data = array(
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
            );

            $this->session->set_userdata($data);

            redirect($this->session->userdata('previous_url')); // redirect to ref page
            echo 'Login success!';
            exit;

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect($this->session->userdata('previous_url'));
    }

    public function profile()
    {
        $this->session->set_userdata('previous_url', current_url());

        if ($this->session->has_userdata('email')) {

            $email = $this->session->email;
            $user = $this->db->get_where('tb_user', ['email' => $email])->row();

            $this->load->view('attraction/header');
            $this->load->view('theme/menu');
            $this->load->view('user/index', array('user' => $user));
            $this->load->view('theme/footer');
            $this->load->view('user/footer');

        } else
            redirect(base_url('login'));
    }

    public function json()
    {
        $item = $this->userCRUD->get_itemCRUD();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function find_last_id()
    {
        $item = $this->userCRUD->get_lastID();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function insert()
    {
        if ($this->session->has_userdata('email')) {

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('user/index');
            } else {

                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $password = $this->input->post('password_confirm');

                $user = $this->db->get_where('tb_user', ['email' => $email])->row();

                if ($user) {
                    $this->session->set_flashdata('signup_error', 'อีเมล์นี้ลงทะเบียนแล้ว', 300);
                    redirect(uri_string());
                }
                $result = $this->userCRUD->insert_item();
                //json for update datatable
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT);

            }
        } else
            redirect(base_url('login'));
    }

    public function delete($email)
    {
        $this->userCRUD->delete_item($email);
    }

}