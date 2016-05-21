<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * @function name - create 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function create($data) {
        return $this->db->insert('tbl_admin', $data);
    }

    /*
     * @function name - read 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function read() {
        $query = $this->db->select('*')
                ->from('tbl_admin')  
                ->get()
                ->result();
        return $query;
    }
    /*
     * @function name - read_by_id 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function read_by_id($table,$id) {
        $query = $this->db->select('*')
                ->from($table)  
                ->where('user_id',$id)
                ->get()
                ->row();
        return $query;
    }

    /*
     * @function name - update 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function update($table,$data) {
         $this->db->where('user_id',  $this->session->userdata('user_id'))
                 ->update($table, $data);
         return TRUE;
    }
    /*
     * @function name - update_status 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function update_status($table,$user_id,$status_value) {
         $this->db->set('status',$status_value)
                 ->where('user_id',  $user_id)
                 ->update($table);
         return TRUE;
    }
    /*
     * @function name - update_by_email 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function update_by_email($table,$data) {
         $this->db->set('password',  md5($data))
                 ->where('email',  $this->input->post('email'))
                 ->update($table);
         return TRUE;
    }

    /*
     * @function name - delete 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function delete($table,$id) { 
        $this->db->where("user_id",$id);
        $this->db->where_not_in("status",9); 
        $this->db->delete($table);
    }
    
    /*
     * @function name - check_admin_signin 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function check_admin_signin() {  
        $data = $this->db->select("*")
                ->from('tbl_admin')
                ->where('email',  $this->security->xss_clean($this->input->post('email')))
                ->where('password',  $this->security->xss_clean($this->input->post('password')))
                ->group_start()
                    ->where('status',  9)
                    ->or_where('status',  1)
                ->group_end()
                ->get();
        return $data;
    }
    
    /*
     * @function name - check_email_exits 
     * @author - Md. Shohrab Hossain
     * @created on - 13/07/2015
     */

    public function check_email_exits() {  
        $data = $this->db->select("*")
                ->from('tbl_admin')
                ->where('email',  $this->security->xss_clean($this->input->post('email'))) 
                ->group_start()
                    ->where('status',  9)
                    ->or_where('status',  1)
                ->group_end()
                ->get();
        return $data->num_rows(); 
    }
     
    
    

}

?>