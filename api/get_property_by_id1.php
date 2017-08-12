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
$query ="SELECT * FROM tbl_property WHERE id=".$searchTerm."";

$result=mysqli_query($conn,$query);

$array="";

while ($row = mysqli_fetch_assoc($result)) {
    $array= array(

	    "Id"=>$row['id'],
		"Buy or Rent" =>$row['buy_or_rent'],
        "city"=>$row['city'].'-' .$row['zip'],
		"GeoLocation"=>$row['geolocation'],
		"Is new"=>$row['isnew'],
		"Type Of Property"=>$row['type_of_property'],
        "Price"=>$row['price'],
        "Surface Area"=>$row['surface_area'],
        "No. Of Rooms"=>$row['no_of_rooms'],
		"No. Of BedRooms"=>$row['no_of_bedrooms'],
        //"zip"=>$row['zip'],
		"Photo URL"=>$row['photo_url'],
		"Estate"=>$row['estate'],
		"Particularites"=>$row['particularites'],
		"Pieces"=>$row['pieces'],
		"Stationnment"=>$row['stationnment'],
		"Aproximite"=>$row['aproximite']
    );
}

//return json data
echo json_encode($array);