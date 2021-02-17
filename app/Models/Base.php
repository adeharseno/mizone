<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Base extends CI_Model {
        


        function field($field, $table, $id)
        {
            $where = null;
            $where["id"] = $id;
            $row = $this->db->select($field)
                                ->from($table)
                                ->where($where)
                                ->get()
                                ->row_array();

            $row = json_decode_table($row, default_language());
            return $row[$field];

            
        }
    }