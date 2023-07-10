<?php

class ZoneCRUDModel extends CI_Model
{

    public function get_itemCRUD()
    {
        $query = $this->db->get("tb_zone");
        return $query->result();
    }

    public function get_lastID()
    {
        $this->db->select_max('id_zone');
        $query = $this->db->get("tb_zone");
        return $query->result();
    }
    public function insert_item()
    {
        $data = array(
            'id_zone' => $this->input->post('id_zone'),
            'zone_name_thai' => $this->input->post('zone_name'),
        );

        return [$this->db->insert('tb_zone', $data), $data];
        //return data because datatable require draw() tr
    }

    public function delete_item($id)
    {
        try {
            $this->db->delete('tb_zone', array('id_zone' => $id));
            // echo $this->db->affected_rows();
        } catch (Exception $e) {
            log_message('error ', $e->getMessage());
            // return $this->db->error();
            return false;
        }
    }

}