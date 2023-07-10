<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attraction extends CI_Controller
{
   public $attractionCRUD, $zoneCRUD;

   public function __construct()
   {
      parent::__construct();

      // $this->load->library('form_validation');

      $this->load->model('AttractionCRUDModel');
      $this->attractionCRUD = new AttractionCRUDModel;

      $this->load->model('ZoneCRUDModel');
      $this->zoneCRUD = new ZoneCRUDModel;
   }

   public function index()
   {
      $this->session->set_userdata('previous_url', current_url());

      $data['data'] = $this->attractionCRUD->get_itemCRUD();
      $data['zone'] = $this->zoneCRUD->get_itemCRUD();

      $this->load->view('attraction/header');
      $this->load->view('theme/menu');
      $this->load->view('attraction/index', $data);
      $this->load->view('theme/footer');
      $this->load->view('attraction/footer');
   }

   public function json()
   {
      $item = $this->attractionCRUD->get_itemCRUD();
      header('Content-Type: application/json');
      echo json_encode($item, JSON_PRETTY_PRINT);
   }

   public function find_last_id($zone)
   {
      $item = $this->attractionCRUD->get_lastID($zone);
      header('Content-Type: application/json');
      echo json_encode($item, JSON_PRETTY_PRINT);
   }

   public function insert()
   {
      // $this->form_validation->set_rules('title', 'Title', 'required');
      // $this->form_validation->set_rules('description', 'Description', 'required');

      if ($this->session->has_userdata('email')) {
         $result = $this->attractionCRUD->insert_item();

         //json for update datatable
         header('Content-Type: application/json');
         echo json_encode($result, JSON_PRETTY_PRINT);
      } else
         redirect(base_url('login'));

      // if ($this->form_validation->run() == FALSE) {
      //    $this->session->set_flashdata('errors', validation_errors());

      // } else {

      // }
   }

   public function edit($id)
   {
      $item = $this->attractionCRUD->find_item($id);

      $this->load->view('theme/header');
      $this->load->view('attraction/edit', array('item' => $item));
      $this->load->view('theme/footer');
   }

   public function update($id)
   {
      // $this->form_validation->set_rules('title', 'Title', 'required');
      // $this->form_validation->set_rules('description', 'Description', 'required');

      // if ($this->form_validation->run() == FALSE) {
      //    $this->session->set_flashdata('errors', validation_errors());
      //    redirect(base_url('attraction/edit/' . $id));
      // } else {
      //    $this->attractionCRUD->update_item($id);
      //    redirect(base_url('attraction'));
      // }

      $this->attractionCRUD->update_item($id);
      $result = $this->attractionCRUD->find_item($id);
      //json for update datatable
      header('Content-Type: application/json');
      echo json_encode($result, JSON_PRETTY_PRINT);
   }

   public function delete($id)
   {
      $this->attractionCRUD->delete_item($id);
      // redirect(base_url('attraction'));
      // echo $id;
      // var_dump($result);

   }

}