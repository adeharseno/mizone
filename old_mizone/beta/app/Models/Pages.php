<?php if(!defined('BASEPATH')) exit('No direct script access allowed');    
class Pages extends CI_Model {
    
    function get_content($type, $value_json)
    {
        $default_lang = default_language();
        $json = json_decode($value_json, true);
        $contents = isset($json[get_session("lang")][$type]) ? $json[get_session("lang")][$type] : $json[$default_lang][$type];


        
        foreach ($contents as $key => $value) {
            if (is_array($value)){
                $content_[$key] = ($value["path"] OR $value["text"]) ? $value : $json[$default_lang][$type][$key];
            }else{
                $content_[$key] = ($value) ? $value : $json[$default_lang][$type][$key];    
            }
        }
        return $content_;
    }
    function get_table($table)
    {
        // ------------------------------------------------------------------------------------------------------------------------------
        // DARI SECTION INDEX
        // ------------------------------------------------------------------------------------------------------------------------------
        $where_link = get_session("where_link");
        // ------------------------------------------------------------------------------------------------------------------------------
        $page_section_limit = get_session("page_section_limit");
        $page_section_where = get_session("page_section_where");

        $where = null;
        $where["flag"] = 0;
        if (is_numeric($page_section_limit)){
            $this->db->limit($page_section_limit);
        }
        
        switch ($page_section_where) {
            case 'with-link':
                if ($where_link){
                    $where["link"] = $where_link;
                }
                break;
            case 'with-category':
                if ($where_link){
                    $where["category"] = $where_link;
                }
                break;
            case 'not-in-link':
                if ($where_link){
                    $where["link <> '".$where_link."'"] = null;
                }
                break;
        }
        
        $tables = $this->db->select("*")
                            ->from($table)
                            ->where($where)
                            ->order_by("order_by")
                            ->get()
                            ->result_array();
        
        $lang = (get_session("lang")) ? get_session("lang") : default_language();
        
        $arr = null;
        if ($tables){
            foreach ($tables as $key => $value) {
                $arr[] = json_decode_table($value, $lang);
            }    
        }
        
        return $arr;
    }
    function get_field($value)
    {
        // ------------------------------------------------------------------------------------------------------------------------------
        // DARI SECTION INDEX
        // ------------------------------------------------------------------------------------------------------------------------------
        $where_link = get_session("where_link");
        // ------------------------------------------------------------------------------------------------------------------------------
        $ret = $value;
        $final = get_kurawal($value);

        if (isset($final[0])){
            $explode = explode(".", $final[1]);
            $where = null;
            $where["flag"] = 0;
            if ($where_link){
                $where["link"] = $where_link;
            }
            $ret = $this->db->select($explode[1])
                                ->from($explode[0])
                                ->where($where)
                                ->get()
                                ->row_array();
            $ret = json_decode_table($ret, get_session("lang"));
            $ret = $ret[$explode[1]];

        }
        return $ret;
    }
    public function get_value_field($field, $row_table)
    {
        $original_field = $field;
        $regex = get_kurawal($field);
        
        
        if (isset($regex[0])){
            $field = $regex[1];
        }
        
        $field = (substr($field, 0, 1) == ".") ? $row_table[str_replace(".", "", $field)] : $field;

        
        
        $field = (isset($regex[0])) ? str_replace($regex[0], $field, $original_field) : $field;

        return $field;
    }
    function get_value($content, $row_table = null)
    {
        // ------------------------------------------------------------------------------------------------------------------------------
        // JIKA ARRAY
        // ------------------------------------------------------------------------------------------------------------------------------
        if (is_array($content)){
            // ------------------------------------------------------------------------------------------------------------------------------
            // JIKA ARRAY TERUS GAMBAR
            // ------------------------------------------------------------------------------------------------------------------------------
            if (isset($content["path"])){
                $src = $content["path"] . $content["name"];
                // ------------------------------------------------------------------------------------------------------------------------------
                if ( ! empty($src) ){
                    // ------------------------------------------------------------------------------------------------------------------------------
                    // JIKA PATH GAK KOSONG
                    // ------------------------------------------------------------------------------------------------------------------------------
                    $content = "storage/" . $src;
                    // ------------------------------------------------------------------------------------------------------------------------------
                }else{
                    // ------------------------------------------------------------------------------------------------------------------------------
                    // JIKA PATH KOSONG MAKA LANGSUNG CARI BERDASARKAN FIELD TABLE
                    // ------------------------------------------------------------------------------------------------------------------------------
                    $content = $this->image_path->get_src($this->get_value_field($content["text"], $row_table));     
                    // ------------------------------------------------------------------------------------------------------------------------------
                }
                // ------------------------------------------------------------------------------------------------------------------------------
            }
            // ------------------------------------------------------------------------------------------------------------------------------
        }else{
            // ------------------------------------------------------------------------------------------------------------------------------
            // UNTUK FIELD TABLE
            // ------------------------------------------------------------------------------------------------------------------------------
            $content = $this->get_value_field($content, $row_table);
            


            if (validate_date($content)) {
                $content = date("d F Y", strtotime($content));
            }    
            // ------------------------------------------------------------------------------------------------------------------------------
        }
        // ------------------------------------------------------------------------------------------------------------------------------
        return $content;
    }
    function generate_content($content, $value = null)
    {
        $content_ = null;
        if ($content){
            foreach ($content as $k => $v) {
                $content_[$k] = $this->get_value($v, $value); 
            }
        }
        return $content_;
    }
    function each_content($contents, $view)
    {
        
        foreach ($contents as $key => $value){
            set_session("page_section_limit", $value["limit"]);
            set_session("page_section_where", $value["where"]);

            $this->pages->if_table($value["table"], $value["json"], $view);
        } 

    }
    function if_table($table, $json, $view)
    {
        $content = $this->get_content("main", $json);
        
        if ($table){
            $tables = $this->get_table($table);
                        
            $i = 1;
            if ($tables){
                foreach ($tables as $key => $value){ 

                    $data["content"] = $this->generate_content($content, $value);
                    $data["value"] = $value;
                    $data["i"] = $i;
                    $data["count"] = count($tables);
                    echo $this->load->view("section/" . $view . "-item", $data, TRUE);
                    $i++;
                }     
            }
            
        }else{
            $data["content"] = $this->generate_content($content);
            $data["value"] = null;
            echo $this->load->view("section/" . $view . "-item", $data, TRUE);
        }
    }
    function if_table_row($contents)
    {
        $table = $contents["table"];
        set_session("page_section_limit", $contents["limit"]);
        set_session("page_section_where", $contents["where"]);
        $tables = null;
        if ($table){
            $tables = $this->get_table($table);
        }
        
        return isset($tables[0]) ? $tables[0] : null;
    }
    function load_view_form($file)
    {
        $data = null;

        if (file_exists(APPPATH . "views/form/". $file . EXT)){
            echo $this->load->view("form/" . $file, $data, TRUE);
        }
    }
    function get_content_row($type, $contents)
    {
        $content = null;
        
        foreach ($contents as $key => $value){
            $c = $this->pages->generate_content($this->pages->get_content($type, $value["json"]), $this->pages->if_table_row($value));
            
            $i = 0;
            $first_key = null;
            foreach ($c as $key_c => $value_c) {
                
                if ($i == 0){
                    $first_key = $key_c;
                }
                $i++;
            }
            if (!empty($c[$first_key])){
                $content = $c; 
            }
        }
        
        

        return $content;
    }
}