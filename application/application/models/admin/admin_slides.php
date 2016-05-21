<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 24.Mar.16
 * Time: 08:39 AM
 */
class Admin_Slides extends CI_Model
{
    public function getAllSlides()
    {
        $query = $this->db->get("slides");
        return $query->result();
    }

    public function add($name, $department_id, $category_id, $topic, $serial, $file_name)
    {
        $flag = array();

        if ($this->db->insert('slides', array("department_id" => $department_id, "category_id" => $category_id, "name" => $name, "topics" => $topic, "serial" => $serial, "file_name" => $file_name))) {
            $flag = array("id" => $this->db->insert_id());
        }

        return $flag;
    }

    public function delete($id)
    {
        $this->db->select('file_name');
        $this->db->where('id', $id);
        $this->db->from('slides');
        $query = $this->db->get();

        $fileName = $query->row('file_name');

        unlink("./slides/" . $fileName);

        return $this->db->delete('slides', array('id' => $id));
    }
}