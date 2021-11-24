<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	if (isset($_GET['edt'])) {
    $id=$_GET['edt'];
    $ins="select * from leave_form where l_id='$id'";
    $query=mysqli_query($con,$ins);
    $res=mysqli_fetch_array($query);
  }
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">From Date</label>
                    <input type="date" name="fromdate" value="<?php echo $res['from_date']; ?>" class="form-control" placeholder="Enter From Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">To Date</label>
                    <input type="date" name="todate" class="form-control" value="<?php echo $res['to_date']; ?>" placeholder="Enter To Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Reason</label>
                    <textarea name="reason" class="form-control" placeholder="Enter Reason"><?php echo $res['reason']; ?></textarea>  
                  </div>
                  
                  <?php
                  if ($_SESSION['role']==1) {
                  ?>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Status</label><br>
                    <label><input type="radio" class="radio" name="status" value="pending" required> Pending </label>
                    <label style="margin-left: 5px;"><input type="radio" name="status" value="approve" class="radio" required> Approve</label>
                  </div>
                <?php } ?>
                
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update"  name="updateleave">
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
	if (isset($_POST['updateleave'])) {
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
    $reason=$_POST['reason'];
    $status=$_POST['status'];
    
    
    //$d_id=$_SESSION['id'];
    
		$ins="update leave_form set from_date='$fromdate',to_date='$todate',reason='$reason',approve_status='$status' where l_id='$id'";
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
          title: 'Update Leave SuccessFully'
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
		          title: 'Update Leave Not SuccessFully'
		        })
		      });
		    </script>
		<?php
		}
	}
?>