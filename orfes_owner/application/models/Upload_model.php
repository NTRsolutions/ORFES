<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('image_lib');
        $data = $idata = $config = $config2 = array();
    }

    # To load this model
    # $this->upload_model->do_upload($upload_path = 'assets/images/profile/', $file_field_name = 'userfile');

    function do_upload($upload_path, $file_field_name, $image_size, $new_file_name)
    {
        #folder upload
        $gm_date = explode(' ', $this->gm_date());
        $file_path1 = $upload_path;
        if (!is_dir($file_path1))
            mkdir($file_path1, 0755);

        $file_path2 = $file_path1 . $gm_date[2] . "/";
        if (!is_dir($file_path2))
            mkdir($file_path2, 0755);
        #ends of folder upload 
        $config['upload_path'] = $file_path2;
        $config['file_name'] = $new_file_name;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = $image_size;
        //$config['max_width'] = 1024;
        //$config['max_height'] = 768;
        //$config['min_width'] = 200;
        //$config['min_height'] = 200;
        //$config['max_filename'] = 5;
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_field_name)) {
            return FALSE;
        } else {
            $file = $this->upload->data();
            return $file_path2 . $file['file_name'];
        }
    }

    function do_upload_gallery($upload_path, $file_field_name, $image_size)
    {
        #folder upload
        $gm_date = explode(' ', $this->gm_date());
        $file_path = $upload_path . $gm_date[2] . "/";
        if (!is_dir($file_path))
            mkdir($file_path, 0755);
        #ends of folder upload
        $config['upload_path'] = $file_path;
        //$config['file_name'] = $new_file_name;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = $image_size;
        //$config['max_width'] = 1024;
        //$config['max_height'] = 768;
        //$config['min_width'] = 200;
        //$config['min_height'] = 200;
        $config['max_filename'] = 5;
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_field_name)) {
            return FALSE;
        } else {
            $file = $this->upload->data();
            return $file_path . $file['file_name'];
        }
    }

    function do_multiple_upload($upload_path, $field_name)
    {
        $name_array = array();
        $count = count($_FILES[$field_name]['size']);
        foreach ($_FILES as $key => $value) {
            for ($i = 0; $i <= $count - 1; $i++) {
                $_FILES[$field_name]['name'] = $value['name'][$i];
                $_FILES[$field_name]['type'] = $value['type'][$i];
                $_FILES[$field_name]['tmp_name'] = $value['tmp_name'][$i];
                $_FILES[$field_name]['error'] = $value['error'][$i];
                $_FILES[$field_name]['size'] = $value['size'][$i];
                #folder upload
                $gm_date = explode(' ', $this->gm_date());
                $file_path = $upload_path . $gm_date[2] . "/";
                if (!is_dir($file_path))
                    mkdir($file_path, 0755);
                #ends of folder upload
                $config['upload_path'] = $file_path;
//                $config['file_name'] = time();
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1000;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
//              $config['min_width'] = 200;
//              $config['min_height'] = 200;
                $config['max_filename'] = 5;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_ext_tolower'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $data = $this->upload->data();
                $name_array[] = $data['file_name'];
            }
        }
//      resize uploaded files   
//        $this->resize_multi_upload($file_path, $names, 200, 200);
//      ends of resize uploaded files 
//            ------------------handle empty data
        for ($q = 0; $q <= $count; $q++)
            if ($name_array[$q] != '') {
                if ($name_array[$q] == $name_array[$q + 1]) {
                    $name_array[$q] = '';
                }
                $names = @implode(' ', $name_array);
            }
//            ------------------handle empty data
        return $names;
    }

    public function do_resize($total_path, $width, $height)
    {
        $config2['image_library'] = 'gd2';
        $config2['source_image'] = $total_path;
        $config2['maintain_ratio'] = FALSE;
        $config2['create_thumb'] = TRUE;
        $config2['width'] = $width;
        $config2['height'] = $height;
        $this->load->library('image_lib', $config2);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }

    function gm_date()
    {
        $hour = gmdate("H") + 6;
        $minute = gmdate("i");
        $iecond = gmdate("s");
        $year = gmdate("Y");
        $month = gmdate("m");
        $day = gmdate("d");
        return date("h:i:s A Y-m-d", mktime($hour, $minute, $iecond, $month, $day, $year));
    }

}

