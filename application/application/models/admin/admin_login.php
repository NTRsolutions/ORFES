<?php

/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 03.Mar.16
 * Time: 06:18 PM
 */
class Admin_Login extends CI_Model
{
    private $id;

    public function login_process($username, $password)
    {
        $flag = false;

        $query = $this->db->get_where("admins", array("username" => $username, "password" => $password));

        if ($query->num_rows() == 1) {
            //$data = $query->row();

            //$this->id = $data->u_id;

            $flag = true;
        }

        return $flag;
    }

    public function session_creating()
    {
        return $this->id;
    }
}

?>