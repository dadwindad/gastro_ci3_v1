<?php

class RestaurantCRUDModel extends CI_Model
{

    public function get_itemCRUD()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('rest_name_thai', $this->input->get("search"));
            // $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("tb_restaurant");
        return $query->result();
    }


    public function insert_item()
    {
        $data = array(
            'rest_id' => $this->input->post('rest_id'),
            'rest_name_thai' => $this->input->post('rest_name_thai'),
            // 'rest_name_eng' => $this->input->post('rest_name_eng'),
            'rest_highlight' => $this->input->post('rest_highlight'),
            // 'rest_openning' => $this->input->post('rest_openning'),
            // 'rest_social' => $this->input->post('rest_social'),
            // 'rest_tel' => $this->input->post('rest_tel'),
            'rest_lat' => $this->input->post('rest_lat'),
            'rest_long' => $this->input->post('rest_long'),
            // 'rest_address' => $this->input->post('rest_address'),
            // 'rest_region' => $this->input->post('rest_region'),
            // 'rest_province' => $this->input->post('rest_province'),
            // 'rest_menu' => $this->input->post('rest_menu'),
            // 'rest_attraction' => $this->input->post('rest_attraction'),
            // 'rest_ref' => $this->input->post('rest_ref'),
        );

        return [$this->db->insert('tb_restaurant', $data), $data];
    }

    public function get_lastID($zone)
    {
        $this->db->select_max('rest_id');
        $this->db->like('rest_id', $zone);
        $query = $this->db->get("tb_restaurant");
        return $query->result();
    }

    public function update_item($id)
    {
        $data = array(
            'rest_id' => $this->input->post('rest_id'),
            'rest_name_thai' => $this->input->post('rest_name_thai'),
            // 'rest_name_eng' => $this->input->post('rest_name_eng'),
            'rest_highlight' => $this->input->post('rest_highlight'),
            // 'rest_openning' => $this->input->post('rest_openning'),
            // 'rest_social' => $this->input->post('rest_social'),
            // 'rest_tel' => $this->input->post('rest_tel'),
            'rest_lat' => $this->input->post('rest_lat'),
            'rest_long' => $this->input->post('rest_long'),
            // 'rest_address' => $this->input->post('rest_address'),
            // 'rest_region' => $this->input->post('rest_region'),
            // 'rest_province' => $this->input->post('rest_province'),
            // 'rest_menu' => $this->input->post('rest_menu'),
            // 'rest_attraction' => $this->input->post('rest_attraction'),
            // 'rest_ref' => $this->input->post('rest_ref'),
        );
        // if ($id == 0) {
        //     return $this->db->insert('tb_restaurant', $data);
        // } else {
        //     $this->db->where('rest_id', $id);
        //     return $this->db->update('tb_restaurant', $data);
        // }

        if ($id != null) {
            $this->db->where('rest_id', $id);
            return $this->db->update('tb_restaurant', $data);
        }

    }


    public function find_item($id)
    {
        return $this->db->get_where('tb_restaurant', array('rest_id' => $id))->row();
    }


    public function delete_item($id)
    {
        return $this->db->delete('tb_restaurant', array('rest_id' => $id));
    }
}