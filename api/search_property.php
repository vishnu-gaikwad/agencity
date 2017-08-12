<?php
header('Access-Control-Allow-Origin: *');

include "../dbconfig.php";

//get search term
$searchTerm = $_GET['apply_other'];


//get matched data from skills table
//$query ="SELECT id,buy_or_rent,isnew,city,phone,photo_url FROM tbl_advisers WHERE concat(firstname,' ',lastname)='".$searchTerm."' ORDER BY firstname";


if($_GET['apply_other']==1)
{
$query = "SELECT * FROM tbl_property where buy_or_rent='".$_GET['buy_or_rent']."' && city in ('".$_GET['city']."') && isnew='".$_GET['isnew']."' && type_of_property LIKE '%".$_GET['type_of_property']."%' &&
			price BETWEEN ".$_GET['pfrom']." AND ".$_GET['pto']." && surface_area BETWEEN ".$_GET['sfrom']." AND ".$_GET['sto']." && no_of_rooms=".$_GET['no_of_rooms']." && no_of_bedrooms=".$_GET['no_of_bedrooms']." &&
			estate like '".$_GET['estate']."%' && particularites like '".$_GET['particularites']."%' && pieces LIKE '".$_GET['pieces']."%' && stationnment like '".$_GET['stationnment']."%' && aproximite LIKE '".$_GET['aproximite']."%' ORDER BY id ";
//echo $query;
}

else if($_GET['apply_other']==0)
{
	$query = "SELECT * FROM tbl_property where buy_or_rent='".$_GET['buy_or_rent']."' && city in('".$_GET['city']."') && isnew='".$_GET['isnew']."' && type_of_property LIKE '%".$_GET['type_of_property']."%' &&
			price BETWEEN ".$_GET['pfrom']." AND ".$_GET['pto']." && surface_area BETWEEN ".$_GET['sfrom']." AND ".$_GET['sto']." && no_of_rooms=".$_GET['no_of_rooms']." && no_of_bedrooms=".$_GET['no_of_bedrooms']."
			ORDER BY id ";
//echo $query;
}

$result=mysqli_query($conn,$query);

$array = array();

while ($row = mysqli_fetch_assoc($result)) {


    $array[]= array(
        "id"=>$row['id'],
		//"buy_or_rent" =>$row['buy_or_rent'],
        //"isnew"=>$row['isnew'],
        "price"=>$row['price'],

		"type_of_property"=>$row['type_of_property'],
        "surface_area"=>$row['surface_area'],
        "city"=>$row['city'].'-' .$row['zip'],
        //"zip"=>$row['zip'],
		"pieces"=>utf8_encode($row['pieces']),
		"photo_url"=>$row['photo_url']
	

    );

}


//return json data
echo json_encode($array);