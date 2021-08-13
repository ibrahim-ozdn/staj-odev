<?php

class Counter_model extends CI_Model
{

    public $tableName = "counter";

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($where = array(), $order = "id desc", $limit = array("count" => 0, "start" => 0))
    {
        $this->db->where($where)->order_by($order);

        if(!empty($limit))
            $this->db->limit($limit["count"], $limit["start"]);

        return $this->db->get($this->tableName)->result();
    }
}
