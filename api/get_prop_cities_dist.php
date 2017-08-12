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
//$searchTerm = $_GET['term'];
$longitudeFrom=$_GET['lon'];
$latitudeFrom=$_GET['lat'];


//get matched data from skills table
$query ="SELECT DISTINCT city FROM tbl_property";

$result=mysqli_query($conn,$query);

$array = array();
//$arraykm=array();

$finaldata=array();

while ($row = mysqli_fetch_assoc($result)) {
    // $array[]=  $row['city'];


    $query2 ="SELECT city,lat,lon FROM tbl_property WHERE city='".$row['city']."' limit 1";

    $result2=mysqli_query($conn,$query2);


    while ($row2 = mysqli_fetch_assoc($result2)) {
        //$array[]=  $row2['city'];

        $longitudeTo=$row2['lon'];
        $latitudeTo=$row2['lat'];

        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        //echo round($miles*1.609344,2)." km";

        // $arraykm[]=  round($miles*1.609344,2);

        $array[]=array(
            'city' => $row2['city'],
            'km'=>round($miles*1.609344,2)


        );



    }


}

$mid=array();

foreach ($array as $key => $row) {
    $mid[$key]  = $row['km'];
}

// Sort the data with mid descending
// Add $data as the last parameter, to sort by the common key
array_multisort($mid, SORT_ASC, $array);

//usort($array, make_comparer('km'));

//return json data
echo json_encode($array);