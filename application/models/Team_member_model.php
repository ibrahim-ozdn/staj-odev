<?php

class Team_member_model extends CI_Model
{

    public $tableName = "team_member";

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
