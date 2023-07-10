<?php

class GastroModel extends CI_Model
{

    ////////////////Selector///////////////////
    public function get_itemSelectRegion()
    {
        $this->db->select("d.dish_region");
        $this->db->from("tb_dish as d");
        $this->db->group_by("d.dish_region");
        $query = $this->db->get("tb_dish");
        return $query->result();
    }

    public function get_itemSelectFood()
    {
        $this->db->select("d.dish_food_type");
        $this->db->from("tb_dish as d");
        $this->db->group_by("d.dish_food_type");
        $query = $this->db->get("tb_dish");
        return $query->result();
    }

    public function get_itemSelectAttration()
    {
        $this->db->select("a.attr_name");
        $this->db->from("tb_attraction as a");
        $this->db->group_by("a.attr_name");
        $query = $this->db->get("tb_attraction");
        return $query->result();
    }

    public function get_itemSelectRestaurant()
    {
        $this->db->select("r.rest_name_thai");
        $this->db->from("tb_restaurant as r");
        $this->db->group_by("r.rest_name_thai");
        $query = $this->db->get("tb_restaurant");
        return $query->result();
    }

    public function get_itemSelectProvince()
    {
        $this->db->select("r.rest_province");
        $this->db->from("tb_restaurant as r");
        $this->db->group_by("r.rest_province");
        $query = $this->db->get("tb_restaurant");
        return $query->result();
    }

    ////////////////filter////////////////
    public function get_dataFilterDish()
    {
        $query = $this->db->query("SELECT
        tb_dish.dish_name_thai, 
        tb_dish.dish_story, 
        tb_dish.dish_region, 
        tb_dish.dish_food_type, 
        tb_dish.dish_restaurants, 
        tb_dish.dish_community, 
        tb_dish.dish_ingredients
    FROM
        tb_dish");
        return $query->result();
    }

    public function get_allItemFilter()
    {
        $item = [];

        $query = $this->db->query("SELECT
        r.rest_id, 
        r.rest_name_thai, 
        r.rest_lat, 
        r.rest_long,
        r.rest_region,
        r.rest_province,
        r.rest_tel,
        r.rest_openning,
        r.rest_menu,
        r.rest_attraction
    FROM
        tb_restaurant as r
        ");
        $item = $query->result();
        // $itemForLoop = $item;

        foreach ($item as $key_item => $value) {
            $menus = explode(",", $value->rest_menu);
            $item[$key_item]->rest_menu = []; //clear array
            foreach ($menus as $menu) {
                $query = $this->db->query("SELECT dish_name_thai, dish_food_type FROM tb_dish WHERE dish_id = '$menu' ");
                // print_r($item[$key_item]->rest_menu);
                $result = $query->result();
                // $result = json_decode(json_encode($result), true);
                // var_dump($item);
                // var_dump($result);
                // @array_push($item[$key_item]->rest_menu, $result[0]);
                @array_push($item[$key_item]->rest_menu, $result[0]->dish_food_type);
            }

            $attractions = explode(",", $value->rest_attraction);
            // var_dump($attractions);
            $item[$key_item]->rest_attraction = []; //clear array
            foreach ($attractions as $attraction) {
                $query = $this->db->query("SELECT attr_name FROM tb_attraction WHERE attr_id = '$attraction' ");
                $result = $query->result();

                // @array_push($item[$key_item]->rest_attraction, $result[0]);
                @array_push($item[$key_item]->rest_attraction, $result[0]->attr_name);
            }
        }

        return $item;
    }

    //////////////////////
    public function find_item($id)
    {
        return $this->db->get_where('tb_dish', array('dish_id' => $id))->row();
    }
}