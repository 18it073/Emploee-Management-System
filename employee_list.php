<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from registration where approve_status=1";
	$query=mysqli_query($con,$ins);

?>
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Sky Id</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($res=mysqli_fetch_array($query)) 
                  {
                  ?>
	                  <tr>
	                    <td><?php echo $res['full_name']; ?></td>
	                    <td><?php echo $res['mobile_number']; ?></td>
	                    <td><?php echo $res['gender']; ?></td>
	                    <td><?php if($res['role']==1){ echo "Admin";}elseif($res['role']==2){ echo "BDE"; }else if($res['role']==3){ echo "Project Manager"; }else if ($res['role']==3) { echo "Developer"; } ?></td>
	                    <td><?php echo $res['email_id']; ?></td>
	                    <td><?php echo $res['sky_id']; ?></td>

	                    
	                  </tr>
                  <?php
              	  }
              	  ?>

                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
  </section>
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