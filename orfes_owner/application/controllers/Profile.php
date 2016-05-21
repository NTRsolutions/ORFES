<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation',));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('validation_model', 'restaurant_model', 'information_model', 'gallery_model','category_model', 'date_model', 'mail_model'));
        $data = array();
    }

    /*
     * @function name - profile
     * @parameter - name
     * @parameter contains restaurant name or username
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function index($username) {
        $data['title'] = "Restaurant Profile";
        $data['menu_settings'] = "sh_menu";
        $data['restaurant'] = $this->restaurant_model->read_by_username($username);
        if ($data['restaurant'] == '') {
            show_404();
        } else {
            $data['information'] = $this->information_model->read($data['restaurant']->restaurant_id);
            $data['gallery'] = $this->gallery_model->read($data['restaurant']->restaurant_id);
            $data['category'] = $this->category_model->readByJoin($data['restaurant']->restaurant_id);
            $data['content'] = $this->load->view('frontend/pages/profile', $data, TRUE);
            $this->load->view('frontend/main_wrapper', $data);
        }
    }
    

}

?>