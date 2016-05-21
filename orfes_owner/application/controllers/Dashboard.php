<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->library(array('form_validation', 'pagination'));
        $this->load->model(array('admin_model', 'report_model', 'validation_model', 'restaurant_model', 'date_model', 'hash_model'));
        $data = array();
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session
    }

    /*
     * @function name - index
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function index()
    {
        $data['title'] = "Home";
        $data['menu_dashboard'] = "active-menu";
        $data['content'] = $this->load->view('backend/pages/home', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

    /*
     * @function name - dashborad
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function report()
    {
        $data['title'] = "Report";
        $data['menu_report'] = "active-menu";
        $data['country_visitor'] = $this->report_model->country_visitor('tbl_information');
        $data['count_in_month'] = $this->report_model->count_in_month('tbl_restaurant', 2015, 'date');
        $data['count_in_year'] = $this->report_model->count_in_year('tbl_restaurant', 2015, 'date');
        $data['content'] = $this->load->view('backend/pages/report', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

    /*
     * @function name - all_restaurant
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function all_restaurant()
    {
        $data['title'] = "All Restaurant";
        $data['menu_restaurant'] = "active-menu";
        #
        #pagination starts
        #  
        $config["base_url"] = base_url() . "dashboard/all_restaurant/";
        $config["total_rows"] = $this->db->count_all('tbl_restaurant');
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        /* This Application Must Be Used With BootStrap 3 *  */
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["restaurant"] = $this->restaurant_model->read_all_data($config["per_page"], $page, 'date', 'desc');
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends 
        #  
        $data['content'] = $this->load->view('backend/pages/all_restaurant', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }


    /*
     * @function name - search_restaurant
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 27/07/2015
     */

    public function search_restaurant()
    {
        $data['title'] = "All Restaurant";
        $data['menu_restaurant'] = "active-menu";
        $data['content'] = $this->load->view('backend/pages/search_restaurant', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

    /*
  * @function name - block
  * @return - boolean data
  * @author - Md. Shohrab Hossain
  * @created on - 14/07/2015
  */

    public function delete()
    {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session 
        $this->restaurant_model->delete('tbl_restaurant', $this->hash_model->decode($this->uri->segment(3)));
        $this->restaurant_model->delete('tbl_information', $this->hash_model->decode($this->uri->segment(3)));
        $this->restaurant_model->delete('tbl_category', $this->hash_model->decode($this->uri->segment(3)));
        $this->session->set_userdata(array('message' => 'Delete Successfully!'));
        redirect('dashboard/all_restaurant');
    }

    /*
     * @function name - block 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 14/07/2015
     */

    public function block()
    {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session 
        $this->restaurant_model->update_status('tbl_restaurant', $this->hash_model->decode($this->uri->segment(3)), 0);
        $this->session->set_userdata(array('message' => 'Block Successfully!'));
        redirect('dashboard/all_restaurant');
    }

    /*
     * @function name - unblock 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 14/07/2015
     */

    public function unblock()
    {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session 
        $this->restaurant_model->update_status('tbl_restaurant', $this->hash_model->decode($this->uri->segment(3)), 1);
        $this->session->set_userdata(array('message' => 'Un-block Successfully!'));
        redirect('dashboard/all_restaurant');
    }

}
