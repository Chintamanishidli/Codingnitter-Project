<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  // Insert user into database
  public function insert_user($data)
  {
    return $this->db->insert('users', $data);
  }

  // Get user by email and password
  public function get_user($email, $password)
  {
    $query = $this->db->get_where('users', ['email' => $email]);
    $user = $query->row();
    if ($user && password_verify($password, $user->password)) {
      return $user;
    }
    return false;
  }
}
