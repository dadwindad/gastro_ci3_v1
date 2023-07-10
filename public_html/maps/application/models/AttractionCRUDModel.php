<?php

class AttractionCRUDModel extends CI_Model
{

    public function get_itemCRUD()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('attr_name', $this->input->get("search"));
            // $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("tb_attraction");
        return $query->result();
    }

    public function get_lastID($zone)
    {
        $this->db->select_max('attr_id');
        $this->db->like('attr_id', $zone);
        $query = $this->db->get("tb_attraction");
        return $query->result();
    }

    public function insert_item()
    {
        $data = array(
            'attr_id' => $this->input->post('attr_id'),
            'attr_name' => $this->input->post('attr_name'),
            'attr_history' => $this->input->post('attr_history'),
            'attr_lat' => $this->input->post('attr_lat'),
            'attr_long' => $this->input->post('attr_long'),
            'attr_address' => $this->input->post('attr_address'),
            'attr_social' => $this->input->post('attr_social'),
            'attr_tel' => $this->input->post('attr_tel'),
            'attr_opening' => $this->input->post('attr_opening'),
            'attr_travel' => $this->input->post('attr_travel'),
            'attr_highlight' => $this->input->post('attr_highlight'),
            'attr_type_id' => $this->input->post('attr_type_id'),
            'attr_tat_type_id' => $this->input->post('attr_tat_type_id'),
            'attr_comm_id' => $this->input->post('attr_comm_id'),
            'attr_ref' => $this->input->post('attr_ref'),
        );

        return [$this->db->insert('tb_attraction', $data), $data];
        //return data because datatable require draw() tr
    }


    public function update_item($id)
    {
        $data = array(
            'attr_id' => $this->input->post('attr_id'),
            'attr_name' => $this->input->post('attr_name'),
            'attr_history' => $this->input->post('attr_history'),
            'attr_lat' => $this->input->post('attr_lat'),
            'attr_long' => $this->input->post('attr_long'),
            'attr_address' => $this->input->post('attr_address'),
            'attr_social' => $this->input->post('attr_social'),
            'attr_tel' => $this->input->post('attr_tel'),
            'attr_opening' => $this->input->post('attr_opening'),
            'attr_travel' => $this->input->post('attr_travel'),
            'attr_highlight' => $this->input->post('attr_highlight'),
            'attr_type_id' => $this->input->post('attr_type_id'),
            'attr_tat_type_id' => $this->input->post('attr_tat_type_id'),
            'attr_comm_id' => $this->input->post('attr_comm_id'),
            'attr_ref' => $this->input->post('attr_ref'),
        );
        // if ($id == 0) {
        //     return $this->db->insert('tb_attraction', $data);
        // } else {
        //     $this->db->where('id', $id);
        //     return $this->db->update('tb_attraction', $data);
        // }

        if ($id != null) {
            $this->db->where('attr_id', $id);
            return $this->db->update('tb_attraction', $data);
        }

    }


    public function find_item($id)
    {
        return $this->db->get_where('tb_attraction', array('attr_id' => $id))->row();
    }


    public function delete_item($id)
    {
        try {
            $this->db->delete('tb_attraction', array('attr_id' => $id));
            // echo $this->db->affected_rows();
        } catch (Exception $e) {
            log_message('error ', $e->getMessage());
            // return $this->db->error();
            return false;
        }
    }
}