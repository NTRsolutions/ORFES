<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->library(array('form_validation'));
        $this->load->model(array('admin_model', 'report_model', 'validation_model', 'date_model', 'hash_model', 'capcha_model','mail_model'));
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

    public function index() { 
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == TRUE) {
            redirect('dashboard/index');
        }
        #ends of check session
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|md5');
        if ($this->form_validation->run() == TRUE) {
            $check = $this->admin_model->check_admin_signin();
            if ($check->num_rows() == 1) {
                $sdata = array(
                    'user_id' => $check->row()->user_id,
                    'name' => $check->row()->name,
                    'email' => $check->row()->email,
                    'ip_address' => $check->row()->ip_address,
                    'isAdminLogin' => TRUE
                );
                $this->session->set_userdata($sdata);
                #update login information
                $input = array(
                    'ip_address' => $this->input->ip_address(),
                    'last_login' => $this->date_model->gm_date()
                );
                $this->admin_model->update('tbl_admin', $input);
                #ends of update login information
                redirect('dashboard/index');
            } else {
                $this->session->set_userdata(array('message' => 'Incorrect Email or Password!'));
            }
        } else {
            $this->session->set_userdata(array('message' => 'Incorrect Email or Password!'));
        }
        $this->load->view('backend/pages/signin');
    }

    /*
     * @function name - registration
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 11/07/2015
     */

    public function registration() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session
        $data['title'] = "Add Admin";
        $data['menu_admin'] = "active-menu";
        if ($this->validation_model->admin_registration() == TRUE) {
            $info = array(
                'name' => $this->security->xss_clean($this->input->post('name')),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'password' => $this->security->xss_clean(md5($this->input->post('password'))),
                'address' => $this->security->xss_clean($this->input->post('address')),
                'ip_address' => $this->input->ip_address(),
                'status' => 1,
                'last_login' => $this->date_model->gm_date(),
                'join_date' => $this->date_model->gm_date()
            );
            $this->admin_model->create($info);
            $this->session->set_userdata(array('message' => 'Registration Successfully!'));
        }
        $data['content'] = $this->load->view('backend/pages/registration', '', TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

 
    /*
     * @function name - all_admin
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 11/07/2015
     */

    public function all_admin() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session
        $data['title'] = "All Admin";
        $data['menu_admin'] = "active-menu";
        $data['admin'] = $this->admin_model->read();
        $data['content'] = $this->load->view('backend/pages/all_admin', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

    /*
     * @function name - profile
     * @author - Md. Shohrab Hossain
     * @created on - 11/07/2015
     */

    public function profile() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session
        $data['title'] = 'Profile';
        $data['profile'] = $this->admin_model->read_by_id('tbl_admin', $this->session->userdata('user_id'));
        $data['content'] = $this->load->view('backend/pages/profile', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

    /*
     * @function name - edit_profile 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 30/05/2015
     */

    public function edit_profile() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session
        $data['title'] = "Edit Profile";

        if ($this->validation_model->edit_admin() == TRUE) {
            $info = array(
                'name' => $this->security->xss_clean($this->input->post('name')),
                'password' => $this->security->xss_clean(md5($this->input->post('password'))),
                'address' => $this->security->xss_clean($this->input->post('address')),
                'ip_address' => $this->input->ip_address(),
                'last_login' => $this->date_model->gm_date(),
                'join_date' => $this->date_model->gm_date()
            );
            $this->admin_model->update('tbl_admin', $info);
            $this->session->set_userdata(array('message' => 'Information Update Successfully!'));
        }

        $data['profile'] = $this->admin_model->read_by_id('tbl_admin', $this->session->userdata('user_id'));
        $data['content'] = $this->load->view('backend/pages/edit_profile', $data, TRUE);
        $this->load->view('backend/main_wrapper', $data);
    }

    /*
     * @function name - forgot_password
     * @author - Md. Shohrab Hossain
     * @created on - 31/05/2015
     */

    public function forgot_password() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == TRUE) {
            redirect('dashboard/index');
        }
        #ends of check session   
        #capcha
        $this->load->helper('captcha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_captcha');
        $userCaptcha = set_value('captcha');
        $word = $this->session->userdata('captchaWord');
        #ends capcha 
        if ($this->form_validation->run() == TRUE && !strcmp(strtolower($userCaptcha), strtolower($word)) == 0) {
            if ($this->admin_model->check_email_exits() == 1) { 
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $password = '';
                for ($i = 0; $i <= 8; $i++) {
                    $password .= $characters[rand(0, $charactersLength - 1)];
                }
                $this->admin_model->update_by_email('tbl_admin',$password);
                $this->mail_model->password_change_mail($this->input->post('email'), $password);
            $this->session->set_userdata(array('message' => 'A password set to you . Please check your email inbox'));
            } 
            #capcha
            $this->session->unset_userdata('captchaWord');
            #ends capcha
        }
        #capcha
        $vals = array(
            'img_path' => 'assets/images/captcha/',
            'img_url' => base_url() . 'assets/images/captcha/',
            'img_width' => '310',
            'img_height' => 50,
            'word_length' => 4,
            'font_size' => 25,
            'pool' => 'abcdefghijklmnopqrstuvwxyz',
            'expiration' => 30
        );
        $captcha = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $captcha['word']); 
        $this->load->view('backend/pages/forgot_password', $captcha);
    }

    /*
     * @function name - validate_captcha 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on -19/05/2015
     */

    function validate_captcha() {
        if ($this->input->post('captcha') != $this->session->userdata['captchaWord']) {
            $this->form_validation->set_message('validate_captcha', 'Wrong captcha code, hmm are you the Terminator?');
            return false;
        } else {
            return true;
        }
    }

    /*
     * @function name - sign_out 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 30/05/2015
     */

    function sign_out() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session
        $this->session->sess_destroy();
        $sdata = array(
            'admin_id' => '',
            'name' => '',
            'email' => '',
            'ip_address' => '',
            'isAdminLogin' => FALSE
        );
        $this->session->set_userdata($sdata);
        redirect('admin');
    }

    /*
     * @function name - block 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function delete() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session 
        $this->admin_model->delete('tbl_admin', $this->hash_model->decode($this->uri->segment(3)));
        $this->session->set_userdata(array('message' => 'Delete Successfully!'));
        redirect('admin/all_admin');
    }

    /*
     * @function name - block 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function block() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session 
        $this->admin_model->update_status('tbl_admin', $this->hash_model->decode($this->uri->segment(3)), 0);
        $this->session->set_userdata(array('message' => 'Block Successfully!'));
        redirect('admin/all_admin');
    }

    /*
     * @function name - unblock 
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function unblock() {
        #starts of check session
        if ($this->session->userdata('isAdminLogin') == FALSE) {
            redirect('admin/index');
        }
        #ends of check session 
        $this->admin_model->update_status('tbl_admin', $this->hash_model->decode($this->uri->segment(3)), 1);
        $this->session->set_userdata(array('message' => 'Un-block Successfully!'));
        redirect('admin/all_admin');
    }

}
