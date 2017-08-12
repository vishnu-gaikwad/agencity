<?php
include('dbconfig.php');
if(isset($_POST['signup']))
{
$username=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['username'])));
$email=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['email'])));
$password=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['password'])));
$login=mysqli_num_rows(mysqli_query($conn,"select * from `tbl_advisers` where `email`='$email'"));
if($login!=0)
{
echo "exist";
}
else
{
$q=mysqli_query($conn,"insert into `tbl_advisers` (`id`,`username`,`email`,`password`) values ('','$username','$email','$password')");
if($q)
{
echo "success";
}
else
{
echo "failed";
}
}
echo mysql_error();
}
?>