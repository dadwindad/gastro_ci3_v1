<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gastro extends CI_Controller
{
    public $gastroModel;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('GastroModel');

        $this->gastroModel = new GastroModel;
    }

    public function index()
    {
        $this->session->set_userdata('previous_url', current_url());

        // $data['region'] = $this->gastroModel->get_itemSelectRegion();
        // $data['food'] = $this->gastroModel->get_itemSelectFood();
        // $data['attr'] = $this->gastroModel->get_itemSelectAttration();
        // $data['rest'] = $this->gastroModel->get_itemSelectRestaurant();
        // $data['province'] = $this->gastroModel->get_itemSelectProvince();

        $this->load->view('gastro/header');
        $this->load->view('theme/menu');
        // $this->load->view('gastro/map');
        // $this->load->view('gastro/map', $data);
        $this->load->view('gastro/map');
        $this->load->view('theme/footer');
        $this->load->view('gastro/footer');
    }

    public function jsonFilter()
    {
        $data['region'] = $this->gastroModel->get_itemSelectRegion();
        $data['food'] = $this->gastroModel->get_itemSelectFood();
        $data['attr'] = $this->gastroModel->get_itemSelectAttration();
        $data['rest'] = $this->gastroModel->get_itemSelectRestaurant();
        $data['province'] = $this->gastroModel->get_itemSelectProvince();
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function filter()
    {
        $item = $this->gastroModel->get_allItemFilter();
        header('Content-Type: application/json');
        echo json_encode($item, JSON_PRETTY_PRINT);
    }

    public function show($id)
    {
        $item = $this->gastroModel->find_item($id);

        $this->load->view('theme/header');
        $this->load->view('dish/show', array('item' => $item));
        $this->load->view('theme/footer');
    }


}