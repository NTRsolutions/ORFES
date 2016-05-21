<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 24.Feb.16
 * Time: 03:34 AM
 */
class Public_Contents extends CI_Model
{
    public function getDegrees()
    {
        $query = $this->db->get("degrees");
        return $query->result();
    }

    public function getDepartments()
    {
        $query = $this->db->get("departments");
        return $query->result();
    }

    public function getSliders()
    {
        $this->db->from("sliders");
        $this->db->order_by("id", "desc");
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPromo()
    {
        $this->db->from("promo_box");
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getVideo()
    {
        $this->db->from("video_box");
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllBooks()
    {
        $this->db->from("books");
        $this->db->order_by("serial", "asc"); 
        $query = $this->db->get();
        return $query->result();
    }

    public function getDegreeIdByName($degreeName)
    {
        $this->db->select('id');
        $this->db->from('degrees');
        $this->db->where('name', $degreeName);
        $query = $this->db->get();
        $ret = $query->row();
        return $ret->id;
    }

    public function isDepartmentAvailable($departmentName)
    {
        $this->db->select('id');
        $this->db->from('departments');
        $this->db->where('name', $departmentName);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDepartmentIdByName($departmentName)
    {
        $this->db->select('id');
        $this->db->from('departments');
        $this->db->where('name', $departmentName);
        $query = $this->db->get();
        $ret = $query->row();
        return $ret->id;
    }

    public function getDepartmentNameByKeyword($keyword)
    {
        $this->db->select('name');
        $this->db->from('departments');
        $this->db->like('name', $keyword);
        $query = $this->db->get();
        $ret = $query->row();
        return $ret->name;
    }

    public function getDepartmentFAQs($departmentId)
    {
        $this->db->where('department_id', $departmentId);
        $this->db->from('department_faqs');
        $query = $this->db->get();
        return $query->result();
    }
	
	public function getSerialListOfBooks($departmentId){
		$this->db->distinct();
		$this->db->select('serial');
		$this->db->from('books');
        $this->db->where('department_id', $departmentId);
        $this->db->order_by("serial", "asc"); 
		$query = $this->db->get();
		return $query->result();
	}

    public function getBooksByDepartmentId($departmentId)
    {
        $this->db->from('books');
        $this->db->where('department_id', $departmentId);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function getSerialListOfSlides($departmentId){
		$this->db->distinct();
		$this->db->select('serial');
		$this->db->from('slides');
        $this->db->where('department_id', $departmentId);
        $this->db->order_by("serial", "asc"); 
		$query = $this->db->get();
		return $query->result();
	}

    public function getSlidesByDepartmentId($departmentId)
    {
		$this->db->select('slides.id AS id, slides.name AS name, slides.topics AS topics, slides.serial AS serial, slides.file_name AS file_name, categories.name AS category_name');
        $this->db->where('department_id', $departmentId);
        $this->db->from('slides');
		$this->db->join('categories', 'categories.id = slides.category_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDepartmentsByDegreeId($degreeId, $departmentId)
    {
        $this->db->from('departments');
        $this->db->where('degree_id', $degreeId);
        $this->db->where_not_in('id', $departmentId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDegreesExceptThis($degreeId)
    {
        $this->db->from('degrees');
        $this->db->where_not_in('id', $degreeId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getBooksByKeywords($sql){
        $query = $this->db->query($sql);
        return $query->result();
    }
}