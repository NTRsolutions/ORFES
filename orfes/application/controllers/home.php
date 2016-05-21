<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('user/site_head');
        $this->load->view('user/site_header');
        $this->load->view('user/view_home');
        $this->load->view('user/site_footer');
        $this->load->view('user/site_scripts');
    }
}
