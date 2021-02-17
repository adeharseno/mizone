<?php if(!defined('BASEPATH')) exit('No direct script access allowed');    
class Options extends CI_Model {
    public function get_setting($for = '')
    {
        $row = $this->db->select("*")
                            ->from("settings")
                            ->where("id",1)
                            ->get()->row_array();
        $row = json_decode_table($row);
        $row = $row["json"];
        if ($for){
            $row = isset($row[$for]) ? $row[$for] : $row;
        }
        return $row;
        
    }
    
}