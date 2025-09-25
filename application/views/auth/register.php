<!DOCTYPE html>
<html>

<head>
  <title>Registration Form</title>
</head>

<body>
  <h2>Registration Form</h2>
  <form method="post" action="<?php echo base_url('index.php/auth/registerUser'); ?>">
    <label>First Name:</label>
    <input type="text" name="firstname" required><br><br>


    <label>Last Name:</label>
    <input type="text" name="lastname" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" required><br><br>

    <button type="submit">Register</button>
  </form>

</body>

</html>