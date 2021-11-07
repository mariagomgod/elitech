<?php

class Employeemodel extends CI_Model 
{
    public function find_all() 
    {
        $query = $this->db->get('employees');
        return $query->result();
    }

    public function find_one($id)
    {
        $query = $this->db->get_where('employees', array('id' => $id));
        return $query->row();
    }

    public function insert($employee)
    {
        $this->db->insert("employees", $employee);
    }

    public function update($id, $employee)
    {
        $this->db->update("employees", $employee, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->delete('employees', array('id' => $id));
    }
}