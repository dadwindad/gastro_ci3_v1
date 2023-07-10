<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dish extends CI_Controller
{
    public $dishCRUD;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('DishCRUDModel');
        $this->dishCRUD = new DishCRUDModel;

        $this->load->model('ZoneCRUDModel');
        $this->zoneCRUD = new ZoneCRUDModel;

    }

    public function index()
    {
        $this->session->set_userdata('previous_url', current_url());

        $data['data'] = $this->dishCRUD->get_itemCRUD();
        $data['zone'] = $this->zoneCRUD->get_itemCRUD();

        $this->load->view('dish/header');
        $this->load->view('theme/menu');
        $this->load->view('dish/index', $data);
        $this->load->view('theme/footer');
        $this->load->view('dish/footer');
    }

    public function json()
    {
        $item = $this->dishCRUD->get_itemCRUD();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function show($id)
    {
        $item = $this->dishCRUD->find_item($id);

        $this->load->view('theme/header');
        $this->load->view('dish/show', array('item' => $item));
        $this->load->view('theme/footer');
    }

    public function create()
    {
        $this->load->view('theme/header');
        $this->load->view('dish/create');
        $this->load->view('theme/footer');
    }

    public function insert()
    {
        if ($this->session->has_userdata('email')) {
            $result = $this->dishCRUD->insert_item();

            //json for update datatable
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else
            redirect(base_url('login'));

    }

    public function edit($id)
    {
        $item = $this->dishCRUD->find_item($id);

        $this->load->view('theme/header');
        $this->load->view('dish/edit', array('item' => $item));
        $this->load->view('theme/footer');
    }

    public function update($id)
    {
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('errors', validation_errors());
        //     redirect(base_url('dish/edit/' . $id));
        // } else {
        //     $this->dishCRUD->update_item($id);
        //     redirect(base_url('dish'));
        // }

        $this->dishCRUD->update_item($id);
        $result = $this->dishCRUD->find_item($id);
        //json for update datatable
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);

    }
    public function find_last_id($zone)
    {
        $item = $this->dishCRUD->get_lastID($zone);
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function delete($id)
    {
        // $item = $this->dishCRUD->delete_item($id);
        $item = $this->dishCRUD->delete_item($id);

        // redirect(base_url('dish'));
    }
}