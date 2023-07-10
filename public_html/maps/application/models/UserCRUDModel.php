<?php

class UserCRUDModel extends CI_Model
{
    public function get_item($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get("tb_user");
        return $query->result();
    }

    public function get_itemCRUD()
    {
        $query = $this->db->get("tb_user");
        return $query->result();
    }

    public function insert_item()
    {
        $password = $this->input->post('password');
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $data = array(
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'password' => $hash,
            'date_added' => date("Y-m-d G:i:s", time())
        );

        return [$this->db->insert('tb_user', $data), $data];
        //return data because datatable require draw() tr
    }

    public function delete_item($email)
    {
        try {
            $this->db->delete('tb_user', array('email' => $email));
            // echo $this->db->affected_rows();
        } catch (Exception $e) {
            log_message('error ', $e->getMessage());
            // return $this->db->error();
            return false;
        }
    }

}