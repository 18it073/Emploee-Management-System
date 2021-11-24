<?php
include"include/config.php";
session_start();
				$developer_id=$_SESSION['id'];
				$attend_date=date("d-m-y");
				$select="select * from timesheet where developer_id='$developer_id' and attend_date='$attend_date'";
				$query=mysqli_query($con,$select);
				$num_rows=mysqli_num_rows($query);
				$res=mysqli_fetch_array($query);
				if ($num_rows>0  && $res['status']=='checkin' or $res['status']=='breakout') {
					$date = time();
					$im = imagegrabscreen();
					$imagename="document/".$date.".png";
					imagepng($im, $imagename);
					imagedestroy($im);
					$imgcontent = addslashes(file_get_contents($imagename)); 
					$ins="insert into screenshot (s_image,developer_id) values ('$imgcontent','$developer_id')";
					$query=mysqli_query($con,$ins);
					if ($query) {
						echo "success";
					}
				}

?>