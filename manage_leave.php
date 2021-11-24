<?php include"include/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<?php
  if (isset($_SESSION['id'])) {
  $d_id=$_SESSION['id'];
      if ($d_id == 1) {
        $ins="select * from leave_form ";
        $query=mysqli_query($con,$ins);
      } 
      else
      {
        $ins="select * from leave_form where developer_id='$d_id'";
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
                <h3 class="card-title">Leave List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Reason</th>
                    <th>Developer Name</th>
                    <th colspan="2">action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while ($res=mysqli_fetch_array($query)) 
                  {
                  ?>
                    <tr>
                      <td><?php echo $res['from_date']; ?></td>
                      <td><?php echo $res['to_date']; ?></td>
                      <td><?php echo $res['reason']; ?></td>
                      <td><?php echo get_employeename($con,$res['developer_id']); ?></td>
                      <td><?php  $status = $res['approve_status']; 
                                if ($status == "pending") 
                                {
                                  echo "Pending";
                                }
                                else
                                {
                                  echo "Approved";
                                }
                          ?>
                          
                          
                        </td>
                      <td><a  href="edit_leave.php?edt=<?php echo $res['l_id']; ?>" class="fa fa-edit"></a></td>
                      <td><a  href="manage_leave.php?del=<?php echo $res['l_id']; ?>" class="fa fa-trash"></a></td>
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
  $ins="delete from leave_form where l_id='$id'";
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
          title: 'Delete Leave SuccessFully'
        })
        setInterval(function () {
            window.location="manage_leave.php";
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
              title: 'Delete Leave Not SuccessFully'
            })
          });
        </script>
    <?php
    }
  
}

?>