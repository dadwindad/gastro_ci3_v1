<?php

class CommunityCRUDModel extends CI_Model
{

    public function get_itemCRUD()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('comm_name', $this->input->get("search"));
            // $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("tb_community");
        return $query->result();
    }

    public function get_lastID($zone)
    {
        $this->db->select_max('comm_id');
        $this->db->like('comm_id', $zone);
        $query = $this->db->get("tb_community");
        return $query->result();
    }

    public function insert_item()
    {
        $data = array(
            'comm_id' => $this->input->post('comm_id'),
            'comm_name' => $this->input->post('comm_name'),
            'comm_detail' => $this->input->post('comm_detail'),
            'comm_story' => $this->input->post('comm_story'),
            'comm_activity' => $this->input->post('comm_activity'),
            'comm_lat' => $this->input->post('comm_lat'),
            'comm_long' => $this->input->post('comm_long'),
            'comm_address' => $this->input->post('comm_address'),
            'comm_ref' => $this->input->post('comm_ref'),
        );

        return [$this->db->insert('tb_community', $data), $data];
    }


    public function update_item($id)
    {
        $data = array(
            'comm_id' => $this->input->post('comm_id'),
            // 'comm_name' => $this->input->post('comm_name'),
            'comm_detail' => $this->input->post('comm_detail'),
            'comm_story' => $this->input->post('comm_story'),
            'comm_activity' => $this->input->post('comm_activity'),
            'comm_lat' => $this->input->post('comm_lat'),
            'comm_long' => $this->input->post('comm_long'),
            'comm_address' => $this->input->post('comm_address'),
            'comm_ref' => $this->input->post('comm_ref'),
        );
        // if ($id == 0) {
        //     return $this->db->insert('tb_community', $data);
        // } else {
        //     $this->db->where('id', $id);
        //     return $this->db->update('tb_community', $data);
        // }

        if ($id != null) {
            $this->db->where('comm_id', $id);
            return $this->db->update('tb_community', $data);
        }

    }


    public function find_item($id)
    {
        return $this->db->get_where('tb_community', array('comm_id' => $id))->row();
    }


    public function delete_item($id)
    {
        return $this->db->delete('tb_community', array('comm_id' => $id));
    }
}