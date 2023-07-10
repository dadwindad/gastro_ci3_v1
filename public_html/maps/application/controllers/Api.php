<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
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
            $this->load->view('api/index');
            $this->load->view('theme/footer');
            $this->load->view('api/footer');
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

    public function store()
    {
        if ($this->session->has_userdata('email')) {
            $result = $this->zoneCRUD->insert_item();

            //json for update datatable
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else
            redirect(base_url('login'));
    }

    public function delete($id)
    {
        $this->zoneCRUD->delete_item($id);
    }
}