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
                <h3 class="card-title">Add Worksheet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
				<?php
          if ($_SESSION['role']==3 ) {
          ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
					 <div class="custom-file">
					  <textarea name="work" class="form-control" placeholder="Project"></textarea>
                      </div>
					 </div>
		
                    <select name="projectname" class="form-control">
                      <?php
                          $sql = mysqli_query($con, "SELECT * From project");
                          $row = mysqli_num_rows($sql);
                          while ($row = mysqli_fetch_array($sql)){
                          //echo "<option value=". $row['p_id'] .">" .$row['p_name'].$row['p_id'] ."</option>" ;?>
                            <option value=<?php echo $row['p_name']; ?> > <?php echo $row['p_name']; ?></option> 
                         <?php }
                      ?>
                    </select>
                  </div>
                  <?php
		  }
		  ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Work Description</label>
                    <div class="custom-file">
                        <textarea name="work" class="form-control" placeholder="Work Description"></textarea>
                      </div>
                  </div>

                  <div class="form-group">

                    <input type="hidden" name="dsate" class="form-control" placeholder="Choose Date">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Attachment</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="workdoc" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Submit"  name="addworksheet">
                </div>
               <?php  //echo  $d_id=$_SESSION['id']; ?>
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

<?php 
if (isset($_POST['addworksheet'])) {

  $project_name=$_POST['projectname'];
  $w_desc=$_POST['work'];
  $w_date=$_POST['date'];
  $d_id=$_SESSION['id'];

  $ins="insert into worksheet (project_name,work_desc,dev_id,date) values ('$project_name','$w_desc','$d_id','$w_date')";
  $query=mysqli_query($con,$ins);

  echo $ins;
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
          title: 'Add Worksheet SuccessFully'
        })
        setInterval(function () {
            window.location="manage_worksheet.php";
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
              title: 'Add Worksheet Not SuccessFully'
            })
          });
        </script>
    <?php
    }
  }
?>
<?php include"include/footer.php" ?>