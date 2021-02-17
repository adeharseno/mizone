<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Image_path extends Model {
    function get_id($data)
    {
        $path = isset($data["path"]) ? $data["path"] : "";
        $name = isset($data["name"]) ? $data["name"] : "";
        $id = isset($data["id"]) ? $data["id"] : "";

        $insert["path"] = $path;
        $insert["name"] = $name;

        $db = db_connect();
        // var_dump($id);
        if ($id){
            // $this->db->update("image_path", $insert, array("id"=>$id));
            $db->table("image_path")->where("id", $id)->update($insert);
            
            // $this->session->markAsFlashdata("success_message", "Update Success");
        }else {
            $insert["created_at"] = date('Y-m-d H:i:s');
            $query = $db->table("image_path")->insert($insert);
            $id = $db->insertID();
            // $this->session->markAsFlashdata("success_message", "Save Success");
        }   
        // var_dump('db');
        // dd($id);

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