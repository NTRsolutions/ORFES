<?php

class Migration_Tbl_Item extends CI_Migration {

    public function up() {
        $fields = array(
            'item_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'restaurant_id' => array('type' => 'INT', 'constraint' => '11'),
            'category' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'item_type' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'item_name' => array('type' => 'VARCHAR', 'constraint' => '120'),
            'about' => array('type' => 'VARCHAR', 'constraint' => '250'),
            'regular_price' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'special_price' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'image' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'status' => array('type' => 'TINYINT', 'constraint' => '1','default'=>'0'),
            'date' => array('type' => 'VARCHAR', 'constraint' => '50') 
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('item_id', TRUE);
        $this->dbforge->create_table('tbl_item');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_item');
    }

}
