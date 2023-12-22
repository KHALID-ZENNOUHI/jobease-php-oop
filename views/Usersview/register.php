
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="Assets/styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <h2><?php if (!empty($_SESSION['error'])) echo $_SESSION['error']; ?></h2>
    <form method = "POST" action="register">
      <div class="input-box">
        <input type="text" name = "username" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name = "email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name = "password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" name = "cpassword" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name = "register" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>