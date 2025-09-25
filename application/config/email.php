<?php


$config['protocol']    = 'smtp';
$config['smtp_host']   = 'smtp.hostinger.com';
$config['smtp_port']   = 465;                  // SSL (or 587 for TLS)
$config['smtp_user']   = 'info@siddhrans.in';  // full email
$config['smtp_pass']   = 'Info@siddhrans1';    // cPanel email password
$config['smtp_crypto'] = 'ssl';                // or 'tls' if using 587
$config['mailtype']    = 'text';
$config['charset']     = 'utf-8';
$config['wordwrap']    = TRUE;
$config['newline']     = "\r\n";               // important for Hostinger
$config['crlf']        = "\r\n";               // important for Hostinger
