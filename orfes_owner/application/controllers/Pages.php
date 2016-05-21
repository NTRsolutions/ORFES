<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model('date_model');
        $data = array();
    }

    /*
     * @function name - index
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function index() {
        $data['title'] = "Home";
        $data['menu_home'] = "sh_menu";
        $data['content'] = $this->load->view('frontend/pages/home', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - search_home 
     * @author - Md. Shohrab Hossain
     * @created on - 15/07/2015
     */

    public function search_home() {
        redirect(base_url() . 'index.php/'.$this->input->post('search'), 'refresh');
    }

    /*
     * @function name - search_advanced
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 15/07/2015
     */

    public function search_advanced() {
        $data['title'] = "Advanced Search";
        $data['menu_adv_search'] = "sh_menu";
        $data['content'] = $this->load->view('frontend/pages/search_advanced', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - search_nearest_restaurant
     * @parameter - name or code
     * @parameter contains search nearest restaurant form data
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function search_nearest_restaurant() {
        $data['title'] = "Search Nearest Restaurant";
        $data['menu_search'] = "sh_menu";
        $data['content'] = $this->load->view('frontend/pages/search_nearest_restaurant', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - compare
     * @parameter -  
     * @parameter contains  
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function compare_food_price() {
        $data['title'] = "Compare Food Price";
        $data['menu_compare'] = "sh_menu";
        $data['content'] = '<iframe src="//www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2Fsourav.fci&amp;layout=standard&amp;show_faces=true&amp;colorscheme=light&amp;width=450&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>';
        $this->load->view('frontend/main_wrapper', $data);
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
        $data['content'] = $this->load->view('frontend/pages/signup', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - signin
     * @parameter - email and password
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
        $data['content'] = $this->load->view('frontend/pages/signin', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - about 
     * @author - Md. Shohrab Hossain
     * @created on - 07/09/2015
     */

    public function about() {
        $data['title'] = "About";  
        $data['content'] = $this->load->view('frontend/pages/about', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    } 
	
	public function how_to_use() {
        $data['title'] = "How_to_use";  
        $data['content'] = $this->load->view('frontend/pages/how_use', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }
    /*
     * @function name - about 
     * @author - Md. Shohrab Hossain
     * @created on - 07/09/2015
     */

    public function support() {
        $data['title'] = "Support"; 
        $data['content'] = $this->load->view('frontend/pages/support', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - forgot_password
     * @parameter - email  
     * @parameter contains signin form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 09/07/2015
     */

    public function forgot_password() {
        #starts of check session
        if ($this->session->userdata('isLogIn') == TRUE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
        #ends of check session
        $data['title'] = "Forgot Password";
        $data['menu_signin'] = "sh_menu";
        $data['content'] = $this->load->view('frontend/pages/forgot_password', '', TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

}
