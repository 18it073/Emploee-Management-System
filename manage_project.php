<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
	$ins="select * from project";
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
                <h3 class="card-title">Project List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Project Name</th>
                    <th>Project Desc</th>
                    <th>Project Client Name</th>
                    <th>Project Document</th>
                    <th>Project Manager Name</th>
                    <th colspan="2">action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($res=mysqli_fetch_array($query)) 
                  {
                  ?>
	                  <tr>
	                    <td><?php echo $res['p_name']; ?></td>
	                    <td><?php echo $res['p_desc']; ?></td>
	                    <td><?php echo $res['p_client_name']; ?></td>
	                    <td><?php echo $res['p_attachment']; ?></td>
	                    <td><?php echo get_employeename($con,$res['project_m_id']); ?></td>
	                    <td><a  href="edit_project.php?edt=<?php echo $res['p_id']; ?>" class="fa fa-edit"></a></td>
                      <td><a  href="manage_project.php?del=<?php echo $res['p_id']; ?>" class="fa fa-trash"></a></td>
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
  $ins="delete from project where p_id='$id'";
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
          title: 'Delete Project SuccessFully'
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
              title: 'Delete Project Not SuccessFully'
            })
          });
        </script>
    <?php
    }
  
}

?>