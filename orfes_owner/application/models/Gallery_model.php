<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('image_lib');

        //$data = $idata = $config = $config2 = array();
    }

    function read($id){
        return $this->db->get_where('tbl_gallery', array('restaurant_id' => $id))->result_array();
    }

    function do_upload_gallery($upload_path, $file_field_name, $image_size)
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
            return $file_path2 . $file['file_name'];
        }
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

