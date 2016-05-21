<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 24.Mar.16
 * Time: 08:39 AM
 */
class Admin_Books extends CI_Model
{
    public function getAllBooks()
    {
        $query = $this->db->get("books");
        return $query->result();
    }

    public function add($name, $author, $edition, $department_id, $category_id, $topic, $serial, $file_name_book, $file_name_thumb)
    {
        $flag = array();

        if ($this->db->insert('books', array("name" => $name, "author" => $author, "edition" => $edition, "department_id" => $department_id, "category_id" => $category_id, "topics" => $topic, "serial" => $serial, "file_name" => $file_name_book, "thumb_name" => $file_name_thumb))) {
            $flag = array("id" => $this->db->insert_id());
        }

        return $flag;
    }

    public function updateThumbExt($id, $extension)
    {
        $flag = false;

        if ($this->db->update('books', array("thumb_ext" => $extension), array('id' => $id))) {

            $flag = true;

        }

        return $flag;
    }

    public function delete($id)
    {
        //$this->db->select('file_name', 'thumb_name');
        $this->db->from('books');
        $this->db->where('id', $id);
        $query = $this->db->get();

        $fileName = $query->row('file_name');
        $thumbName = $query->row('thumb_name');

        unlink("./books/" . $fileName);
        unlink("./books/cover/" . $thumbName);

        return $this->db->delete('books', array('id' => $id));
    }
}