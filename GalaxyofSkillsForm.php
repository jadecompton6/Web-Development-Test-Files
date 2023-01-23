<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$db="project";

// Create connection
$conn = mysqli_connect($localhost, $root, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  //echo "Connected unsuccessfully";
}
//else {echo "Connected Successfully";}

//login ............................................................................................
session_start();
$username = $_POST['iusername'];
$password = $_POST['ipassword'];
if (empty($username) || empty($password) ){
  echo "inputs of login is empty !";
}
else {
$sql = "SELECT * FROM tenant WHERE username='$username' AND password='$password'";
$query = mysqli_query($conn, $sql);
$res=mysqli_num_rows($query);
 
 //If result match $username and $password Table row must be 1 row
if($res == 1)
 {
  $row = mysqli_fetch_array($query);
  $_SESSION["tid"]= $row["tid"];
  $_SESSION["username"]= $row["username"];
  $name=$row["tenant_name"];
  $unit=$row["unit"];
  echo "Hello $name from $unit";
 }
 else
 {
 echo "\n"."Invalid Username or Password, Try Again !";
 
 }
 
}
 

//register..................................................................................................
$f_name=$_POST ["fullname"];
$u_name=$_POST ["username"];
$pass=$_POST ["password"];
$apt=$_POST ["apartment"];
if (empty($u_name)){
  //echo "inputs of refistration is empty !";
}
else {
$sql = "SELECT tid FROM tenant where username= '$u_name' or unit='$apt' LIMIT 1";
$check_query= mysqli_query($conn,$sql);
$count_uid = mysqli_num_rows ($check_query);
if($count_uid>0)
{
    echo "\n"."Same username or apartment registered. Try another username or apartment !" ;
  exit();
}
else {
    
  $sql = "INSERT INTO
  `tenant` (`username`, `tenant_name`,`password`, `unit` )
  VALUES ('$u_name', '$f_name','$pass', '$apt')";
  $run_query=mysqli_query($conn,$sql);
  if($run_query)
  {
        echo "\n". "<b>Registration is Successfully Completed</b>" ;
  }
}
}
?> 
$conn->close();
?>	