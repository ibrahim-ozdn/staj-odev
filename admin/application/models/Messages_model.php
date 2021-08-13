<?php

class Messages_model extends CI_Model
{

    public $tableName = "contact_messages";

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
}
