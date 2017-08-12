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
$searchTerm = $_GET['adv_id'];

//get matched data from skills table
$query ="SELECT * FROM tbl_property WHERE adv_id=".$searchTerm."";

$result=mysqli_query($conn,$query);

$array="";

while ($row = mysqli_fetch_assoc($result)) {
    $array= array(
        "photo_url"=>$row['photo_url'],
		"price"=>$row['price'],
        "type_of_property"=>$row['type_of_property'],
        "surface_area"=>$row['surface_area'],
        "no_of_rooms"=>$row['no_of_rooms'],
		"city"=>$row['city'],
        "ref"=>$row['ref'],
		"adv_id"=>$row['adv_id'],
        
    );
}

//return json data
echo json_encode($array);