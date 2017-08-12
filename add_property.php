<?php 
include('dbconfig.php');
SESSION_START();
?>
<?php

	$error=''; 
if(isset($_POST["submit"]))
{
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
$ref=isset($_POST['ref']) ? $_POST['ref'] : '';
$lat=isset($_POST['lat']) ? $_POST['lat'] : '';	
$lon=isset($_POST['lon']) ? $_POST['lon'] : '';
$wc=isset($_POST['wc']) ? $_POST['wc'] : '';
$salle_de_bain=isset($_POST['salle_de_bain']) ? $_POST['salle_de_bain'] : '';
$construit_en=isset($_POST['construit_en']) ? $_POST['construit_en'] : '';
$dpe=isset($_POST['dpe']) ? $_POST['dpe'] : '';
$ges=isset($_POST['ges']) ? $_POST['ges'] : '';
$prop_description=isset($_POST['prop_description']) ? $_POST['prop_description'] : '';
$adv_id=isset($_POST['adv_id']) ? $_POST['adv_id'] : '';	
	
	move_uploaded_file($_FILES['photo']['tmp_name'],"photo_url/".$_FILES['photo']['name']);
	move_uploaded_file($_FILES['photo1']['tmp_name'],"photo_url/".$_FILES['photo1']['name']);
	move_uploaded_file($_FILES['photo2']['tmp_name'],"photo_url/".$_FILES['photo2']['name']);
	move_uploaded_file($_FILES['photo3']['tmp_name'],"photo_url/".$_FILES['photo3']['name']);
	move_uploaded_file($_FILES['photo4']['tmp_name'],"photo_url/".$_FILES['photo4']['name']);
	mysqli_query($conn,"INSERT INTO `tbl_property`(`id`, `buy_or_rent`, `city`, `zip`, `isnew`, `type_of_property`, `price`,
	`surface_area`, `no_of_rooms`, `no_of_bedrooms`, `photo_url`, `estate`, `particularites`, `pieces`, `stationnment`, `aproximite`, `photo_url1`,
	`photo_url2`, `photo_url3`, `photo_url4`, `ref`, `lat`, `lon`, `wc`, `salle_de_bain`, `construit_en`, `dpe`, `ges`, `prop_description`, `adv_id`) 
	VALUES('','$buy_or_rent','$city','$zip','$isnew','$type_of_property','$price','$surface_area',
	'$no_of_rooms','$no_of_bedrooms','$photo','$estate','$particularites','$pieces','$stationnment','$aproximite','$photo1','$photo2','$photo3','$photo4'
	,'$ref','$lat','$lon','$wc','$salle_de_bain','$construit_en','$dpe','$ges','$prop_description','$adv_id')");
	$error= "<font color='green'>Data Entered Successfully.</font><br />";
	header('Refresh :2; URL= propertylist.php');
	
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Add Property</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
<script src="js/script.js"></script>
	
<script type="text/javascript" src="js/img-preview.js"></script>   
</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Agencity</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
				
				<li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Agencity <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="adviserlist.php">Adviser List</a></li>
                         <li class="active"><a href="propertylist.php">Property List</a></li>
                     </ul>
				</li>	
			</ul>
        </div>
    </div>
</nav>

<div class="container">
<div class="col-md-12">
<h4 align="center"><?php echo $error;?></h4>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="col-md-12">
<h2 align="center">Add Property</h2>
</div>

<div class="col-md-12" style="margin-top:30px">

<div class="form-group">
<div class="col-md-2">
</div>
<div class="col-md-2">
<img id="photo_url" src="#" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url1" src="#" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url2" src="#" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url3" src="#" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url4" src="#" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

</div>

<div class="form-group">
<div class="col-md-2">
<label class="control-label col-md-12">Photo URL: </label>
</div>

<div class="col-md-2">
<input type="file" name="photo" id="photo" onchange="ShowpImagePreview0(this);" />
<br/>
</div>

<div class="col-md-2">
<input type="file" name="photo1" id="photo1" onchange="ShowpImagePreview(this);" />
<br/>
</div>

<div class="col-md-2">
<input type="file" name="photo2" id="photo2" onchange="ShowpImagePreview1(this);" />
<br/>
</div>

<div class="col-md-2">
<input type="file" name="photo3" id="photo3" onchange="ShowpImagePreview2(this);" />
<br/>
</div>

<div class="col-md-2">
<input type="file" name="photo4" id="photo4" onchange="ShowpImagePreview3(this);" />
<br/>
</div>

</div>



<div class="form-group">
<label class="control-label col-md-2">Buy Or Rent: </label>
<div class="col-md-4">
<select name="buy_or_rent" class="form-control">
<option>Buy</option>
<option>Rent</option>
</select>

</div>
<label class="control-label col-md-2">City: </label>
<div class="col-md-4">
<input type="text" name="city" placeholder="City" class="form-control"/>
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">ZIP: </label>
<div class="col-md-4">
<input type="number" name="zip" placeholder="ZIP" class="form-control"/>
</div>
<!--
<label class="control-label col-md-2">Geo Location: </label>
<div class="col-md-4">
<input type="text" name="geolocation" placeholder="geolocation" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode==46 || event.charCode==44 || event.charCode==0'/>
</div>
-->
<label class="control-label col-md-2">Is New: </label>
<div class="col-md-4">
<select name="isnew" class="form-control">
<option>Yes</option>
<option>No</option>
</select>
<br/>
</div>
</div>

<label class="control-label col-md-2">Price: </label>
<div class="col-md-4">
<input type="text" name="price" placeholder="price" class="form-control">
<br/>
</div>


<div class="form-group">
<label class="control-label col-md-2">Surface Area: </label>
<div class="col-md-4">
<input type="text" name="surface_area" placeholder="surface_area" class="form-control">
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">No. Of Rooms: </label>
<div class="col-md-4">
<input type="text" name="no_of_rooms" placeholder="no_of_rooms" class="form-control">
<br/>
</div>
<label class="control-label col-md-2">No.Of BedRooms: </label>
<div class="col-md-4">
<input type="text" name="no_of_bedrooms" placeholder="No. of BedRooms" class="form-control">
</div>
</div>


<div class="form-group">
<label class="control-label col-md-2">Estate: </label>
<div class="col-md-4">
<select name="estate" class="form-control">
<option>Ascenseur</option>
<option> Digicode</option>
<option> Interphone</option>
<option> Gardien</option>
</select>
<br/>
</div>
<label class="control-label col-md-2">Particularites: </label>
<div class="col-md-4">
<select name="particularites" class="form-control">
<option>Terrain/Jardin</option>
<option> Terrasse</option>
<option> Balcon</option>
<option> Piscine</option>
<option> Cave</option>
<option> cuisine equipee</option>
<option>Meuble</option>
</select>
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Pieces: </label>
<div class="col-md-4">
<select name="pieces" class="form-control">
<option>WC Separes</option>
<option></option>
</select>
<br/>
</div>
<label class="control-label col-md-2">Stationnement: </label>
<div class="col-md-4">
<select name="stationnment" class="form-control">
<option>Garage</option>
<option> Parking</option>
<option> Box</option>
</select>
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Aproximite: </label>
<div class="col-md-4">
<select name="aproximite" class="form-control">
<option>Commerces</option>
<option> Transports en commun</option>
</select>
<br/>
</div>
<label class="control-label col-md-2">Ref.</label>
<div class="col-md-4">
<input type="text" name="ref" placeholder="Ref." class="form-control">
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Latitude</label>
<div class="col-md-4">
<input type="text" name="lat" placeholder="Latitude" class="form-control">
<br/>
</div>
<label class="control-label col-md-2">Longitude</label>
<div class="col-md-4">
<input type="text" name="lon" placeholder="Longitude" class="form-control">
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">WC</label>
<div class="col-md-4">
<input type="int" name="wc" placeholder="WC" class="form-control">
<br/>
</div>
<label class="control-label col-md-2">Salle de bain</label>
<div class="col-md-4">
<input type="text" name="salle_de_bain" placeholder="Salle_de_bain" class="form-control">
<br/>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-2">DPE</label>
<div class="col-md-4">
<input type="text" name="dpe" placeholder="DPE" class="form-control">
<br/>
</div>
<label class="control-label col-md-2">GES</label>
<div class="col-md-4">
<input type="text" name="ges" placeholder="GES" class="form-control">
<br/>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-2">Adviser Id</label>
<div class="col-md-4">
<input type="text" name="adv_id" placeholder="Adviser Id" class="form-control">
</div>
<label class="control-label col-md-2">Construit_en</label>
<div class="col-md-4">
<input type="text" name="construit_en" placeholder="Construit_en" class="form-control">
<br/>
</div>
</div>


<div class="form-group">
<label class="control-label col-md-2">Type Of Property: </label>
<div class="col-md-4">
<select name="type_of_property[]" multiple="multiple" class="form-control">
<option selected>Maison</option>
<option> Appartement</option>
<option> Stationnement</option>
<option> Immeuble</option>
<option> Commerce</option>
<option> Terrain</option>
</select>
</div>
<label class="control-label col-md-2">Property Description</label>
<div class="col-md-4">
<textarea cols="40" rows="3" name="prop_description" placeholder="prop_description" class="form-control"></textarea>
</div>
</div>

</div>
</div>
<div class="col-md-12" align="center"  style="margin:5px">
<input type="submit" name="submit" value="Submit" class="btn btn-success">
</div>
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
<script src="js/jquery1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>