<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 02.Apr.16
 * Time: 09:07 AM
 */
class Admin_Degrees extends CI_Model
{
    public function getAllDegrees()
    {
        $query = $this->db->get('degrees');
        return $query->result();
    }

    public function add($name, $info)
    {
        $flag = false;

        if ($this->db->insert('degrees', array("name" => $name, "information" => $info))) {
            $flag = true;
        }

        return $flag;
    }

    public function updateGetValue($id)
    {
        $this->db->where('id', $id);
        $this->db->from('degrees');
        $query = $this->db->get();

        return $query->result();
    }

    public function updateSetValue($id, $name, $info)
    {
        $flag = false;

        if ($this->db->update('degrees', array("name" => $name, "information" => $info), array('id' => $id))) {

            $flag = true;

        }

        return $flag;
    }

    public function delete($id)
    {
        return $this->db->delete('degrees', array('id' => $id));
    }
}