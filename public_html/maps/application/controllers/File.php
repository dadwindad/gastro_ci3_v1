<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
   }

   function dragDropUpload($folder, $id)
   {
      if (!empty($_FILES)) {
         $zone = substr($id, 0, 3);
         $subid = substr($id, -4);
         // File upload configuration //FCPATH . '../
         $uploadPath = FCPATH . '../mobile/images/map/' . $zone . "/" . $subid . "/" . $folder;
         $config['upload_path'] = $uploadPath;
         $config['allowed_types'] = '*';
         $config['overwrite'] = TRUE;

         // Load and initialize upload library 
         $this->load->library('upload', $config);
         $this->upload->initialize($config);

         // Upload file to the server 
         if ($this->upload->do_upload('file')) {
            // $fileData = $this->upload->data();
            // $uploadData['file_name'] = $fileData['file_name'];
            // $uploadData['uploaded_on'] = date("Y-m-d H:i:s");

            // Insert files info into the database 
            // $insert = $this->file->insert($uploadData);
            exit;
         }
      }
   }

   function unlinkFileID($table, $id)
   {
      $zone = substr($id, 0, 3);
      $subid = substr($id, -4);
      // File upload configuration //FCPATH . '../
      $path = FCPATH . '../mobile/images/map/' . $zone . "/" . $subid . "/" . $table;
      delete_directory($path);
   }

   function unlinkFile($folder, $id, $filename)
   {
      $zone = substr($id, 0, 3);
      $subid = substr($id, -4);
      // File upload configuration //FCPATH . '../
      $path = FCPATH . '../mobile/images/map/' . $zone . "/" . $subid . "/" . $folder . "/" . $filename;
      unlink($path);

   }

   function getFilename($folder, $id, $num)
   {
      $zone = substr($id, 0, 3);
      $subid = substr($id, -4);
      $path = FCPATH . '../mobile/images/map/' . $zone . "/" . $subid . "/" . $folder;
      $files = scandir($path);
      $num = $num ? $num : 1;

      header('Content-Type: application/json');
      echo json_encode(array_slice($files, 2, $num), JSON_PRETTY_PRINT); // because [0] = "." [1] = ".." 
   }

   function getAllFile()
   {
      $this->load->helper('directory');

      $path = FCPATH . '../mobile/images/map/';
      $map = directory_map($path);

      // var_dump($map);
      // echo gettype($map);

      header('Content-Type: application/json');
      echo json_encode($map, JSON_PRETTY_PRINT);
   }
}

/////////////////////////////////////////////////outside function//////////////////////////////////////////////////////
function delete_directory($dir)
{
   if (!file_exists($dir)) {
      return true;
   }

   if (!is_dir($dir)) {
      return unlink($dir);
   }

   foreach (scandir($dir) as $item) {
      if ($item == '.' || $item == '..') {
         continue;
      }

      if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
         return false;
      }
   }

   return rmdir($dir);
}
?>