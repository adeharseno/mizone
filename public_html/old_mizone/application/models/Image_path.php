<?php if(!defined('BASEPATH')) exit('No direct script access allowed');    
class image_path extends CI_Model {
    function get_id($data)
    {
        $path = isset($data["path"]) ? $data["path"] : "";
        $name = isset($data["name"]) ? $data["name"] : "";
        $id = isset($data["id"]) ? $data["id"] : "";

        $insert["path"] = $path;
        $insert["name"] = $name;

        if ($id){
            $this->db->update("image_path", $insert, array("id"=>$id));
            set_flashdata("success_message", "Update Success");
        }else {
            $insert["created_at"] = date('Y-m-d H:i:s');
            $this->db->insert("image_path", $insert);    
            $id = $this->db->insert_id();
            set_flashdata("success_message", "Save Success");
        }   


        return $id;
    }
    function get_id_array($data)
    {
        foreach ($data as $key => $value) {    
            $img[$key] = ($value["path"] AND $value["name"]) ? $this->get_id($value) : "";
        }
        
        return $img;
    }
    function get($id ='')
    {
        $where = null;
        $where["id"] = $id;
        $row = $this->db
                        ->from('image_path')
                        ->where($where)
                        ->get()->row_array();
        return $row;
    }
    function get_src($id='')
    {
        $row = $this->get($id);

        return "storage/" . $row["path"] . $row["name"];
    }
}