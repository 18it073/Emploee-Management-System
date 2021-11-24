<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
  if (isset($_SESSION['id'])) {
  $d_id=$_SESSION['id'];
      if ($d_id == 1) {
        $ins="select * from worksheet ";
        $query=mysqli_query($con,$ins);
       }
       else
       {
       	$ins="select * from worksheet where dev_id='$d_id'";
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
                <h3 class="card-title">Worksheet List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
  					<th>Date</th>
                    <th>Project Name</th>
                    <th>Work Description</th>

                    <th colspan="2">action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($res=mysqli_fetch_array($query)) 
                  {
                  ?>
                    <tr>
                    	<td><?php echo $res['id']; ?></td>
                    	<td><?php echo $res['date']; ?></td>
                    	<td><?php echo $res['project_name']; ?></td>
                    	<td><?php echo $res['work_desc']; ?></td>
                      <td><a  href="#.php?edt=<?php echo $res['id']; ?>" class="fa fa-edit"></a></td>
                      <td><a  href="#.php?del=<?php echo $res['id']; ?>" class="fa fa-trash"></a></td>
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
}
?>
<?php include"include/footer.php" ?>