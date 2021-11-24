<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from registration";
  $query=mysqli_query($con,$ins);
  $ins1="select * from project";
  $query1=mysqli_query($con,$ins1);
  if (isset($_GET['edt'])) {
      $id=$_GET['edt'];
      $ins2="select * from team where t_id='$id'";
      $query2=mysqli_query($con,$ins2);
      $res2=mysqli_fetch_array($query2);
      $developerar=explode(",",$res2['developer_id']);
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
                    <label for="exampleInputEmail1">Enter Team Name</label>
                    <input type="text" name="teamname" value="<?php echo $res2['t_name']; ?>" class="form-control" placeholder="Enter Team Name">
                  </div>
                  <div class="form-group">
                  <label>Select Developers</label>
                  <div class="select2-purple">
                    <select class="select2" name="developerid[]" multiple="multiple" data-placeholder="Select Developers" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <?php 
                        while ($res=mysqli_fetch_array($query)) 
                        {
                                           
                      ?>

                          <option value="<?php echo $res['r_id']; ?>"<?php foreach ($developerar as $dev) { if ($res['r_id']==$dev) { echo "selected";  } } ?> > <?php echo $res['full_name']; ?></option>
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
                        <option value="<?php echo $res1['p_id']; ?>" <?php if ($res2['p_id']==$res1['p_id']) { echo "selected";} ?>><?php echo $res1['p_name']; ?></option>

                        <?php
                      }
                      ?>
                    </select>
                </div>

                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update"  name="updateteam">
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
	if (isset($_POST['updateteam'])) {
		$teamname=$_POST['teamname'];
		$developer=$_POST['developerid'];
    $developerid=implode(",",$developer);
    $projectid=$_POST['projectid'];
		$ins="Update team set t_name='$teamname',developer_id='$developerid',p_id='$projectid' where t_id='$id'";
   
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
          title: 'Update Team SuccessFully'
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
		          title: 'Update Team Not SuccessFully'
		        })
		      });
		    </script>
		<?php
		}
	}
?>