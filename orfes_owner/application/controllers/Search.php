<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('hash_model'));
        $data = array();
    }

    /*
     * @function name - search
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function jquery_search($search = null) {
        $search = urldecode($search);
        echo "<div class=\"media sh_search\"><i class=\"fa fa-keyboard-o text-success\"></i> $search</div>";
        $this->db->select("*");
        $this->db->from('tbl_restaurant');
        $this->db->join('tbl_information', 'tbl_restaurant.restaurant_id = tbl_information.restaurant_id');
        $this->db->where('tbl_restaurant.status', 1);
        $this->db->group_start();
        $this->db->like('tbl_restaurant.username', $search);
        $this->db->or_like('tbl_restaurant.name', $search);
        $this->db->or_like('hotline_number', $search);
        $this->db->or_like('address', $search);
        $this->db->or_like('postal_code', $search);
        $this->db->or_like('police_station', $search);
        $this->db->or_like('district_city', $search);
        $this->db->or_like('police_station', $search);
        $this->db->or_like('country', $search);
        $this->db->group_end();
        $this->db->limit(100);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            echo "<div class='media sh_search' style='color:green'>Total <strong>$query->num_rows</strong> record found</div>";
            $sl = 1;

            echo "<div class=\"media sh_search\">
                    <div class=\"media-left\"><strong>#</strong></div>
                    <div class=\"media-body media-first\"><strong>Restaurant Name</strong></div>
                    <div class=\"media-body\"><strong>Location</strong></div>
                    <div class=\"media-right\"><strong>Action</strong></div>
                 </div>";

            foreach ($query->result() as $value) {
                echo "<div class=\"media sh_search\">";
                echo "<div class=\"media-left\">" . $sl++ . "</div>";
                echo "<div class=\"media-body media-first\">";
                echo "$value->name <br/>";
                echo "<strong>Hotline Number </strong>- $value->hotline_number <br/>";
                echo "</div>";
                echo "<div class=\"media-body\">";
                echo "$value->address, $value->postal_code, $value->police_station, ";
                echo "$value->district_city, $value->state_division, $value->country. ";
                echo "</div>";
                echo "<div class=\"media-right\" style='padding:5px'>";
                echo "<a class=\"btn btn-default\" href=" . base_url().'/index.php/' . $value->username . ">Details</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class=\"media sh_search\" style=\"color:red\">No record found</div>";
        }
    }

    /*
     * @function name - search_by_submit
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 09/07/2015
     */

    public function search() {
        $data['title'] = "Advanced Search";
        $data['menu_adv_search'] = "sh_menu";
        if($this->input->post('search') != null) {
            $this->load->model('restaurant_model');
            $data['search_item'] = $this->restaurant_model->search($this->input->post('search'));
            $data['content'] = $this->load->view('frontend/pages/search', $data, TRUE);
            $this->load->view('frontend/main_wrapper', $data);
        }else{
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
    }

    /*
     * @function name - search_nearest_restaurant_result
     * @parameter - name or code
     * @parameter contains search nearest restaurant form data
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 06/07/2015
     */

    public function search_nearest_restaurant_result() {
        $this->load->model(array('restaurant_model'));
        $data['title'] = "Search Nearest Restaurant";
        $data['menu_search'] = "sh_menu";
        $search = array(
            'country' => $this->security->xss_clean($this->input->post('country')),
            'state_division' => $this->security->xss_clean($this->input->post('state_division')),
            'district_city' => $this->security->xss_clean($this->input->post('district_city')),
            'police_station' => $this->security->xss_clean($this->input->post('police_station')),
            'postal_code' => $this->security->xss_clean($this->input->post('postal_code'))
        );
        $data['restaurant'] = $this->restaurant_model->search_nearest_restaurant($search);
        $data['success'] = 1;
        $data['message'] = "Restaurant FOund";
		
        //$data['content'] = $this->load->view('frontend/pages/search_nearest_restaurant_result', $data, TRUE);
        //$this->load->view('frontend/main_wrapper', $data);
		echo json_encode($data);
    }
    
   
    /*
     * @function name - admin_search
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 27/07/2015
     */ 

    public function admin_search($search = null) {
        $search = urldecode($search);
        echo "<div class=\"media sh_search\"><i class=\"fa fa-keyboard-o text-success\"></i> $search</div>";
        $this->db->select("*");
        $this->db->from('tbl_restaurant');
        $this->db->join('tbl_information', 'tbl_restaurant.restaurant_id = tbl_information.restaurant_id');
        $this->db->where('tbl_restaurant.status', 1);
        $this->db->group_start();
        $this->db->like('tbl_restaurant.username', $search);
        $this->db->or_like('tbl_restaurant.name', $search);
        $this->db->or_like('hotline_number', $search);
        $this->db->or_like('address', $search);
        $this->db->or_like('postal_code', $search);
        $this->db->or_like('police_station', $search);
        $this->db->or_like('district_city', $search);
        $this->db->or_like('police_station', $search);
        $this->db->or_like('country', $search);
        $this->db->or_like('date', $search);
        $this->db->group_end();
        $this->db->limit(100);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            echo "<div class='media sh_search' style='color:green'>Total <strong>$query->num_rows</strong> record found</div>";
            $sl = 1;

            echo "<div class=\"media sh_search\">
                    <div class=\"media-left\"><strong>#</strong></div>
                    <div class=\"media-body media-first\"><strong>Restaurant Name</strong></div>
                    <div class=\"media-body\"><strong>Location</strong></div>
                    <div class=\"media-right\"><strong>Action</strong></div>
                 </div>";

            foreach ($query->result() as $value) {
                echo "<div class=\"media sh_search\">";
                echo "<div class=\"media-left\"> " . $sl++ . "</div>";
                echo "<div class=\"media-body media-first\">";
                echo "$value->name <br/>";
                echo "<strong>Hotline </strong>- $value->hotline_number <br/>";
                echo "<strong>Join Date </strong>- $value->date <br/>";
                echo "</div>";
                echo "<div class=\"media-body\">";
                echo "$value->address, $value->postal_code, $value->police_station, ";
                echo "$value->district_city, $value->state_division, $value->country. ";
                echo "</div>";
                echo "<div class=\"media-right\" style='padding:5px'>";
                if ($value->status == 1) {
                    echo "<a class=\"btn btn-default\" href=" . base_url() . $value->username . ">View</a>";
                    echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/block/' . $this->hash_model->encode($value->restaurant_id) . ">Block</a>";
                }
                if ($value->status == 5) {
                    echo "<i style='color:red'>Pending Email Activation</i><br/>";
                    echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/unblock/' . $this->hash_model->encode($value->restaurant_id) . ">Active</a>";
                }
                if ($value->status == 0) {
                    echo "<i style='color:red'>To view please un-block first</i><br/>";
                    echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/unblock/' . $this->hash_model->encode($value->restaurant_id) . ">Un-block</a>";
                }
                echo "<a class=\"btn btn-default\" href=" . base_url() . 'dashboard/delete/' . $this->hash_model->encode($value->restaurant_id) . ">Delete</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class=\"media sh_search\" style=\"color:red\">No record found</div>";
        }
    }

}
