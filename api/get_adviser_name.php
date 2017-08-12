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
$searchTerm = $_GET['term'];

//get matched data from skills table
$query ="SELECT * FROM tbl_advisers WHERE firstname LIKE '%".$searchTerm."%' or lastname LIKE '%".$searchTerm."%' ORDER BY firstname";

$result=mysqli_query($conn,$query);

$array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $array[]=  $row['firstname'].' '. $row['lastname'];
}

//return json data
echo json_encode($array);