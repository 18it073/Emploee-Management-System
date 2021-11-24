<?php
session_start();
include"include/header.php"; 
date_default_timezone_set("Asia/Kolkata");
?>

<!-- Content Wrapper. Contains page content -->

<?php

if(isset($_SESSION['full_name'])) {
  	$d_id=$_SESSION['id'];
  	$attend_date=date("d-m-y");
  	
	$ins="select * from timesheet where  developer_id='$d_id' and attend_date='".date("d-m-y")."'";

	$query=mysqli_query($con,$ins);
	
	$res=mysqli_fetch_array($query);
	if ($res['check_out']!="00:00:00") {
	
		$break_out=new DateTime($res['break_out']);
		$break_in=new DateTime($res['break_in']);
		$check_in=new DateTime($res['check_in']);
		$check_out=new DateTime($res['check_out']);
		$break_time=$break_out->diff($break_in)->format('%H:%I:%S');
		$total_time=$check_out->diff($check_in)->format('%H:%I:%S');
		$break_time_d=new DateTime($break_time);
		$total_time_d=new DateTime($total_time);
	}
?>
<?php //echo $total_time_d->diff($break_time_d)->format("%H:%I:%S"); ?>
<style type="text/css">
	button {
  cursor: pointer;
  background: transparent;
  padding: 0;
  border: none;
  margin: 0;
  outline: none;
}

</style>
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
                <h3 class="card-title">Dashboard</h3>
               <div>
	                <!-- <button class="buttonPlay">
			          <img id="playButton"  width="50px" height="50px" src="https://www.flaticon.com/svg/static/icons/svg/483/483054.svg" />
			        </button>
		        
			        <button>
			        	<img id="pauseButton" style="display: none;" width="50px" height="50px" src="https://www.flaticon.com/svg/static/icons/svg/2088/2088562.svg" />
			        </button>
			        <button class="buttonReset">
			          <img id="resetButton" width="50px" height="50px" src="https://www.flaticon.com/svg/static/icons/svg/709/709714.svg" />
			        </button> -->
					
			        <span class="float-right card-title" id="display" ><?= ($res['status']=="checkout"or $res['status']=="breakin"or $res['status']=="breakout")? $res['working_hours']:""; ?></span>
		    	</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-danger">
                  <h5>Check In time is : <?php  echo $res['check_in']; ?></h5>
                </div>
                
                <div class="callout callout-success">
                  <h5>Check Out time is : <?php  echo $res['check_out']; ?></h5>
                </div>

                <div class="card-footer">
                  <?php
                  if ($res['check_out'] == null or $res['check_out']=="00:00:00" ) 
                  {
                  	
                  ?>
                  
                  <button class="btn btn-primary" id="checkin" style="visibility:<?= ($res['status']=="")? "visible":"hidden"; ?>">Check In</button>
                 
     <?php /*            if(mysqli_num_rows($query)<=0)
	{
	    ?>
	    <button class="btn btn-primary" id="checkin" >Check In</button>
	    <?php
	}*/
	?>
                  <button class="btn btn-primary" id="breakin" style="visibility:<?= ($res['status']=="breakout" or $res['status']=="checkin")? "visible":"hidden"; ?>">Break In</button>
                  
                  
                  <button class="btn btn-warning" style="visibility:<?= ($res['status']=="breakin")? "visible":"hidden"; ?>" id="breakout">Break Out</button>
                  
                  <button class="btn btn-danger" id="checkout">Check Out</button>
				  
			
                  <?php
              	  }else
              	  {
                  ?>
                  
                  <?php
              	  }
              	  ?>
				  <span class="float-right card-title" id="displaymsg" style="display:<?= ($res['status']=="checkout")? "inline-block":"none"; ?>;">Your Staffing is Added Successfully</span>
                </div>



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
