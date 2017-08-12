<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bhagwant
 * Date: 26-Sep-16
 * Time: 5:48 PM
 */
header('Access-Control-Allow-Origin: *');

include "../dbconfig.php";

//get search term
$searchTerm = $_GET['id'];

//get matched data from skills table
$query ="SELECT id,firstname,lastname,city,phone,photo_url,email FROM tbl_advisers WHERE id=".$searchTerm."";

$result=mysqli_query($conn,$query);

$array="";

while ($row = mysqli_fetch_assoc($result)) {
    $array= array(
        "firstname" =>$row['firstname'],
        "lastname"=>$row['lastname'],
        "city"=>$row['city'],
        "phone"=>$row['phone'],
        "photo_url"=>$row['photo_url'],
        "id"=>$row['id'],
        "email"=>$row['email']

    );
}

//return json data
echo json_encode($array);