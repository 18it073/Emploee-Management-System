<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
//if (isset($_SESSION['id'])) {
 // $d_id=$_SESSION['id'];
  //$ins="select * from timesheet where developer_id='$d_id'";
  //$query=mysqli_query($con,$ins);

?>

<?php
  if (isset($_SESSION['id'])) {
  $d_id=$_SESSION['id'];
      if ($d_id == 1) {
        $ins="select * from timesheet ";
        $query=mysqli_query($con,$ins);
      } 
      else
      {
        $ins="select * from timesheet where developer_id='$d_id'";
        $query=mysqli_query($con,$ins);
      }
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
                <h3 class="card-title">Time Sheet</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Check in</th>
                    <th>Check out</th>
                    <th>Working hours</th>                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($res=mysqli_fetch_array($query)) 
                  {
                  ?>
                    <tr>
                      <td><?php echo $res['attend_date']; ?></td>
                      <td><?php echo get_employeename($con,$res['developer_id']); ?></td>
                      <td><?php echo $res['check_in']; ?></td>
                      <td><?php echo $res['check_out']; ?></td>
                      <td><?php echo $res['working_hours']; ?></td>
                      
                      
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
