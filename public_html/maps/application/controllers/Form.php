<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
	public function community()
	{
		$this->load->view('form/community');
	}

	public function showCommunity()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'lname' => $this->input->post('lname'),
		);

		$this->load->view('form/com_view', $data);

		// echo "<pre>";
		// print_r(($_POST));
		// echo "</pre>";

	}
}