<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    private $file_path = "assets/server/database/";

    /*
     * @function name - backup 
     * @author - Md. Shohrab Hossain
     * @created on - 25/07/2015
     */

    public function backup()
    {
        # Load the DB utility class
        $this->load->dbutil();
        # Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();
        # Load the file helper and write the file to your server
        $this->load->helper('file');
        # ----------------------------------------
        // $file_path = "assets/server/database/";
        $file_path = $this->file_path;
        $path_explode = @explode('/', $file_path);
        if (!is_dir($file_path)) {
            @mkdir($path_explode[0], 0755);
            @mkdir($path_explode[0] . '/' . $path_explode[1], 0755);
            @mkdir($path_explode[0] . '/' . $path_explode[1] . '/' . $path_explode[2], 0755);
            @mkdir($path_explode[0] . '/' . $path_explode[1] . '/' . $path_explode[2] . '/' . $path_explode[3], 0755);
        }
        # ----------------------------------------
        write_file($file_path . "backup_" . date('d_m_Y') . ".gz", $backup);
        # Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download("backup_" . date('d_m_Y') . ".sql.gz", $backup);
    }

}

?>