<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Default_model extends CI_Model{   
    
    public function count($tableName,$where = array())
    {
        return $this->db->where($where)->count_all_results($tableName);
    }

}
