<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Community extends CI_Controller
{
	public $communityCRUD;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('CommunityCRUDModel');
		$this->communityCRUD = new CommunityCRUDModel;

		$this->load->model('ZoneCRUDModel');
		$this->zoneCRUD = new ZoneCRUDModel;
	}

	public function index()
	{
		$this->session->set_userdata('previous_url', current_url());

		$data['data'] = $this->communityCRUD->get_itemCRUD();
		$data['zone'] = $this->zoneCRUD->get_itemCRUD();

		$this->load->view('community/header');
		$this->load->view('theme/menu');
		$this->load->view('community/index', $data);
		$this->load->view('theme/footer');
		$this->load->view('community/footer');
	}

	public function json()
	{
		$item = $this->communityCRUD->get_itemCRUD();
		header('Content-Type: application/json');
		echo json_encode($item, JSON_PRETTY_PRINT);
	}

	public function find_last_id($zone)
	{
		$item = $this->communityCRUD->get_lastID($zone);
		header('Content-Type: application/json');
		echo json_encode($item, JSON_PRETTY_PRINT);
	}

	public function insert()
	{
		if ($this->session->has_userdata('email')) {
			$result = $this->communityCRUD->insert_item();

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
		// 	redirect(base_url('community/edit/' . $id));
		// } else {
		// 	$this->communityCRUD->update_item($id);
		// 	redirect(base_url('community'));
		// }

		$this->communityCRUD->update_item($id);
		$result = $this->communityCRUD->find_item($id);
		//json for update datatable
		header('Content-Type: application/json');
		echo json_encode($result, JSON_PRETTY_PRINT);

	}

	public function delete($id)
	{
		$item = $this->communityCRUD->delete_item($id);
		// redirect(base_url('community'));
	}
}