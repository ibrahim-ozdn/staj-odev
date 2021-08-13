<?php

class Screenshots_images_model extends CI_Model
{

    public $tableName = "screenshot_images";

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }
}
