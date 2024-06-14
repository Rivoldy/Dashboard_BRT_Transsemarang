<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trans Semarang | Log in</title>
  <link rel="icon" type="image/png" href="dist/img/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body, .card {
      background-color: #e3f2fd; /* light blue background */
    }
    .login-logo img {
      width: 170px; /* Adjust size as needed */
      height: auto;
    }
    .btn-primary i {
            color: white; /* Warna ikon putih */
        }
    .btn-primary, .btn-secondary {
      background-color: #ab2030; /* darker blue for buttons */
      border-color: #ab2030; /* darker blue for button borders */
    }
    .btn-primary:hover, .btn-secondary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .input-group-text {
      background-color: #ffffff; /* white background for input icons */
      color: #ab2030; /* blue icons */
    }
    .fas {
      color: #ab2030; /* blue icons for FontAwesome */
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
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-button-group">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-sign-in-alt"></i> Sign In
    </button>
</div>

      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
