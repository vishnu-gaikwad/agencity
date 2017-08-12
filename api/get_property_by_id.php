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
$query ="SELECT tbl_property.*,tbl_advisers.id as adv_id,tbl_advisers.firstname,tbl_advisers.lastname,tbl_advisers.city as adv_city,tbl_advisers.phone as adv_phone FROM tbl_property left join tbl_advisers on tbl_property.adv_id=tbl_advisers.id where tbl_property.id=".$searchTerm;
$result=mysqli_query($conn,$query);
$array = array();

while ($row = mysqli_fetch_assoc($result)) {


    $array= array(
        "id"=>$row['id'],
        "price"=>$row['price'],
        "type_of_property"=>$row['type_of_property'],
        "surface_area"=>$row['surface_area'],
        "ref"=>$row['ref'],
        "lat"=>$row['lat'],
        "lon"=>$row['lon'],
		"city"=>$row['city'],
		"buy_or_rent" =>$row['buy_or_rent'],
        "isnew"=>$row['isnew'],
		"zip"=>$row['zip'],
	//	"pieces"=>$row['pieces'],
        "pieces"=>utf8_encode($row['pieces']),
        "no_of_rooms"=>$row['no_of_rooms'],
		"no_of_bedrooms"=>$row['no_of_bedrooms'],
		"estate"=>$row['estate'],
		"photo_url"=>$row['photo_url'],
		"stationnment"=>$row['stationnment'],
		"aproximite"=>$row['aproximite'],
		"particularites"=>$row['particularites'],

		"prop_description"=>$row['prop_description'],

		"no_of_bedrooms"=>$row['no_of_bedrooms'],
		"wc"=>$row['wc'],
		"salle_de_bain"=>$row['salle_de_bain'],
		"construit_en"=>$row['construit_en'],

		"dpe"=>$row['dpe'],
		"ges"=>$row['ges'],
        "adv_id"=>$row['adv_id'],
        "adv_fname"=>$row['firstname'],
        "adv_lname"=>$row['lastname'],
        "adv_phone"=>$row['adv_phone'],
        "adv_city"=>$row['adv_city'],
	);

}

	
//return json data
echo json_encode($array);
