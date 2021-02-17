<?php 
    
    /**
     * db_
     * 
     * @package php_project
     * @author MalikSatrio
     * @copyright 2014
     * @version 1.01
     * @access public
     */
    class db_ {
        
        protected $_ci;
        protected $_name;
        /**
         * db_::__construct()
         * 
         * @return void
         */
        function __construct() {
            $this->_ci=&get_instance();     
            
        }
        
        /**
         * db_::count()
         * 
         * @param mixed $table
         * @param mixed $where
         * @return
         */
        function count($table,$where=array())
        {
            if ( ! empty($where) ) 
                $this->_ci->db->where($where);
            
            return $this->_ci->db->count_all_results($table);
        }

        /**
         * db_::get()
         * 
         * @param mixed $table
         * @param string $select
         * @param mixed $where
         * @param string $order_by
         * @param string $limit
         * @param string $offset
         * @return
         */
        function get($table,$select='',$where='',$order_by='',$limit='',$offset='')
        {
            $this->_ci->db->select($select,FALSE)->from($table);

            if ( ! empty($where) ) 
                $this->_ci->db->where($where);
            
            if ( ! empty($order_by) ) 
                $this->_ci->db->order_by($order_by);
                
            if ( ! empty($limit) ) 
                $this->_ci->db->limit($limit,$offset);
                
            $object = $this->_ci->db->get();
            
            /*if ($table=="share_log"){
                var_dump($this->_ci->db->last_query());
                exit();    
            }*/
            
            
            if ( $limit != '' )
            {
                $object->num_row_no_limit = $this->count($table,$where);    
            }
            
            return $object;
        }

        /**
         * db_::insert()
         * 
         * @param mixed $table
         * @param mixed $vars
         * @return
         */
        function insert($table,$vars,$returning='') 
        {
            foreach($vars as $k=>$v){
                switch ($v) {
                    
                    case 0:
                    default:
                        $insert[$k]=$v;
                        break;
                    case '':
                        $insert[$k]=null;
                        break;
                }
               
            }
            
            return $this->_ci->db->insert($table,$insert,$returning);
        }
        /**
         * db_::update()
         * 
         * @param mixed $table
         * @param mixed $where
         * @param mixed $vars
         * @return
         */
        function update($table,$where,$vars) 
        {
            if ( ! empty($where) ) 
                $this->_ci->db->where($where);
            
            return $this->_ci->db->update($table,$vars);
        }
        /**
         * db_::delete()
         * 
         * @param mixed $table
         * @param mixed $where
         * @return
         */
        function delete($table,$where=array()) 
        {
            if ( ! empty($where) ) $this->_ci->db->where($where);
            return $this->_ci->db->delete($table); 
        }
         
        /**
         * db_::get_one_field()
         * 
         * @param mixed $table
         * @param mixed $field
         * @param mixed $where
         * @return
         */
        function get_one_field($table,$field,$where=array())
        {
            $object_result = $this->get($table,$field,$where);
            $result = $object_result->row_array();     
            if  ($object_result->num_rows() === 0) 
                return '';
            else     
                return $result[$field];
        }
        /**
         * db_::get_max_field()
         * 
         * @param mixed $table
         * @param mixed $field
         * @param mixed $where
         * @return
         */
        function get_max_field($table,$field,$where=array())
        {
            $this->_ci->db->select_max($field);
            $this->_ci->db->from($table);
            if ( ! empty($where) ) $this->_ci->db->where($where);
            $object_result = $this->_ci->db->get();
            $result = $object_result->row_array();
            return $result[$field];
        }
        function convert_array($vars=null,$escape="'"){
            $ret='';
            if (is_array($vars)){
                foreach($vars as $var){
                    $ret .= $escape . $var . $escape . ',' ;      
                }
                $ret = substr($ret,0,-1);
            }else{
                $ret .= $escape . $var . $escape ;
            }
            return $ret;
        }
        /**
         * db_::convert_column()
         * 
         * @param mixed $columns
         * @return
         */
        function convert_column($columns=array(),$with_as=TRUE){
            $column='';
            if (!empty($columns))
            {
                if (is_array($columns))
                {
                    
                    while (list($key, $value) = each($columns))
                    {
                        $as = ($with_as) ? " as \"{$value}\"," : ",";
                        $column .= $key . $as;
                    }
                    $column = substr($column,0,-1);
                }
            }
            return $column;
        }
        
    }
    