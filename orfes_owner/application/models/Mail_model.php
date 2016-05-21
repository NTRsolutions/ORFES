<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_Model extends CI_Model {

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
        $this->load->library('email');
    }

    /*
     * @function name - send_mail 
     * @author - Md. Shohrab Hossain
     * @created on - 04/06/2015
     */

    public function simple_message() { 
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html'; 
        $this->email->initialize($config); 
        $this->email->clear();
        $this->email->to('info@getmenucard.com');
        $this->email->from($this->input->post('email'));
        $this->email->subject($this->input->post('email'));
        $this->email->message($this->input->post('message'));
        $this->email->send();
    }
    /*
     * @function name - send_mail 
     * @author - Md. Shohrab Hossain
     * @created on - 18/05/2015
     */

    public function confirm_account($url) { 
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html'; 
        $this->email->initialize($config); 
        $this->email->clear();
        $this->email->to($this->input->post('email'));
        $this->email->from('info@getmenucard.com');
        $this->email->subject("Restaurant :: Account Confirmation Mail.");
        $this->email->message('Hi ' . $this->input->post('name') .'. Your password is '.$this->input->post('password').'. <br/> To active your account please click on this link ' . anchor($url, "Click Me") . '<br/> - Thank You.');
        $this->email->send();
    }

    /*
     * @function name - password_change_mail
     * @author - Md. Shohrab Hossain
     * @created on - 27/05/2015
     */

    public function password_change_mail($email, $password) {
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->clear()
                ->to($email)
                ->from('info@getmenucard.com')
                ->subject("Restaurant :: Password Change.")
                ->message('Hi, Your new password is ' . $password);
        $this->email->send();
    } 

}
