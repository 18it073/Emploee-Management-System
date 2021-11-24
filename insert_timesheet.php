<?php
include"include/config.php";
session_start();
	//echo isset($_POST['type'])?$_POST['type']:"";
	if (isset($_POST['type'])) {
		date_default_timezone_set('Asia/Kolkata');
		$type=$_POST['type'];
		$date=date("h:i:s");
		$attend_date=date("d-m-y");
		$developer_id=$_SESSION['id'];
		$select="select * from timesheet where developer_id='$developer_id' and attend_date='$attend_date'";
		$query=mysqli_query($con,$select);
		$num_rows=mysqli_num_rows($query);
		$res=mysqli_fetch_array($query);
		$break_out=new DateTime($res['break_out']);
		$current_time=new DateTime($date);
		if ($num_rows>0) 
		{

			if ($type=="breakin") {
				$working_hours=$break_out->diff($current_time)->format("%H:%I:%S");
				echo $working_hours;
				$remaining_working_hours=$res['working_hours'];
				$ins1="update timesheet set status='breakin',working_hours=ADDTIME('$remaining_working_hours','$working_hours') where developer_id='$developer_id' and attend_date='$attend_date'";
				$query1=mysqli_query($con,$ins1);
				if ($query1) {
					echo "success";
				}
			}
			else if ($type=="breakout") {
				$ins1="update timesheet set break_out='$date',status='breakout' where developer_id='$developer_id' and attend_date='$attend_date'";
				$query1=mysqli_query($con,$ins1);
				if ($query1) {
					echo "success";
				}
			}
			else if ($type=="checkout") {
				$working_hours=$break_out->diff($current_time)->format("%H:%I:%S");
				echo $working_hours;
				$remaining_working_hours=$res['working_hours'];
				$ins1="update timesheet set check_out='$date',status='checkout',working_hours=ADDTIME('$remaining_working_hours','$working_hours') where developer_id='$developer_id' and attend_date='$attend_date'";
				$query1=mysqli_query($con,$ins1);
				if ($query1) {
					echo "success";
				}
			}
			
		}
		else
		{
			if ($type=="checkin") 
			{
				$ins1="insert into timesheet (developer_id,attend_date,check_in,break_out,status) values ('$developer_id','$attend_date','$date','$date','checkin')";
				echo $ins1;
				$query1=mysqli_query($con,$ins1);
				if ($query1) {
					echo "success";
				}
			}	
		}
	}

?>