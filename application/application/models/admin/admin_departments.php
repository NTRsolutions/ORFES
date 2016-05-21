<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 02.Apr.16
 * Time: 09:07 AM
 */
class Admin_Departments extends CI_Model
{
    public function getAllDepartments()
    {
        $query = $this->db->get("departments");
        return $query->result();
    }

    public function add($degree_id, $name, $info)
    {
        $flag = false;

        if ($this->db->insert('departments', array("degree_id" => $degree_id, "name" => $name, "information" => $info))) {
            $flag = true;
        }

        return $flag;
    }

    public function updateGetValue($id)
    {
        $this->db->where('id', $id);
        $this->db->from('departments');
        $query = $this->db->get();

        return $query->result();
    }

    public function updateSetValue($id, $degree_id, $name, $info)
    {
        $flag = false;

        if ($this->db->update('departments', array("degree_id" => $degree_id, "name" => $name, "information" => $info), array('id' => $id))) {

            $flag = true;

        }

        return $flag;
    }

    public function delete($id)
    {
        return $this->db->delete('departments', array('id' => $id));
    }
}