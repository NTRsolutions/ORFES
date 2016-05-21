<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('admin_model', 'report_model', 'validation_model', 'restaurant_model', 'information_model', 'gallery_model', 'category_model', 'date_model', 'hash_model', 'capcha_model', 'mail_model'));
        $data = array();
    }

    /*
     * @function name - index
     * @parameter - email and password
     * @parameter contains signin form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 19/05/2015
     */


    public function profile($username)
    {
        $data['title'] = "Restaurant Profile";
        $data['menu_settings'] = "sh_menu";
        $data['restaurant'] = $this->restaurant_model->read_by_username($username);
        if ($data['restaurant'] == '') {
            show_404();
        } else {
            $data['information'] = $this->information_model->read($data['restaurant']->restaurant_id);
            $data['gallery'] = $this->gallery_model->read($data['restaurant']->restaurant_id);
            $data['category'] = $this->category_model->readByJoin($data['restaurant']->restaurant_id);
            $data['content'] = $this->load->view('frontend/mobile/profile', $data, TRUE);
            $this->load->view('frontend/main_wrapper_mobile', $data);
        }
    }

}
