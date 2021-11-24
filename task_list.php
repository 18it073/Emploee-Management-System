<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
if (isset($_SESSION['id'])) {
  $d_id=$_SESSION['id'];
  $ins="select * from task where developer_id='$d_id' ORDER BY Field(status,'pending','complete')";
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
                    <th>Project Name</th>
                    <th>status</th>
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
                      <td><?php echo get_projectname($con,$res['project_id']); ?></td>
                      <td><a  href="task_list.php?del=<?php echo $res['ta_id']; ?>"><?php echo ($res['status']=="complete") ? "complete" : "End task"  ?></a></td>
                      
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
  $ins="update task set status='complete' where ta_id='$id'";
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
          title: 'Task Complete SuccessFully'
        })
        setInterval(function () {
            window.location="task_list.php";
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
              title: 'Task Complete Not SuccessFully'
            })
          });
        </script>
    <?php
    }
  
}

?>