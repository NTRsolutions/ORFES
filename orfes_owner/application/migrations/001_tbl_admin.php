<?php

class Migration_Tbl_Admin extends CI_Migration {

    public function up() {
        $fields = array(
            'user_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'email' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'password' => array('type' => 'VARCHAR', 'constraint' => '32'),
            'address' => array('type' => 'VARCHAR', 'constraint' => '250'),
            'ip_address' => array('type' => 'VARCHAR', 'constraint' => '20'),
            'status' => array('type' => 'TINYINT', 'constraint' => '1','default'=>'1'),
            'last_login' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'join_date' => array('type' => 'VARCHAR', 'constraint' => '50'),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('tbl_admin');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_admin');
    }

}
