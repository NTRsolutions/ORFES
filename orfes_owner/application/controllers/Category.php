<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('validation_model', 'category_model', 'date_model', 'mail_model'));
        $data = array();
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
    }

    /*
     * @function name - create
     * @parameter - $_POST
     * @parameter contains restaurant name or username
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function add_category()
    {
        $data['title'] = "Add Category";
        $data['menu_settings'] = "sh_menu";
        if ($this->validation_model->category() == TRUE) {
            $category = array(
                'restaurant_id' => $this->session->userdata('restaurant_id'),
                'category_name' => $this->security->xss_clean($this->input->post('category_name'))
            );
            $this->category_model->create($category);
            $this->session->set_userdata(array('message' => 'Category added successfully'));
        } else {
            $this->session->set_userdata(array('exception' => 'Please fill up correctly'));
        }
        redirect(base_url() . 'index.php/category/view_category', 'refresh');
    }

    /*
     * @function name - index
     * @parameter - name
     * @parameter contains restaurant name or username
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function view_category()
    {
        $data['title'] = "Category Management";
        $data['menu_settings'] = "sh_menu";
        $data['category'] = $this->category_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/add_category', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - delete
     * @parameter - $id
     * @parameter contains category page data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function delete($id)
    {
        $explode = explode('-', $id);
        $data['category'] = $this->category_model->delete($explode[0]);
        $this->session->set_userdata(array('exception' => 'Category delete successfully'));
        redirect(base_url() . 'index.php/category/view_category', 'refresh');
    }

    public function block($id)
    {
        if ($this->category_model->block($id, $this->session->userdata('restaurant_id'))) {
            $this->session->set_userdata(array('exception' => 'Block successfully'));
        }
        redirect(base_url() . 'index.php/category/view_category', 'refresh');
    }

    public function unblock($id)
    {
        if ($this->category_model->unblock($id, $this->session->userdata('restaurant_id'))) {
            $this->session->set_userdata(array('exception' => 'Unblock successfully'));
        }
        redirect(base_url() . 'index.php/category/view_category', 'refresh');
    }

}

?>