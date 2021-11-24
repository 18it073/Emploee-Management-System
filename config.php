<?php
$con=mysqli_connect("localhost","root","","hkrbrimy_ems");
function get_employeename($con,$id)
{
	$ins="select * from registration where r_id='$id'";
	$query=mysqli_query($con,$ins);
	$res=mysqli_fetch_array($query);
	return $res['full_name'];
	return $res['role'];
}
function get_projectname($con,$id)
{
	$ins="select * from project where p_id='$id'";
	$query=mysqli_query($con,$ins);
	$res=mysqli_fetch_array($query);
	return $res['p_name'];
}
function get_teamname($con,$id)
{
	$ins="select * from team where t_id='$id'";
	$query=mysqli_query($con,$ins);
	$res=mysqli_fetch_array($query);
	return $res['t_name'];
}
?>