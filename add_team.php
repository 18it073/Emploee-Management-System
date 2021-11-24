<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from registration";
  $query=mysqli_query($con,$ins);
  $ins1="select * from project";
  $query1=mysqli_query($con,$ins1);
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
                <h3 class="card-title">Add Team</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Team Name</label>
                    <input type="text" name="teamname" class="form-control" placeholder="Enter Team Name">
                  </div>
                  <div class="form-group">
                  <label>Select Developers</label>
                  <div class="select2-purple">
                    <select class="select2" name="developerid[]" multiple="multiple" data-placeholder="Select Developers" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <?php 
                        while ($res=mysqli_fetch_array($query)) {
                          ?>

                          <option value="<?php echo $res['r_id']; ?>" > <?php echo $res['full_name']; ?></option>
                          <?php
                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Project</label>
                    <select class="form-control" name="projectid">
                      <?php
                      while ($res1=mysqli_fetch_array($query1)) {
                        ?>
                        <option value="<?php echo $res1['p_id']; ?>"><?php echo $res1['p_name']; ?></option>

                        <?php
                      }
                      ?>
                    </select>
                </div>

                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Submit"  name="addteam">
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
	if (isset($_POST['addteam'])) {
		$teamname=$_POST['teamname'];
		$developer=$_POST['developerid'];
    $developerid=implode(",",$developer);
    $projectid=$_POST['projectid'];
		$ins="insert into team (t_name,developer_id,p_id) values ('$teamname','$developerid','$projectid')";
   
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
          title: 'Add Team SuccessFully'
        })
        setInterval(function () {
            window.location="manage_team.php";
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
		          title: 'Add Team Not SuccessFully'
		        })
		      });
		    </script>
		<?php
		}
	}
?>