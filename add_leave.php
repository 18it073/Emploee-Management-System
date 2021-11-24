<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	
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
                <h3 class="card-title">Add Leave</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">From Date</label>
                    <input type="date" name="fromdate" class="form-control" placeholder="Enter From Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">To Date</label>
                    <input type="date" name="todate" class="form-control" placeholder="Enter To Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Reason</label>
                    <textarea name="reason" class="form-control" placeholder="Enter Reason"></textarea>  
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Submit"  name="addleave">
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
	if (isset($_POST['addleave'])) {
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
    $reason=$_POST['reason'];
    $d_id=$_SESSION['id'];
		$ins="insert into leave_form (from_date,to_date,reason,developer_id) values ('$fromdate','$todate','$reason','$d_id')";
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
          title: 'Add Leave SuccessFully'
        })
        setInterval(function () {
            window.location="manage_leave.php";
          }, 1000);
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
		          title: 'Add Leave Not SuccessFully'
		        })
		      });
		    </script>
		<?php
		}
	}
?>