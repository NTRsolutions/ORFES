<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation',));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('validation_model', 'restaurant_model', 'upload_model', 'information_model', 'date_model', 'mail_model'));
        $data = array();
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
    }

    /*
     * @function name - information
     * @parameter - post data
     * @parameter contains profile information form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 23/06/2015
     */

    public function change_information()
    {
        $data['title'] = "Update Profile Information";
        $data['menu_settings'] = "sh_menu";
        #form validation
        if ($this->validation_model->change_information() == TRUE) {
            $opening_day = $this->security->xss_clean($this->input->post('start_day')) . " - " . $this->security->xss_clean($this->input->post('end_day'));
            $opening_time = $this->security->xss_clean($this->input->post('start_time')) . " - " . $this->security->xss_clean($this->input->post('end_time'));
            $info = array(
                'type' => $this->security->xss_clean($this->input->post('type')),
                'facilities' => $this->security->xss_clean($this->input->post('facilities')),
                'about' => $this->security->xss_clean($this->input->post('about')),
                'hotline_number' => $this->security->xss_clean($this->input->post('hotline_number')),
                'seating_capacity' => $this->security->xss_clean($this->input->post('seating_capacity')),
                'billing_system' => $this->security->xss_clean($this->input->post('billing_system')),
                'opening_time' => $opening_time,
                'opening_day' => $opening_day,
                'address' => $this->security->xss_clean($this->input->post('address')),
                'postal_code' => $this->security->xss_clean($this->input->post('postal_code')),
                'police_station' => $this->security->xss_clean($this->input->post('police_station')),
                'district_city' => $this->security->xss_clean($this->input->post('district_city')),
                'state_division' => $this->security->xss_clean($this->input->post('state_division')),
                'country' => $this->security->xss_clean($this->input->post('country'))
            );
            #information update
            $this->information_model->update($info);
//            if($this->information_model->update($info) == FALSE){
//                $info['restaurant_id'] = $this->session->userdata('restaurant_id'); 
//                $this->information_model->create($info);
//            }
            #ends of information update
            #
            #set session message
            $this->session->set_userdata(array('message' => 'Information save successfully'));
            #ends of set session message
        }
        #ends of validation
        $data['info'] = $this->information_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/change_information', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - logo       
     * @parameter - image
     * @parameter contains change logo / banner form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */
    public function change_logo()
    {
        $data['title'] = "Change Logo";
        $data['menu_settings'] = "sh_menu";
        #upload logo or banner
        $upload = $this->upload_model->do_upload(
            $upload_path = 'assets/images/logo/' . $this->session->userdata('restaurant_id') . "/",
            $file_name = 'logo', $image_size = '100', $this->session->userdata('restaurant_id'));

        if ($upload) {
            $this->information_model->update(array('logo' => $upload));
            $this->session->set_userdata(array('message' => 'Logo upload successfully'));
            #unlink old photo
            @unlink($this->input->post('old_photo'));
            #ends of unlink

            $this->load->model("simpleimage");
            $this->simpleimage->load($upload); //load(image_path)
            $this->simpleimage->resize(100, 100); //resize(width, height)
            $this->simpleimage->save($upload); //save(image_path)
        }
        #ends of logo or banner
        $data['information'] = $this->information_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/change_logo', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    public function change_banner()
    {
        $data['title'] = "Change Banner";
        $data['menu_settings'] = "sh_menu";
        #upload logo or banner
        $upload = $this->upload_model->do_upload(
            $upload_path = 'assets/images/banner/' . $this->session->userdata('restaurant_id') . "/",
            $file_name = 'banner', $image_size = '1000', $this->session->userdata('restaurant_id'));

        if ($upload) {
            $this->information_model->update(array('image' => $upload));
            $this->session->set_userdata(array('message' => 'Banner upload successfully'));
            #unlink old photo 
            @unlink($this->input->post('old_photo'));
            #ends of unlink

            $this->load->model("simpleimage");
            $this->simpleimage->load($upload); //load(image_path)
            $this->simpleimage->resize(950, 200); //resize(width, height)
            $this->simpleimage->save($upload); //save(image_path)

            /*
            $config['image_library'] = 'gd2';
            $config['source_image']	= base_url() . $upload;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']	= 950;
            $config['height']	= 200;

            $this->load->library('image_lib', $config);

            echo $this->image_lib->resize();
            */
        }
        #ends of logo or banner
        $data['information'] = $this->information_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/change_banner', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }


    /*
     * @function name - logo       
     * @parameter - image
     * @parameter contains change logo / banner form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 25/06/2015
     */

    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}

?>