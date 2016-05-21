<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * @function name - create
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function create($data) {
        return $this->db->insert('tbl_restaurant', $data);
    }

    /*
     * @function name - read
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function read() {
        $query = $this->db->select('*')
                ->from('tbl_restaurant')
                ->where('restaurant_id', $this->session->userdata('restaurant_id'))
                ->where('status', 1)
                ->get()
                ->row();
        return $query;
    }


    /*
     * @function name - read_all_data
     * @author - Md. Shohrab Hossain
     * @created on - 14/07/2015
     */

    public function read_all_data($limit,$start,$field,$sortby) {
        $query = $this->db->select('*')
                ->from('tbl_restaurant')
                ->join('tbl_information','tbl_restaurant.restaurant_id = tbl_information.restaurant_id','left')
                ->limit($limit, $start)
                ->order_by($field,$sortby)
                ->get()
                ->result();
        return $query;
    }

    /*
     * @function name - read_by_username
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function read_by_username($username) {
        $query = $this->db->select('*')
                ->from('tbl_restaurant')
                ->where('username', $username)
                ->where('status', 1)
                ->get()
                ->row();
        return $query;
    }

    /*
     * @function name - filter_data
     * @author - Md. Shohrab Hossain
     * @created on - 14/06/2015
     */

    public function filter_data($username) {
        $query = $this->db->select('*')
                ->from('tbl_restaurant')
                ->where('username', $username) 
                ->get()
                ->row();
        return $query;
    }
    
    /*
     * @function name - account_confirmation
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */
    public function account_confirmation($uid) { 
        $this->db->set('status',1)
                ->where('restaurant_id', $uid) 
                ->where('status',5)
                ->update('tbl_restaurant');
        return TRUE;
    }
    /*
     * @function name - update
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */
    public function update($data) { 
        $this->db->where('restaurant_id', $this->session->userdata('restaurant_id')) 
                ->update('tbl_restaurant',$data);
        return TRUE;
    }
    
    /*
     * @function name - update_status
     * @author - Md. Shohrab Hossain
     * @created on - 14/06/2015
     */
    public function update_status($table,$uid,$status) { 
        $this->db->set('status',$status)
                ->where('restaurant_id', $uid) 
                ->update($table);
        return TRUE;
    }

    /*
     * @function name - delete
     * @author - Md. Shohrab Hossain
     * @created on - 14/06/2015
     */
    public function delete($table,$restaurant_id) {
        $this->db->where('restaurant_id',$restaurant_id)
                ->delete($table);
        return TRUE;
    }

    /*
     * @function name - check_email_exists
     * @author - Md. Shohrab Hossain
     * @created on - 09/07/2015
     */

    public function check_email_exists($email) {
        $query = $this->db->select('*')
                ->from('tbl_restaurant')
                ->where('email', $email)
                ->where('status', 1)
                ->get();
        return $query->num_rows();
    }

    /*
     * @function name - update_by_email
     * @author - Md. Shohrab Hossain
     * @created on - 09/07/2015
     */

    public function update_by_email($email, $password) {
        $query = $this->db->set('password', $password)
                ->where('email', $email)
                ->where('status', 1)
                ->update('tbl_restaurant');
        return TRUE;
    }

    /*
     * @function name - search_nearest_restaurant
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function search_nearest_restaurant($data) {
        $this->db->select('*');
        $this->db->from('tbl_restaurant');
        $this->db->join('tbl_information', 'tbl_restaurant.restaurant_id = tbl_information.restaurant_id');

        $this->db->group_start();
        $this->db->where('tbl_restaurant.status', 1);
        $this->db->group_end();

        $this->db->group_start();
        $this->db->like('country', $data['country']);
        if (!empty($data['state_division'])) {
            $this->db->like('state_division', $data['state_division']);
        }if (!empty($data['district_city'])) {
            $this->db->like('district_city', $data['district_city']);
        }if (!empty($data['police_station'])) {
            $this->db->like('police_station', $data['police_station']);
        }if (!empty($data['postal_code'])) {
            $this->db->like('postal_code', $data['postal_code']);
        }
        $this->db->group_end();

        $this->db->order_by("district_city", "asc");
        $this->db->limit(100);
        $query = $this->db->get();


        return $query->result();
    }

    /*
     * @function name - check_user
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function check_user($email_username, $password) {
        $query = $this->db->select('*')
                ->from('tbl_restaurant')
                ->group_start()
                ->where('email', $email_username)
                ->or_where('username', $email_username)
                ->group_end()
                ->where('password', $password)
                ->where('status', 1)
                ->get();
        return $query;
    }
 
    /*
     * @function name - search
     * @author - Md. Shohrab Hossain
     * @created on - 09/07/2015
     */

    public function search($search) {
        $this->db->select("*");
        $this->db->from('tbl_restaurant');
        $this->db->join('tbl_information', 'tbl_restaurant.restaurant_id = tbl_information.restaurant_id');
        $this->db->like('username', $search);
        $this->db->or_like('name', $search);
        $this->db->where('status', 1);
        $this->db->limit(100);
        return $this->db->get();
    }

}

?>