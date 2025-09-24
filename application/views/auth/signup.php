<!DOCTYPE html>
<html>

<head>
  <title>Signup</title>
</head>

<body>
  <h2>Signup</h2>

  <?php if ($this->session->flashdata('success')): ?>
    <p style="color:green;"><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <form method="post" action="<?php echo site_url('auth/signup_post'); ?>">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Signup</button>
  </form>

  <p>Already have an account? <a href="<?php echo site_url('auth/login'); ?>">Login</a></p>
</body>

</html>