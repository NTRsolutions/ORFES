<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Capcha_Model extends CI_Model {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation')); 
        $data = $sdata = array();
    }

    /*
     * @function name - signin
     * @parameter - email and password
     * @parameter contains signin form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 19/05/2015
     */

    function signin() {
        #starts of check session
        if ($this->session->userdata('isLogedIn') == TRUE)
            redirect('users/profile');
        #ends of check session
        $data['title'] = "Sign In";
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|md5');

        #capcha
        $this->load->helper('captcha');
        $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_captcha');
        $userCaptcha = set_value('captcha');
        $word = $this->session->userdata('captchaWord');
        #ends capcha 
        if ($this->form_validation->run() == TRUE && !strcmp(strtolower($userCaptcha), strtolower($word)) == 0) {
            if ($this->users_model->check_signin()) {
                redirect('users/profile');
            } else {
                $sdata['message'] = "Incorrect Email or Password!";
            }
            #capcha
            $this->session->unset_userdata('captchaWord');
            #ends capcha
        } else {
            $sdata['message'] = "Incorrect Email or Password!";
        }
        #capcha
        $vals = array(
            'img_path' => 'assets/images/captcha/',
            'img_url' => base_url() . 'assets/images/captcha/',
            'img_width' => '200',
            'img_height' => 50,
            'word_length' => 4,
            'font_size' => 25,
            'pool' => 'abcdefghijklmnopqrstuvwxyz',
            'expiration' => 30
        );
        $captcha = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $captcha['word']);
        #ends capcha
        $this->session->set_userdata($sdata);
        $data['content'] = $this->load->view('pages/signin', $captcha, TRUE);
        $this->load->view('main_wrapper', $data);
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

}

?>
