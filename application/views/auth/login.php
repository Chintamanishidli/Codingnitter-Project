<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>
  <h2>Login</h2>

  <?php if ($this->session->flashdata('error')): ?>
    <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>

  <form method="post" action="<?php echo site_url('auth/login_post'); ?>">
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
  </form>

  <p>Don't have an account? <a href="<?php echo site_url('auth/signup'); ?>">Sign up</a></p>
</body>

</html>