<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Date_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * @function name - gm_date
     * @parameter - no parameters
     * @return - date
     * @author - Md. Shohrab Hossain
     * @created on - 18/05/2015
     */

    function gm_date() {
        $hour = gmdate("H") + 6;
        $minute = gmdate("i");
        $second = gmdate("s");
        $year = gmdate("Y");
        $month = gmdate("m");
        $day = gmdate("d");
        return date("Y-m-d h:i:s", mktime($hour, $minute, $second, $month, $day, $year));
    }

    /*
     * @function name - e2b_date
     * @parameter - no parameters
     * @return - bangla date
     * @author - Md. Shohrab Hossain
     * @created on - 28/07/2015
     */

    function e2b_date() {
        $en_date = $this->gm_date();
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
        $bn_date = str_replace($engNumber, $bangNumber, $en_date);
        return $bn_date;
    }

    /*
     * @function name - b2e_date
     * @parameter - no parameters
     * @return - english date
     * @author - Md. Shohrab Hossain
     * @created on - 28/07/2015
     */

    function b2e_date($en_date) {
//        $en_date = $this->gm_date();
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
        $bn_date = str_replace($engNumber, $bangNumber, $en_date);
        return $bn_date;
    }

}
