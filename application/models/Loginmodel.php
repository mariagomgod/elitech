<?php

class Loginmodel extends CI_Model
{
    public function login($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        $user = $query->row();
        return isset($user) && password_verify($password, $user->password);
    }
}
