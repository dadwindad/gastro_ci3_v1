<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ingredient extends CI_Controller
{
    public $ingredientCRUD;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('IngredientCRUDModel');
        $this->ingredientCRUD = new IngredientCRUDModel;

        $this->load->model('ZoneCRUDModel');
        $this->zoneCRUD = new ZoneCRUDModel;

    }

    public function index()
    {
        $this->session->set_userdata('previous_url', current_url());

        $data['data'] = $this->ingredientCRUD->get_itemCRUD();
        $data['zone'] = $this->zoneCRUD->get_itemCRUD();

        $this->load->view('ingredient/header');
        $this->load->view('theme/menu');
        $this->load->view('ingredient/index', $data);
        $this->load->view('theme/footer');
        $this->load->view('ingredient/footer');
    }

    public function json()
    {
        $item = $this->ingredientCRUD->get_itemCRUD();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function insert()
    {
        if ($this->session->has_userdata('email')) {
            $result = $this->ingredientCRUD->insert_item();

            //json for update datatable
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else
            redirect(base_url('login'));
    }

    public function edit($id)
    {
        $item = $this->ingredientCRUD->find_item($id);

        $this->load->view('theme/header');
        $this->load->view('ingredient/edit', array('item' => $item));
        $this->load->view('theme/footer');
    }


    public function update($id)
    {
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('errors', validation_errors());
        //     redirect(base_url('ingredient/edit/' . $id));
        // } else {
        //     $this->ingredientCRUD->update_item($id);
        //     redirect(base_url('ingredient'));
        // }

        $this->ingredientCRUD->update_item($id);
        $result = $this->ingredientCRUD->find_item($id);
        //json for update datatable
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);

    }

    public function find_last_id($zone)
    {
        $item = $this->ingredientCRUD->get_lastID($zone);
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function delete($id)
    {
        $item = $this->ingredientCRUD->delete_item($id);
        // redirect(base_url('dient'));
    }
}