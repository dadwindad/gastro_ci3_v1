<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      // $this->load->helper('file');
      $this->load->helper('download');


      // $this->load->library('form_validation');
      // $this->load->library('session');
      // $this->load->model('AttractionCRUDModel');

      // $this->attractionCRUD = new AttractionCRUDModel;
   }


   public function img()
   {

      header("Content-type: image");

      // $file = getfile("./img/map/Z05/0036/restaurant/1.jpg");

      echo force_download("./img/map/Z05/0036/restaurant/1.jpg");

      // echo file_get_contents_curl($img);
      // echo $img;
      // echo readfile($img);

   }


}