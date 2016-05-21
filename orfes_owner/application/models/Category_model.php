<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * @function name - create 
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function create($data)
    {
        return $this->db->insert('tbl_category', $data);
    }

    /*
     * @function name - read 
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function read($restaurant_id)
    {
        $query = $this->db->select('*')
            ->from('tbl_category')
            ->where('restaurant_id', $restaurant_id)
            ->order_by('category_id')
            ->get()
            ->result();
        return $query;
    }

    public function readByJoin($restaurant_id)
    {
        $query = $this->db->query('SELECT DISTINCT a.category_name AS "category_name", a.restaurant_id AS "restaurant_id" FROM tbl_category a, tbl_item b WHERE a.category_name = b.category AND a.restaurant_id = '.$restaurant_id.' AND b.restaurant_id = '.$restaurant_id.' AND a.status = 1');

        return $query->result();
    }

    /*
     * @function name - update 
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function update($data)
    {
        return $this->db->insert('tbl_category', $data);
    }

    /*
     * @function name - delete 
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function delete($id)
    {
        $this->db->where("sha1(category_id)", $id);
        $this->db->delete('tbl_category');
    }

    public function block($category_id, $restaurant_id)
    {
        $this->db->set('status', 0);
        $this->db->where('category_id', $category_id);
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->update('tbl_category');
        return TRUE;
    }

    public function unblock($category_id, $restaurant_id)
    {
        $this->db->set('status', 1);
        $this->db->where('category_id', $category_id);
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->update('tbl_category');
        return TRUE;
    }

}

?>