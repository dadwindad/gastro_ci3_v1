<?php

class IngredientCRUDModel extends CI_Model
{

    public function get_itemCRUD()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('ingred_name_thai', $this->input->get("search"));
            // $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("tb_ingredient");
        return $query->result();
    }

    public function get_lastID($zone)
    {
        $this->db->select_max('ingred_id');
        $this->db->like('ingred_id', $zone);
        $query = $this->db->get("tb_ingredient");
        return $query->result();
    }



    public function insert_item()
    {
        $data = array(
            // 'ingred_id' => $this->input->post('ingred_id'),
            // 'ingred_name_thai' => $this->input->post('ingred_name_thai'),
            // 'ingred_name_eng' => $this->input->post('ingred_name_eng'),
            // 'ingred_type' => $this->input->post('ingred_type'),
            // 'ingred_lat' => $this->input->post('ingred_lat'),
            // 'ingred_long' => $this->input->post('ingred_long'),
            // 'ingred_detail' => $this->input->post('ingred_detail'),
            // 'ingred_story' => $this->input->post('ingred_story'),
            // 'ingred_ref' => $this->input->post('ingred_ref'),


            'ingred_id' => $this->input->post('ingred_id'),
            'ingred_name_thai' => $this->input->post('ingred_name_thai'),
            // 'ingred_name_eng' => $this->input->post('ingred_name_eng'),
            // 'ingred_type' => $this->input->post('ingred_type'),
            // 'ingred_lat' => $this->input->post('ingred_lat'),
            // 'ingred_long' => $this->input->post('ingred_long'),
            'ingred_detail' => $this->input->post('ingred_detail'),
            // 'ingred_story' => $this->input->post('ingred_story'),
            // 'ingred_ref' => $this->input->post('ingred_ref'),
        );

        //return [$this->db->insert('tb_community', $data), $data];\
        return [$this->db->insert('tb_ingredient', $data), $data];
    }


    public function update_item($id)
    {
        $data = array(
            // 'attr_id' => $this->input->post('attr_id'),
            // 'attr_name' => $this->input->post('attr_name'),
            // 'attr_history' => $this->input->post('attr_history'),
            // 'attr_lat' => $this->input->post('attr_lat'),
            // 'attr_long' => $this->input->post('attr_long'),
            // 'attr_address' => $this->input->post('attr_address'),
            // 'attr_social' => $this->input->post('attr_social'),
            // 'attr_tel' => $this->input->post('attr_tel'),
            // 'attr_opening' => $this->input->post('attr_opening'),
            // 'attr_travel' => $this->input->post('attr_travel'),
            // 'attr_highlight' => $this->input->post('attr_highlight'),
            // 'attr_type_id' => $this->input->post('attr_type_id'),
            // 'attr_tat_type_id' => $this->input->post('attr_tat_type_id'),
            // 'attr_comm_id' => $this->input->post('attr_comm_id'),
            // 'attr_ref' => $this->input->post('attr_ref'),


            'ingred_id' => $this->input->post('ingred_id'),
            'ingred_name_thai' => $this->input->post('ingred_name_thai'),
            // 'ingred_name_eng' => $this->input->post('ingred_name_eng'),
            // 'ingred_type' => $this->input->post('ingred_type'),
            // 'ingred_lat' => $this->input->post('ingred_lat'),
            // 'ingred_long' => $this->input->post('ingred_long'),
            'ingred_detail' => $this->input->post('ingred_detail'),
            // 'ingred_story' => $this->input->post('ingred_story'),
            // 'ingred_ref' => $this->input->post('ingred_ref'),

        );
        // if ($id == 0) {
        //     return $this->db->insert('tb_ingredient', $data);
        // } else {
        //     $this->db->where('id', $id);
        //     return $this->db->update('tb_ingredient', $data);
        // }

        if ($id != null) {
            $this->db->where('ingred_id', $id);
            return $this->db->update('tb_ingredient', $data);
        }

    }


    public function find_item($id)
    {
        return $this->db->get_where('tb_ingredient', array('ingred_id' => $id))->row();
    }


    public function delete_item($id)
    {
        return $this->db->delete('tb_ingredient', array('ingred_id' => $id));
    }


}