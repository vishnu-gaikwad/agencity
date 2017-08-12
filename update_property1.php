<?php 
include('dbconfig.php');
?>
<?php
$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$buy_or_rent=isset($_POST['buy_or_rent']) ? $_POST['buy_or_rent']:'';
$city=isset($_POST['city']) ? $_POST['city'] : '';
$zip=$_POST['zip'];
$isnew=isset($_POST['isnew']) ? $_POST['isnew'] : '';
$type_of_property=isset($_POST['type_of_property']) ? $_POST['type_of_property'] : '';
if(isset($_POST['type_of_property']))
$type_of_property = implode(" ",$type_of_property);
$price=$_POST['price'];
$surface_area=$_POST['surface_area'];
$no_of_rooms=$_POST['no_of_rooms'];
$no_of_bedrooms=$_POST['no_of_bedrooms'];
$photo = ($_FILES['photo']['name']) ? ("photo_url/".$_FILES['photo']['name']) : '';
$photo1 = ($_FILES['photo1']['name']) ? ("photo_url/".$_FILES['photo1']['name']) : '';
$photo2 = ($_FILES['photo2']['name']) ? ("photo_url/".$_FILES['photo2']['name']) : '';
$photo3 = ($_FILES['photo3']['name']) ? ("photo_url/".$_FILES['photo3']['name']) : '';
$photo4 = ($_FILES['photo4']['name']) ? ("photo_url/".$_FILES['photo4']['name']) : '';
$estate=isset($_POST['estate']) ? $_POST['estate'] :'';
$particularites=isset($_POST['particularites']) ? $_POST['particularites'] : '';
$pieces=isset($_POST['pieces']) ? $_POST['pieces'] : '';
$stationnment=$_POST['stationnment'];
$aproximite=isset($_POST['aproximite']) ? $_POST['aproximite'] : '';
$prop_description=isset($_POST['prop_description']) ? $_POST['prop_description'] : '';
$adv_id=isset($_POST['adv_id']) ? $_POST['adv_id'] : '';	
$ref=isset($_POST['ref']) ? $_POST['ref'] : '';
$lat=isset($_POST['lat']) ? $_POST['lat'] : '';	
$lon=isset($_POST['lon']) ? $_POST['lon'] : '';
$wc=isset($_POST['wc']) ? $_POST['wc'] : '';
$salle_de_bain=isset($_POST['salle_de_bain']) ? $_POST['salle_de_bain'] : '';
$construit_en=isset($_POST['construit_en']) ? $_POST['construit_en'] : '';
$dpe=isset($_POST['dpe']) ? $_POST['dpe'] : '';
$ges=isset($_POST['ges']) ? $_POST['ges'] : '';
	
if(isset($_REQUEST['id']))
{
		if($_FILES['photo']['name']!=="")
		{
		move_uploaded_file($_FILES['photo']['tmp_name'],"photo_url/".$_FILES['photo']['name']);
		mysqli_query($conn,"UPDATE tbl_property SET photo_url='$photo' where id=$id");
		}
		
		if($_FILES['photo1']['name']!=="")
		{
		move_uploaded_file($_FILES['photo1']['tmp_name'],"photo_url/".$_FILES['photo1']['name']);
		mysqli_query($conn,"UPDATE tbl_property SET photo_url1='$photo1' where id=$id");
		}		
		
		if($_FILES['photo2']['name']!=="")
		{
		move_uploaded_file($_FILES['photo2']['tmp_name'],"photo_url/".$_FILES['photo2']['name']);
		mysqli_query($conn,"UPDATE tbl_property SET photo_url2='$photo2' where id=$id");
		}
		

		
		
		
		if($_FILES['photo3']['name']!=="")
		{
		move_uploaded_file($_FILES['photo3']['tmp_name'],"photo_url/".$_FILES['photo3']['name']);
		mysqli_query($conn,"UPDATE tbl_property SET photo_url3='$photo3' where id=$id");
		}
		
		if($_FILES['photo4']['name']!=="")
		{
		move_uploaded_file($_FILES['photo4']['tmp_name'],"photo_url/".$_FILES['photo4']['name']);
		mysqli_query($conn,"UPDATE tbl_property SET photo_url4='$photo4' where id=$id");
		}

	    mysqli_query($conn,"UPDATE tbl_property SET buy_or_rent='$buy_or_rent', city='$city', zip='$zip', isnew='$isnew',
		type_of_property='$type_of_property', price='$price', surface_area='$surface_area',no_of_rooms='$no_of_rooms', no_of_bedrooms='$no_of_bedrooms',
		estate='$estate',particularites='$particularites',pieces='$pieces',stationnment='$stationnment',aproximite='$aproximite',
		prop_description='$prop_description',adv_id='$adv_id',ref='$ref',lat='$lat',lon='$lon',wc='$wc',salle_de_bain='$salle_de_bain',
		construit_en='$construit_en',dpe='$dpe',ges='$ges' where id=$id");
		$error= "<font color='green'>Data Updated Successfully.</font><br />";
		
}