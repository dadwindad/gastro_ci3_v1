<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateFolder extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
   }

   function UploadFolder($folder, $id)
   {
      $zone = substr($id, 0, 3);
      $subid = substr($id, -4);
      // File upload configuration 

      $path = FCPATH . '../mobile/images/map/' . $zone . "/" . $subid . "/" . $folder;
      try {
         // if (!file_exists($path)) {
         if (mkdir($path, 0755, true))
            echo "success";
      } catch (Exception $e) {
         echo $e;
      }
   }
}
?>