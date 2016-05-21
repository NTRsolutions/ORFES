<?php

class Migration_Tbl_Restaurant extends CI_Migration {

    public function up() {
        $fields = array(
            'restaurant_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'username' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'email' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'password' => array('type' => 'VARCHAR', 'constraint' => '32'),
            'status' => array('type' => 'TINYINT', 'constraint' => '1','default'=>'0'),
            'date' => array('type' => 'VARCHAR', 'constraint' => '50') 
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('restaurant_id', TRUE);
        $this->dbforge->create_table('tbl_restaurant');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_restaurant');
    }

}
