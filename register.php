<!DOCTYPE html>
<?php 
include"include/config.php" ;
$con=mysqli_connect("localhost","root","","hkrbrimy_ems");
?>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Registration</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new account</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="fullname" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="mobilenumber" placeholder="Mobile Number"required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label><input type="radio" class="radio" name="gender" value="Male" required> Male </label>
          <label style="margin-left: 5px;"><input type="radio" name="gender" value="Female" class="radio" required> Female</label>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="skyid" placeholder="Sky id" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fab fa-skype"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="retypepassword" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">I already have a account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<?php
  if (isset($_POST['register'])) 
  {
    $fullname=mysqli_real_escape_string($con,$_POST['fullname']);
    $mobilenumber=mysqli_real_escape_string($con,$_POST['mobilenumber']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $skyid=mysqli_real_escape_string($con,$_POST['skyid']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $retypepassword=mysqli_real_escape_string($con,$_POST['retypepassword']);
 

    $q = "SELECT mobile_number FROM registration WHERE mobile_number = '$mobilenumber'";
    $result = mysqli_query ($con, $q);
      if (mysqli_num_rows($result) != 0){
      echo '<p>Mobile Number is not acceptable because it is already registered</p>';
      }
      else{
    

    $ins="insert into registration (full_name,mobile_number,gender,email_id,sky_id,password) values ('$fullname','$mobilenumber','$gender','$email','$skyid','$password')";
    $query=mysqli_query($con,$ins);
    if ($query) {
    ?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
        Toast.fire({
          icon: 'success',
          title: 'Register SuccessFully'
        })
        setInterval(function () {
            window.location="login.php";
          }, 2000);
    });
    </script>
    <?php  
    }else{
    ?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });
        Toast.fire({
          icon: 'error',
          title: 'Some Error in server'
        })
      });
    </script>

    <?php
    }



  }
}
?>
</body>
</html>
