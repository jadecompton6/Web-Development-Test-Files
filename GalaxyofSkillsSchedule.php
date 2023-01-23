<?php
$courseno   = $_POST["courseNo"];
$title      = $_POST["title"];
$credits    = $_POST["credits"];
$sectionno  = $_POST["sectionNo"];
$room       = $_POST["room"];
$instructor = $_POST["instructor"];
$email      = $_POST["email"];
$position   = $_POST["position"];
$phone      = $_POST["phone"];


$conn = mysqli_connect("localhost","root","root","courseinformation");
if(!$conn)
	echo "No connection";
else
{
	echo "Sucessfully connected";<br>
	$sql="insert into courseinfo (CourseNo,Title,Credits,sectionno,room,instructor,
	email,position,phone) 
	values ('$courseno','$title','$credits','$sectionno','$room','$instructor','$email','$position','$phone')";
	if(mysqli_query($conn,$sql))
		echo "row inserted";
	else
		echo "row not inserted";
	
	
	

}
?>