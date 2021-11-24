<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
  $d_id=$_SESSION['id'];
	$ins="select * from task";
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
                <h3 class="card-title">Task List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Task Name</th>
                    <th>Task Hours</th>
                    <th>Developer Name</th>
                     <th>Task Description</th>
                    <th>Assign Document</th>
                    
                    <th colspan="2">action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($res=mysqli_fetch_array($query)) 
                  {
                  ?>
	                  <tr>
	                    <td><?php echo $res['ta_name']; ?></td>
                      <td><?php echo $res['ta_hours']; ?></td>
	                    <td><?php echo get_employeename($con,$res['developer_id']); ?></td>
	                    <td><?php echo $res['details']; ?></td>
                      <td><a href="<?php echo $_SERVER['PHP_SELF']."/images/".$res['assign_doc']; ?>" target="blank"><i class="fas fa-file"></i><?php echo $res['assign_doc']; ?></a></td>

	                    <td><a  href="edit_task.php?edt=<?php echo $res['ta_id']; ?>" class="fa fa-edit"></a></td>
                      <td><a  href="manage_task.php?del=<?php echo $res['ta_id']; ?>" class="fa fa-trash"></a></td>
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
<?php
if (isset($_GET['del'])) {
  $id=$_GET['del'];
  $ins="delete from task where ta_id='$id'";
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
          title: 'Delete Task SuccessFully'
        })
        setInterval(function () {
            window.location="manage_task.php";
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
              title: 'Delete Task Not SuccessFully'
            })
          });
        </script>
    <?php
    }
  
}

?>