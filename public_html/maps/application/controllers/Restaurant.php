<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restaurant extends CI_Controller
{
	public $restaurantCRUD;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('RestaurantCRUDModel');
		$this->restaurantCRUD = new RestaurantCRUDModel;

		$this->load->model('ZoneCRUDModel');
		$this->zoneCRUD = new ZoneCRUDModel;
	}

	public function index()
	{
		$this->session->set_userdata('previous_url', current_url());

		$data['data'] = $this->restaurantCRUD->get_itemCRUD();
		$data['zone'] = $this->zoneCRUD->get_itemCRUD();

		$this->load->view('restaurant/header');
		$this->load->view('theme/menu');
		$this->load->view('restaurant/index', $data);
		$this->load->view('theme/footer');
		$this->load->view('restaurant/footer');
	}

	public function json()
	{
		$item = $this->restaurantCRUD->get_itemCRUD();
		header('Content-Type: application/json');
		echo json_encode($item, JSON_PRETTY_PRINT);
	}

	public function show($id)
	{
		$item = $this->restaurantCRUD->find_item($id);

		$this->load->view('theme/header');
		$this->load->view('restaurant/show', array('item' => $item));
		$this->load->view('theme/footer');
	}

	public function create()
	{
		$this->load->view('theme/header');
		$this->load->view('restaurant/create');
		$this->load->view('theme/footer');
	}

	public function find_last_id($zone)
	{
		$item = $this->restaurantCRUD->get_lastID($zone);
		header('Content-Type: application/json');
		echo json_encode($item, JSON_PRETTY_PRINT);
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('restaurant/create'));
		} else {
			$this->restaurantCRUD->insert_item();
			redirect(base_url('restaurant'));
		}
	}

	public function edit($id)
	{
		$item = $this->restaurantCRUD->find_item($id);

		$this->load->view('theme/header');
		$this->load->view('restaurant/edit', array('item' => $item));
		$this->load->view('theme/footer');
	}

	public function insert()
	{
		if ($this->session->has_userdata('email')) {
			$result = $this->restaurantCRUD->insert_item();

			//json for update datatable
			header('Content-Type: application/json');
			echo json_encode($result, JSON_PRETTY_PRINT);
		} else
			redirect(base_url('login'));
	}

	public function update($id)
	{
		// $this->form_validation->set_rules('title', 'Title', 'required');
		// $this->form_validation->set_rules('description', 'Description', 'required');

		// if ($this->form_validation->run() == FALSE) {
		// 	$this->session->set_flashdata('errors', validation_errors());
		// 	redirect(base_url('restaurant/edit/' . $id));
		// } else {
		// 	$this->restaurantCRUD->update_item($id);
		// 	redirect(base_url('restaurant'));
		// }

		$this->restaurantCRUD->update_item($id);
		$result = $this->restaurantCRUD->find_item($id);
		//json for update datatable
		header('Content-Type: application/json');
		echo json_encode($result, JSON_PRETTY_PRINT);

	}

	public function delete($id)
	{
		$item = $this->restaurantCRUD->delete_item($id);
		//redirect(base_url('restaurant'));
	}
}