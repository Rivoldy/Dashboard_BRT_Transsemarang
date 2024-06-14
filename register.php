<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trans Semarang | Register</title>
  <link rel="icon" type="image/png" href="dist/img/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    body, .card {
      background-color: #e3f2fd; /* light blue background */
    }
    .login-logo img {
      width: 170px; /* Adjust size as needed */
      height: auto;
    }
    .btn-primary {
      background-color: #ab2030; /* dark red for buttons */
      border-color: #ab2030; /* dark red for button borders */
    }
    .btn-primary:hover {
      background-color: #0056b3; /* dark blue for hover */
      border-color: #0056b3; /* dark blue for hover */
    }
    .input-group-text {
      background-color: #ffffff; /* white background for input icons */
      color: #ab2030; /* red icons */
    }
    .fas {
      color: #ab2030; /* red icons for FontAwesome */
    }
    .form-button-group {
      display: flex;
      justify-content: center; /* Center the buttons horizontally */
      width: 100%; /* Full width */
    }
    .form-button-group button {
      flex: 1; /* Equal width */
      margin: 5px; /* Space between buttons */
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="dist/img/Trans_Semarang_icon.png" alt="Trans Semarang Logo"></a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register</p>
      <form id="registerForm" action="dbregis.php" method="post" onsubmit="return validatePassword()">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" checked disabled>
              <label for="agreeTerms">
                I agree to the terms
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Custom JS -->
<script>
  function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    if (password != confirmPassword) {
      alert("Passwords do not match. Please try again.");
      return false;
    }
    return true;
  }
</script>
</body>
</html>
