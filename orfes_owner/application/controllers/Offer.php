<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation',));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('validation_model', 'restaurant_model', 'offer_model', 'upload_model', 'information_model', 'date_model', 'mail_model'));
        $data = array();
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
    }

    public function change_offer()
    {
        $data['title'] = "Change Offer";
        $data['menu_settings'] = "sh_menu";

        echo $this->input->post('offer_text');
        #upload logo or banner
        $upload = $this->upload_model->do_upload(
            $upload_path = 'assets/images/offer/' . $this->session->userdata('restaurant_id') . "/",
            $file_name = 'offer_banner', $image_size = '500', $this->session->userdata('restaurant_id'));

        if ($upload) {
            $this->offer_model->update(array('text' => $this->security->xss_clean($this->input->post('offer_text')), 'banner' => $upload));
            $this->session->set_userdata(array('message' => 'Offer Updated Successfully'));
            #unlink old photo
            @unlink($this->input->post('old_photo'));
            #ends of unlink

            $this->load->model("simpleimage");
            $this->simpleimage->load($upload); //load(image_path)
            $this->simpleimage->resize(950, 200); //resize(width, height)
            $this->simpleimage->save($upload); //save(image_path)
        }
        #ends of logo or banner
        $data['offer'] = $this->offer_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/change_offer', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }
}