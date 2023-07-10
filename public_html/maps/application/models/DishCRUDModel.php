<?php

class DishCRUDModel extends CI_Model
{

    public function get_itemCRUD()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('dish_name_thai', $this->input->get("search"));
            // $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("tb_dish");
        return $query->result();
    }

    public function get_lastID($zone)
    {
        $this->db->select_max('dish_id');
        $this->db->like('dish_id', $zone);
        $query = $this->db->get("tb_dish");
        return $query->result();
    }

    public function insert_item()
    {
        $data = array(
            'dish_id' => $this->input->post('dish_id'),
            'dish_name_thai' => $this->input->post('dish_name_thai'),
            'dish_detail' => $this->input->post('dish_detail'),
            // 'dish_story' => $this->input->post('dish_story'),
            // 'dish_made' => $this->input->post('dish_made'),
            // 'dish_eat' => $this->input->post('dish_eat'),
            // 'dish_season' => $this->input->post('dish_season'),
            // 'dish_price' => $this->input->post('dish_price'),
            // 'dish_made_type' => $this->input->post('dish_made_type'),
            // 'dish_food_type' => $this->input->post('dish_food_type'),
            // 'dish_region' => $this->input->post('dish_region'),
            // 'dish_food_info' => $this->input->post('dish_food_info'),
            // 'dish_health_info' => $this->input->post('dish_health_info'),
            // 'dish_ingredients' => $this->input->post('dish_ingredients'),
            // 'dish_restaurants' => $this->input->post('dish_restaurants'),
            // 'dish_community' => $this->input->post('dish_community'),
            // 'dish_ref' => $this->input->post('dish_ref'),
        );

        return [$this->db->insert('tb_dish', $data), $data];
    }


    public function update_item($id)
    {
        $data = array(
            'dish_id' => $this->input->post('dish_id'),
            'dish_name_thai' => $this->input->post('dish_name_thai'),
            'dish_detail' => $this->input->post('dish_detail'),
            // 'dish_story' => $this->input->post('dish_story'),
            // 'dish_made' => $this->input->post('dish_made'),
            // 'dish_eat' => $this->input->post('dish_eat'),
            // 'dish_season' => $this->input->post('dish_season'),
            // 'dish_price' => $this->input->post('dish_price'),
            // 'dish_made_type' => $this->input->post('dish_made_type'),
            // 'dish_food_type' => $this->input->post('dish_food_type'),
            // 'dish_region' => $this->input->post('dish_region'),
            // 'dish_food_info' => $this->input->post('dish_food_info'),
            // 'dish_health_info' => $this->input->post('dish_health_info'),
            // 'dish_ingredients' => $this->input->post('dish_ingredients'),
            // 'dish_restaurants' => $this->input->post('dish_restaurants'),
            // 'dish_community' => $this->input->post('dish_community'),
            // 'dish_ref' => $this->input->post('dish_ref'),
        );
        // if ($id == 0) {
        //     return $this->db->insert('tb_dish', $data);
        // } else {
        //     $this->db->where('dish_id', $id);
        //     return $this->db->update('tb_dish', $data);
        // }

        if ($id != null) {
            $this->db->where('dish_id', $id);
            return $this->db->update('tb_dish', $data);
        }

    }


    public function find_item($id)
    {
        return $this->db->get_where('tb_dish', array('dish_id' => $id))->row();
    }


    public function delete_item($id)
    {
        return $this->db->delete('tb_dish', array('dish_id' => $id));
    }
}