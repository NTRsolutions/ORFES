<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * @function name - signup
     * @author - Md. Shohrab Hossain
     * @created on - 23/05/2015
     */

    public function signup() {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_restaurant.email]', array('is_unique' => 'This %s alredy taken')
        );
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]|is_unique[tbl_restaurant.username]', array('is_unique' => 'This %s alredy taken')
        );
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('conf_password', 'Password confirmation', 'required|trim|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * @function name - change_information
     * @author - Md. Shohrab Hossain
     * @created on - 27/05/2015
     */

    public function change_information() {
        $this->form_validation->set_rules('hotline_number', 'Hotline Number', 'required|regex_match[/^[0-9()+.-]+$/]');
        $this->form_validation->set_rules('address', 'Flat / Plot / Tower / Floor / Road Name or No', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim|numeric');
        $this->form_validation->set_rules('police_station', 'Police Station', 'trim|required');
        $this->form_validation->set_rules('district_city', 'District / City', 'trim|required');
        $this->form_validation->set_rules('state_division', 'State / Division', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * @function name - change_password
     * @author - Md. Shohrab Hossain
     * @created on - 27/05/2015
     */

    public function change_password() {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Password confirmation', 'required|trim|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * @function name - category
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function category() {
        $this->form_validation->set_rules('category_name', 'Category', 'required|trim|max_length[100]');
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * @function name - item
     * @author - Md. Shohrab Hossain
     * @created on - 28/05/2015
     */

    public function item() {
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('item_type', 'Item Type', 'required|trim');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('about', 'About', 'max_length[200]');
        $this->form_validation->set_rules('regular_currency', 'Reqular Currency', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('regular_price', 'Reqular Price', 'required|numeric|trim|max_length[20]');
        $this->form_validation->set_rules('special_currency', 'Special Currency', 'trim|max_length[10]');
        $this->form_validation->set_rules('special_price', 'Special Price', 'trim|numeric|max_length[20]'); 
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * @function name - admin_registration
     * @author - Md. Shohrab Hossain
     * @created on - 30/05/2015
     */

    public function admin_registration() {
        $this->form_validation->set_rules('name', 'Full name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_admin.email]');
        #callback_check_email_exists -> Users && Users_Model
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('conf_password', 'Password confirmation', 'required|trim|matches[password]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|max_length[250]');
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /*
     * @function name - edit_admin
     * @author - Md. Shohrab Hossain
     * @created on - 30/05/2015
     */

    public function edit_admin() {
        $this->form_validation->set_rules('name', 'Full name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        #callback_check_email_exists -> Users && Users_Model
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('conf_password', 'Password confirmation', 'required|trim|matches[password]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|max_length[250]');
        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

  
    /*
     * @function name - simple_message
     * @author - Md. Shohrab Hossain
     * @created on - 04/06/2015
     */

//    public function simple_message() {
//        $this->form_validation->set_rules('name', 'Full name', 'required|trim|max_length[50]');
//        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//        $this->form_validation->set_rules('subject', 'Subject', 'required|trim|max_length[100]');
//        $this->form_validation->set_rules('message', 'Message', 'required|trim|max_length[250]');
//        if ($this->form_validation->run() == TRUE) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }

}

?>