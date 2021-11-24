<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from registration where Approve_status=0";
	$query=mysqli_query($con,$ins);
?>

  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Approve Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Employee list</label>
                    <select class="form-control" name="emp_name">
                    	<?php
                    	while($res=mysqli_fetch_array($query))
                    	{
                    	?>
                    	<option value="<?php echo $res['r_id']; ?>"><?php echo $res['full_name']; ?></option>
                    	<?php
	                    }
	                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Employee Role</label>
                    <select class="form-control" name="role">
                    	<option value="2">BDE</option>
                    	<option value="3">Project Manager</option>
                    	<option value="4">Developer</option>
                    </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Submit"  name="approve">
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
 }else{
 ?>
 <script type="text/javascript">
 	window.location="login.php";
 </script>

 <?php
 }
 ?>
<?php include"include/footer.php" ?>
<?php
	if (isset($_POST['approve'])) {
		$employee=$_POST['emp_name'];
		$role=$_POST['role'];
		$ins="Update registration set role='$role',approve_status=1 where r_id='$employee'";
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
          title: 'Approve SuccessFully'
        })
        setInterval(function () {
            window.location="index.php";
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
		          title: 'Not Approve'
		        })
		      });
		    </script>
		<?php
		}
	}
?>