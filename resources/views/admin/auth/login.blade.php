<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vendor/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Custom CSS for Glassy Effect -->
  <style>
    body {
      background: url('path-to-your-background-image.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: gray;
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }
    h1 {
      font-size: 2.5rem;
      color: #000;
      margin-bottom: 40px; /* Space between h1 and card */
      margin-left: 50px;
    }
    .login-box {
      width: 360px;
      padding: 30px;
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.8);
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      margin-bottom: 100px;
      margin-left: 50px;
      text-align: center;
    }
    .login-box h3 {
      font-size: 1.5rem;
      color: #grey;
      margin-bottom: 2rem;
    }
    .form-control {
      background: rgba(255, 255, 255, 0.3);
      border: 1px solid #007bff;
      color: #000;
      border-radius: 10px;
      padding: 12px 50px;
      margin-bottom: 1rem;
      position: relative;
    }
    .form-control::placeholder {
      color: #6c757d;
    }
    .input-group-text {
      background: rgba(255, 255, 255, 0.3);
      border: 1px solid #007bff;
      color: #000;
      border-radius: 10px;
    }
    .form-control::before {
      content: attr(data-icon);
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      font-family: 'Font Awesome 5 Free';
      font-weight: 900;
      color: #007bff;
    }
    .form-control[data-icon="email"]::before {
      content: "\f0e0"; /* fa-envelope */
    }
    .form-control[data-icon="password"]::before {
      content: "\f023"; /* fa-lock */
    }
    .form-control.input-with-icon {
      padding-left: 35px; /* Adjust padding to fit icon */
    }
    .btn-primary {
      background: rgba(0, 123, 255, 0.6);
      border: none;
      color: #000;
      border-radius: 5px;
      font-size: 16px;
      width: 85px;
      height: 40px;
      margin-left: 180px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .btn-primary:hover {
      background: rgba(0, 123, 255, 0.8);
    }
    .icheck-primary input[type="checkbox"] + label {
      color: #000;
      margin-left: -120px;
      margin-bottom: 20px;
    }
    .alert-danger {
      background: rgba(255, 0, 0, 0.3);
      border: none;
      color: #000;
      border-radius: 10px;
      margin-bottom: 1rem;
    }
    .login-box-msg {
      font-size: 1.2rem;
      font-weight: bold;
      color: #000;
    }
  </style>
</head>
<body>
<h1>Login</h1>
<div class="login-box">
  <h3>Sign in to start your session</h3>

  @if (session()->has('loginError'))
  <div class="alert alert-danger">{{ session('loginError') }}</div>
  @endif

  <form action="/login/do" method="post">
    @csrf
    <div class="input-group mb-3">
      <input type="email" class="form-control input-with-icon" name="email" placeholder="Email" data-icon="email">
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control input-with-icon" name="password" placeholder="Password" data-icon="password">
    </div>
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember"> Remember Me </label>
        </div>
      </div>
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
    </div>
  </form>
</div>

<!-- jQuery -->
<script src="vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vendor/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
