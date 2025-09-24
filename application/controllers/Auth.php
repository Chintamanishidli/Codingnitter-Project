<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper(['url', 'form']);
    $this->load->model('User_model');
  }

  // Show login page
  public function login()
  {
    $this->load->view('auth/login');
  }

  // Handle login submission
  public function login_post()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->User_model->get_user($email, $password);
    if ($user) {
      $this->session->set_userdata('user_id', $user->id);
      echo "Login successful!"; // Replace with dashboard redirect later
    } else {
      $this->session->set_flashdata('error', 'Invalid email or password');
      redirect('auth/login');
    }
  }

  // Show signup page
  public function signup()
  {
    $this->load->view('auth/signup');
  }

  // Handle signup submission
  public function signup_post()
  {
    $data = [
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    ];
    $this->User_model->insert_user($data);
    $this->session->set_flashdata('success', 'Account created! You can login now.');
    redirect('auth/login');
  }
}
