<?php

class Employee extends CI_Model 
{
    public $name;
    public $surname1;
    public $surname2;
    public $address;

    public function find_all() 
    {
        $query = $this->db->get('employees');
        return $query->result();
    }
}