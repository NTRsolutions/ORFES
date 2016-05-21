<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation',));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('validation_model', 'restaurant_model', 'upload_model', 'information_model', 'gallery_model', 'date_model', 'mail_model'));
        $data = array();
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
    }

    public function change_gallery()
    {
        $data['title'] = "Change Gallery Image";
        $data['menu_settings'] = "sh_menu";
        $data['check'] = 0;

        $upload = $this->gallery_model->do_upload_gallery(
            $upload_path = 'assets/images/gallery/' . $this->session->userdata('restaurant_id') . "/",
            $file_name = 'image', $image_size = '1000');

        if ($upload) {
            $data1['source'] = $upload;
            $data1['restaurant_id'] = $this->session->userdata('restaurant_id');

            $this->load->model("simpleimage");
            $this->simpleimage->load($upload); //load(image_path)
            $this->simpleimage->resize(600, 400); //resize(width, height)
            $this->simpleimage->save($upload); //save(image_path)

            $this->db->insert('tbl_gallery', $data1);
            $this->session->set_userdata(array('message' => 'Gallery Image Uploaded successfully'));
            redirect(base_url() . 'index.php/gallery/change_gallery', 'refresh');
        }

        $data['information'] = $this->db->get_where('tbl_gallery', array('restaurant_id' => $this->session->userdata('restaurant_id')))->result_array();
        $data['content'] = $this->load->view('frontend/pages/change_gallery_image', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    public function update_gallery($para1)
    {
        $upload = $this->gallery_model->do_upload_gallery(
            $upload_path = 'assets/images/gallery/' . $this->session->userdata('restaurant_id') . "/",
            $file_name = 'image', $image_size = '1000');

        if ($upload) {
            $data1['source'] = $upload;

            $this->db->where('image_id', $para1);
            $this->db->update('tbl_gallery', $data1);
            $this->session->set_userdata(array('message' => 'Gallery Image Updated successfully'));
            #unlink old photo
            @unlink($this->input->post('old_photo'));
            #ends of unlink

            $this->load->model("simpleimage");
            $this->simpleimage->load($upload); //load(image_path)
            $this->simpleimage->resize(600, 400); //resize(width, height)
            $this->simpleimage->save($upload); //save(image_path)
        }
        redirect(base_url() . 'index.php/gallery/change_gallery', 'refresh');
    }

    public function delete_image($para1)
    {
        @unlink($this->db->get_where('tbl_gallery', array('image_id' => $para1))->row()->source);
        $this->db->where('image_id', $para1);
        $this->db->delete('tbl_gallery');
        $this->session->set_userdata(array('message' => 'Gallery Image Deleted successfully'));
        redirect(base_url() . 'index.php/gallery/change_gallery', 'refresh');
    }

    public function add_more()
    {
        $data['title'] = "Change Gallery Image";
        $data['menu_settings'] = "sh_menu";
        $data['check'] = 1;
        $data['information'] = $this->db->get_where('tbl_gallery', array('restaurant_id' => $this->session->userdata('restaurant_id')))->result_array();
        $data['content'] = $this->load->view('frontend/pages/change_gallery_image', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }
}