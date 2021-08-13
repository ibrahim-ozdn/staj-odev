<?php

class Messages_model extends CI_Model
{

    public $tableName = "contact_messages";

    public function __construct()
    {
        parent::__construct();

    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }
}
