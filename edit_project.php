<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from registration where role=3 and approve_status=1";
	$query=mysqli_query($con,$ins);
  if (isset($_GET['edt'])) {
    $id=$_GET['edt'];
    $ins1="select * from project where  p_id='$id'";
    $query1=mysqli_query($con,$ins1);
    $res1=mysqli_fetch_array($query1);
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
                    <label for="exampleInputEmail1">Projct Name</label>
                    <input type="text" name="projectname" class="form-control" value="<?php echo $res1['p_name']; ?>" placeholder="Enter Project Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Projct Description</label>
                    <input type="text" name="projectdesc" class="form-control" value="<?php echo $res1['p_desc']; ?>" placeholder="Enter Project Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Projct Client Name</label>
                    <input type="text" name="projectclientname" class="form-control" value="<?php echo $res1['p_client_name']; ?>" placeholder="Enter Project Client Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Projct Document</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="projectdoc" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <input type="hidden" name="projectdoc1" value="<?php echo $res1['p_attachment']; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project Managers</label>
                    <select class="form-control" name="projectmanager">
                    <?php
                    while ($res=mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $res['r_id']; ?>" <?php echo ($res['r_id']==$res1['project_m_id']) ? "selected" :""; ?>><?php echo $res['full_name']; ?></option>
                    <?php
                    }
                    ?>
                  

                    </select>
                    
                  </div>



                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="update"  name="updateproject">
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
	if (isset($_POST['updateproject'])) {
		$projectname=$_POST['projectname'];
		$desc=$_POST['projectdesc'];
    $projectclientname=$_POST['projectclientname'];
    if ($_FILES['projectdoc']['name']=="") {
      $projectdoc=$_POST['projectdoc1'];
    }else{
      $projectdoc=$_FILES['projectdoc']['name'];
      move_uploaded_file($_FILES['projectdoc']['tmp_name'], 'document/'.$projectdoc);
    }
    $projectmanager=$_POST['projectmanager'];
		$ins="Update project set  p_name='$projectname',p_desc='$desc',p_client_name='$projectclientname',p_attachment='$projectdoc',project_m_id='$projectmanager' where p_id='$id'";
    
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
          title: 'Update Project SuccessFully'
        })
        setInterval(function () {
            window.location="manage_project.php";
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
		          title: 'Update Project Not SuccessFully'
		        })
		      });
		    </script>
		<?php
		}
	}
?>