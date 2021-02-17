<?php
    function cnull($value){
        return (empty($value))?'':$value;
    }
    
    function is_logged_in()
    {
        // $CI =& get_instance();
        // $id = get_session('user_id');
        
        // if(!isset($id) || empty($id)){
            return false;
        // }else{
        //     return true;
        // }
    }
    
    function get_session($data, $with_unset=FALSE){
        // $CI =& get_instance();
        
        // $sess = ($CI->session->userdata($data)) ? $CI->session->userdata($data) : false;
        // if ($with_unset){
        //     unset_session($data);    
        // }
        // return $sess; 
        return false; 
    }
    function set_session($data, $value){
        // $CI =& get_instance();
        // return $CI->session->set_userdata($data, $value);
    }

    function get_flashdata($data){
        // $CI =& get_instance();
        
        // return $CI->session->flashdata($data); 
    }
    function set_flashdata($data, $value){
        $CI =& get_instance();
        return $CI->session->set_flashdata($data, $value);
    }
    function unset_session($data){
        $CI =& get_instance();
        return $CI->session->unset_userdata($data);
    }
    
    function convert_to_option($result,$field='field'){
        $opt="";
        foreach($result as $var){
            $opt .= "<option id='".strtolower($var[$field])."'>".$var[$field]."</option>";
        }
        return $opt;
    }
    function weboption($type = "")
    {
        $CI =& get_instance();
        $where = null;
        $where["category_id"] = $type;
        $rows = $CI->db->select("*")
                                    ->from("weboption")
                                    ->where($where)
                                    ->get()
                                    ->result_array();
        foreach ($rows as $key => $value) {
            $row[$value["field"]] = $value["value"];
        }
        return $row;
    }
    function paginate($total, $per_page = 20, $uri_key = 'page', $link_suffix = '')
    {
        $CI =& get_instance();
        $per_page = intval($per_page);
        if($per_page <= 0) $per_page = 20;

        $uri_segment = null;
        $uri_array = $CI->uri->segment_array();

        foreach($uri_array as $i => $segment_name)
        {
            if($uri_key == $segment_name)
            {
                $uri_segment = $i;
                break;
            }
        }

        $is_odd = (!empty($uri_segment) and $uri_segment % 2 == 0);

        $uri = $CI->uri->uri_to_assoc( (!$is_odd ? 1 : 2) );
        unset($uri[$uri_key]);

        if(count($uri) == 1 and reset($uri) === false)
        {
            $key = reset( array_keys($uri) );
            $uri[ $key ] = 'index';
        }
        
        $CI->config->load('pagination');

        $config = $CI->config->item('pagination');
        

        $base_url = $CI->uri->assoc_to_uri($uri).'/'.$uri_key;
        if($is_odd) $base_url = $CI->uri->segment(1) . '/' . $base_url;

        $config['base_url'] = site_url( $base_url );
        $config['per_page'] = $per_page;
        $config['total_rows'] = $total;
        $config['uri_segment'] = $uri_segment + 1;

        $CI->load->library('pagination', $config);

        $links = $CI->pagination->create_links();

        if(!empty($link_suffix))
            $links = preg_replace('/'.$uri_key.'\/([0-9]+)?/', '${0}'.$link_suffix, $links);

        return $links;
    }
    function generate_link_news($title = "", $created_at = "")
    {
        return "news/" . date("Y",strtotime($created_at)) . "/" . date("m",strtotime($created_at)) . "/" . str_replace(" ","-",strtolower($title));
    }
    function generate_link_image($image_name = "")
    {
        return URL_ADMINPANEL . "upload/images/" . $image_name;
    }
    function debug_pre($data='')
    {
        echo "<pre>";var_dump($data);echo "</pre>";
    }
    function random_string($count = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $count; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }
    function is_strong_password($password = '')
    {
        $strong_regex = "/^(?=^.{8,}$)(?=(.*\\d){2})(?=(.*[A-Za-z]){2})(?=(.*[!@#$%^&*?]){2})(?!.*[\\s])^.*/";
        $sequence = "/^(?=(.*(0123|1234|2345|3456|4567|5678|6789|7890)))|(?=(.*(abcd|bcde|cdef|defg|efgh|fghi|ghij|hijk|ijkl|jklm|klmn|lmno|mnop|nopq|opqr|pqrs|qrst|rstu|stuv|tuvw|uvwx|vwxy|wxyz)))/";
        if (preg_match($strong_regex,$password)) {
            if (preg_match($sequence,$password)) {
                return false;
            }else{
                return true;
            }
        } else {
            if (preg_match($sequence,$password)) {
                return false;
            }else{
                return false;
            }
        }
    }
    function generate_password($password)
    {
        return md5(htmlspecialchars(trim($password)));
    }

    function date_difference($date_1 , $date_2 , $differenceFormat = '%a' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        
        $interval = date_diff($datetime1, $datetime2);
        
        return $interval->format($differenceFormat);
    }
    
    function encode_url($string, $key="", $url_safe=TRUE)
    {
        if($key==null || $key=="")
        {
            $key="tyz_mydefaulturlencryption";
        }
          $CI =& get_instance();
        $ret = $CI->encrypt->encode($string, $key);

        if ($url_safe)
        {
            $ret = strtr(
                    $ret,
                    array(
                        '+' => '.',
                        '=' => '-',
                        '/' => '~'
                    )
                );
        }

        return $ret;
    }
    function decode_url($string, $key="")
    {
         if($key==null || $key=="")
        {
            $key="tyz_mydefaulturlencryption";
        }
            $CI =& get_instance();
        $string = strtr(
                $string,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
                )
            );

        return $CI->encrypt->decode($string, $key);
    }
    
    function is_json($string) {
        return ((is_string($string) &&
                (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }
    function validate_date($date, $format = 'Y-m-d H:i:s'){
        
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    function get_kurawal($value='')
    {
        preg_match('/\{(.*?)\}/', $value, $m);
        return $m;
    }
    function get_language()
    {
        $lang["id"] = "ID";
        $lang["en"] = "EN";
        return $lang;
    }
    function default_language()
    {
        return "id";
    }
    function language()
    {
        return (get_session("lang")) ? get_session("lang") : default_language();
    }
    
    function json_decode_table($result, $lang = ""){        
        $arr = null;
        if ($result){
            foreach ($result as $key => $value) {

                $value = is_json($value) ? json_decode($value,true) : $value;    
                
                $arr[$key] = ($lang) ? ( isset ($value[$lang])  ? ( !empty($value[$lang]) ? $value[$lang] : $value[default_language()] ) : $value ) : $value;
            }    
        }
        
        return $arr;
    }
    function each_json_decode($table)
    {
        $lang = (get_session("lang")) ? get_session("lang") : default_language();
        $arr = null;

        foreach ($table as $key => $value) {
            $arr[] = json_decode_table($value, $lang);
            
        }    
        return $arr;
    }


    function generate_link($value)
    {
        $value = str_replace("<br>", "-", $value);
        $value = str_replace("/", "-", $value);
        
        return str_replace(array(" ", "<", ">", "&", "{", "}", "(", ")", "*", ",", ".", "?"), array("-"), strtolower($value));
    }
   
    function image_get_src($id=''){
        if(empty($id)){
            return '';
        }
        else{
            $db = db_connect();
            $builder = $db->table('image_path')->where(['id' => $id]);
            $ret = $builder->get()->getRowArray();
            
            return 'storage/' . $ret["path"] . $ret["name"];
        }
    }

    function image_get($id ='')
    {
        $where = null;
        $where["id"] = $id;
        $db = db_connect();
        $builder = $db->table('image_path')->where($where)->get()->getRowArray();
        return $builder;
    }

    function get_sub_video_section($where ='')
    {
        if(!empty($where)){
            $db = db_connect();
            $ret = $db->table("video_sub_section")->where($where)->get()->getResultArray();
            return $ret;
        }
        else{
            return array();
        }
    }