<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zone extends CI_Controller
{
    public $zoneCRUD;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ZoneCRUDModel');
        $this->zoneCRUD = new ZoneCRUDModel;
    }

    public function index()
    {
        $this->session->set_userdata('previous_url', current_url());

        if ($this->session->has_userdata('email')) {
            $this->load->view('attraction/header');
            $this->load->view('theme/menu');
            $this->load->view('zone/index');
            $this->load->view('theme/footer');
            $this->load->view('zone/footer');
        } else
            redirect(base_url('login'));
    }

    public function json()
    {
        $item = $this->zoneCRUD->get_itemCRUD();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function find_last_id()
    {
        $item = $this->zoneCRUD->get_lastID();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function insert()
    {
        if ($this->session->has_userdata('email')) {
            $result = $this->zoneCRUD->insert_item();

            //json for update datatable
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else
            redirect(base_url('login'));
    }

    // public function edit($id)
    // {
    //     $item = $this->dishCRUD->find_item($id);

    //     $this->load->view('theme/header');
    //     $this->load->view('dish/edit', array('item' => $item));
    //     $this->load->view('theme/footer');
    // }

    // public function update($id)
    // {
    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('description', 'Description', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->session->set_flashdata('errors', validation_errors());
    //         redirect(base_url('dish/edit/' . $id));
    //     } else {
    //         $this->dishCRUD->update_item($id);
    //         redirect(base_url('dish'));
    //     }
    // }

    public function delete($id)
    {
        $this->zoneCRUD->delete_item($id);
    }
}