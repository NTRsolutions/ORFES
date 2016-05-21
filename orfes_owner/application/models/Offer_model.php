<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * @function name - create
     * @author - Md. Shohrab Hossain
     * @created on - 24/06/2015
     */

    public function create($data)
    {
        return $this->db->insert('tbl_offer', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function read($id)
    {
        $query = $this->db->select('*')
            ->from('tbl_offer')
            ->where('restaurant_id', $id)
            ->get();
        return $query->row();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function update($data)
    {
        $this->db->where('restaurant_id', $this->session->userdata('restaurant_id'))
            ->update('tbl_offer', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function delete($id)
    {
        //
    }
}

?>