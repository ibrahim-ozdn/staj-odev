<?php

class Social_model extends CI_Model
{

    public $tableName = "social_media";

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }
}
