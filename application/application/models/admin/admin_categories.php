<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 02.Apr.16
 * Time: 09:07 AM
 */
class Admin_Categories extends CI_Model
{
    public function getAllCategories()
    {
        $query = $this->db->get("categories");
        return $query->result();
    }

    public function add($name)
    {
        $flag = false;

        if ($this->db->insert('categories', array("name" => $name))) {
            $flag = true;
        }

        return $flag;
    }

    public function updateGetValue($id)
    {
        $this->db->where('id', $id);
        $this->db->from('categories');
        $query = $this->db->get();

        return $query->result();
    }

    public function updateSetValue($id, $name)
    {
        $flag = false;

        if ($this->db->update('categories', array("name" => $name), array('id' => $id))) {

            $flag = true;

        }

        return $flag;
    }

    public function delete($id)
    {
        return $this->db->delete('categories', array('id' => $id));
    }
}