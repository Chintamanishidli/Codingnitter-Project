<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('email'); // Load email library
    $this->load->helper(array('form', 'url'));
  }

  // Load Registration Form
  public function register()
  {
    $this->load->view('auth/register');
  }


  // Handle Form Submission
  public function registerUser()
  {
    $firstname = $this->input->post('firstname');
    $lastname  = $this->input->post('lastname');
    $email     = $this->input->post('email');
    $phone     = $this->input->post('phone');

    // Log registration attempt
    log_message('info', "New registration attempt: $firstname $lastname, Email: $email, Phone: $phone");

    // ✅ Save to database
    $data = array(
      'firstname' => $firstname,
      'lastname'  => $lastname,
      'email'     => $email,
      'phone'     => $phone
    );

    $this->load->database(); // Ensure database is loaded
    if ($this->db->insert('registration', $data)) {
      log_message('info', "User $email saved to database successfully.");
    } else {
      log_message('error', "Failed to save user $email to database.");
      echo "Registration failed! Please try again.";
      return;
    }

    // ✅ Email configuration
    $config = array(
      'protocol'    => 'smtp',
      'smtp_host'   => 'smtp.hostinger.com',
      'smtp_port'   => 465,
      'smtp_user'   => 'info@siddhrans.in',
      'smtp_pass'   => 'Info@siddhrans1',
      'smtp_crypto' => 'ssl',
      'mailtype'    => 'text',
      'charset'     => 'utf-8',
      'wordwrap'    => TRUE,
      'newline'     => "\r\n",
      'crlf'        => "\r\n"
    );

    $this->load->library('email', $config);
    $this->email->initialize($config);

    // ✅ Send confirmation email to user
    $this->email->from('info@siddhrans.in', 'Siddhrans CRM Team');
    $this->email->to($email);
    $this->email->subject('Registration Successful');
    $this->email->message("Hello $firstname $lastname,\n\nThank you for registering with us!\n Your registration has been completed successfully. You can now log in using your credentials and start exploring our services. If you face any issues or have questions, feel free to reach out to our support team at info@siddhrans.in Welcome aboard!\n\nThanks,\nSiddhrans CRM Team");

    if ($this->email->send()) {
      log_message('info', "Confirmation email sent to $email");
    } else {
      log_message('error', "Failed to send confirmation email to $email: " . $this->email->print_debugger());
    }

    // ✅ Send registration details to admin
    $this->email->clear();
    $this->email->from('info@siddhrans.in', 'Siddhrans CRM Team');
    $this->email->to('info@siddhrans.in'); // admin email
    $this->email->subject('Registration Successful');
    $this->email->message("New user registered:\n\nFirst Name: $firstname\nLast Name: $lastname\nEmail: $email\nPhone: $phone");

    if ($this->email->send()) {
      log_message('info', "Admin notified about new registration: $email");
    } else {
      log_message('error', "Failed to notify admin: " . $this->email->print_debugger());
    }

    echo '<div style="padding:15px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:6px; font-family:Arial; margin:20px 0;">
        🎉 Registration successful! A confirmation email has been sent your Email.
      </div>';
  }
}
