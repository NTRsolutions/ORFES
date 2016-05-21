<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model
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
        return $this->db->insert('tbl_item', $data);
    }

    /*
     * @function name - read 
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function read($category)
    {
        $query = $this->db->select('*')
            ->from('tbl_item')
            ->where('restaurant_id', $this->session->userdata('restaurant_id'))
            ->where('category', $category)
            ->order_by('category')
            ->get();
        return $query->result();
    }

    /*
     * @function name - read_by_id 
     * @author - Md. Shohrab Hossain
     * @created on - 07/06/2015
     */

    public function read_by_id($id)
    {
        $query = $this->db->select('*')
            ->from('tbl_item')
            ->where('item_id', $id)
            ->get()
            ->row();
        return $query;
    }

    /*
     * @function name - update 
     * @author - Md. Shohrab Hossain
     * @created on - 07/07/2015
     */

    public function update($data)
    {
        $this->db->where('item_id', $data['item_id'])
            ->update('tbl_item', $data);
        return TRUE;
    }

    public function update_image($data)
    {
        $this->db->where('item_id', $data['item_id'])
            ->update('tbl_item', $data);
        return TRUE;
    }

    /*
     * @function name - delete 
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function delete($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('tbl_item');
        return TRUE;
    }

    /*
     * @function name - block 
     * @author - Md. Shohrab Hossain
     * @created on - 2/07/2015
     */

    public function block($id)
    {
        $this->db->set('status', 0);
        $this->db->where('item_id', $id);
        $this->db->where('restaurant_id', $this->session->userdata('restaurant_id'));
        $this->db->update('tbl_item');
        return TRUE;
    }

    /*
     * @function name - unblock 
     * @author - Md. Shohrab Hossain
     * @created on - 2/07/2015
     */

    public function unblock($id)
    {
        $this->db->set('status', 1);
        $this->db->where('item_id', $id);
        $this->db->where('restaurant_id', $this->session->userdata('restaurant_id'));
        $this->db->update('tbl_item');
        return TRUE;
    }

}

?>