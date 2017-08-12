<?php
include('dbconfig.php');
if(isset($_POST['valider']))
{
$username=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['username'])));
$password=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['password'])));
$login=mysqli_num_rows(mysqli_query($conn,"select * from `tbl_advisers` where `username`='$username' and `password`='$password'"));
if($login!=0)
{
echo "success";
}
else
{
echo "failed";
}
}

?>