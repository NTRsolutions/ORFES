<?php

class Migration_Tbl_Information extends CI_Migration {

    public function up() {
        $fields = array(
            'info_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'restaurant_id' => array('type' => 'INT', 'constraint' => '11'),
            'hotline_number' => array('type' => 'VARCHAR', 'constraint' => '20'),
            'opening_time' => array('type' => 'VARCHAR', 'constraint' => '120'),
            'address' => array('type' => 'VARCHAR', 'constraint' => '250'),
            'postal_code' => array('type' => 'VARCHAR', 'constraint' => '10'),
            'police_station' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'district_city' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'state_division' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'country' => array('type' => 'VARCHAR', 'constraint' => '50'), 
            'image' => array('type' => 'VARCHAR', 'constraint' => '100'),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('info_id', TRUE);
        $this->dbforge->create_table('tbl_information');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_information');
    }

}
