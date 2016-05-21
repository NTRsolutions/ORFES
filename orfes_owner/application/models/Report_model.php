<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function country_visitor($table_name) {
        $query = $this->db->select('country, COUNT(country) AS country_users')
                ->from($table_name)
                ->group_by('country')
                ->get()
                ->result();
        return $query;
    }

    public function count_in_year($table_name, $year, $count_item) {
        $query = $this->db->select("$count_item, COUNT($count_item) AS count_users")
                ->from($table_name)
                ->like($count_item, $year)
                ->get();
        return $query->row();
    }


    public function count_in_month($table_name, $year, $count_item) {
        $query = $this->db->query("SELECT
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-01%') AS jan,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-02%') AS feb,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-03%') AS mar,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-04%') AS apr,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-05%') AS may,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-06%') AS jun,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-07%') AS jul,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-08%') AS aug,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-09%') AS sep,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-10%') AS oct,
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-11%') AS nov, 
            (SELECT COUNT(`$count_item`) FROM `$table_name` WHERE `$count_item` LIKE '%$year-12%') AS de  
            ");
        return $query->row();
    }

}
 