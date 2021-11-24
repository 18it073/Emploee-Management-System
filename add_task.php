<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from registration where  approve_status=1";
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
                <h3 class="card-title">Add Task</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Task Name</label>
                    <input type="text" name="taskname" class="form-control" placeholder="Enter Task Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Task Hours</label>
                    <input type="number" name="taskhour" class="form-control" placeholder="Enter Task Hours">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Developers</label>
                    <select class="form-control" name="developer">
                    <?php
                    while ($res=mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $res['r_id']; ?>"><?php echo $res['full_name']; ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project</label>
                    <select class="form-control" name="project">
                    <?php
                    while ($res1=mysqli_fetch_array($query1)) {
                    ?>
                        <option value="<?php echo $res1['p_id']; ?>"><?php echo $res1['p_name']; ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Task Description</label>
                    <textarea name="taskdes" class="form-control" placeholder="Enter Task Name"></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Attach Document</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="projectdoc" id="exampleInputFile" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                  </div>



                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Submit"  name="addtask">
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
	if (isset($_POST['addtask'])) {
		$taskname=$_POST['taskname'];
		$des=$_POST['taskdes'];
		$taskhour=$_POST['taskhour'];
    $developer=$_POST['developer'];
    $project=$_POST['project'];
    if($_FILES['projectdoc']['name']=="")
    {
        $projectdoc="";
    }
    else
    {
         $projectdoc=$_FILES['projectdoc']['name'];
    move_uploaded_file($_FILES['projectdoc']['tmp_name'], 'document/'.$projectdoc);
         
    }
		$ins="insert into task (ta_name,ta_hours,developer_id,project_id,details,assign_doc) values ('$taskname','$taskhour','$developer','$project','$des','$projectdoc')";
    
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
          title: 'Add Task SuccessFully'
        })
        setInterval(function () {
            window.location="manage_task.php";
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
		          title: 'Add Task Not SuccessFully'
		        })
		      });
		    </script>
		<?php
		}
	}
?>