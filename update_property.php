<?php 
include('dbconfig.php');
SESSION_START();
?>
<?php
$error="";
?>

<?php

	$error=''; 
if(isset($_POST["update"]))
{
	include_once('update_property1.php');
	//header('location:propertylist.php');
	//header('Refresh :2; URL= propertylist.php');
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

    <title>Update Property</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	
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
                
                 <li class="dropdown" >
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Agencity <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li ><a href="adviserlist.php">Adviser List</a></li>
                         <li class="active"><a href="propertylist.php">Property List</a></li>
                     </ul>
				</li>	 
			 </ul>
        </div>
    </div>
</nav>

<div class="container">
<?php
if(isset($_REQUEST['id'])){
$query1 = mysqli_query($conn,"select * from tbl_property where id={$_REQUEST['id']}");
$row1 = mysqli_fetch_assoc($query1);
	}
?>
<div class="col-md-12">
<h4 align="center"><?php echo $error;?></h4>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="form-group">
<div class="col-md-12">
<h2 align="center">Update Property</h2><br/>
</div>


<div class="col-md-12" style="margin-top:30px">

<div class="form-group">
<div class="col-md-2">
</div>
<div class="col-md-2">
<img id="photo_url" src="<?php echo $row1['photo_url'];?>" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url1" src="<?php echo $row1['photo_url1'];?>" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url2" src="<?php echo $row1['photo_url2'];?>" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url3" src="<?php echo $row1['photo_url3'];?>" class="img-rounded" alt="your image" width="160px" height="180px"/>
</div>

<div class="col-md-2">
<img id="photo_url4" src="<?php echo $row1['photo_url4'];?>" class="img-rounded" alt="your image" width="160px" height="180px"/>
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
<select name="buy_or_rent" class="form-control" >
 <option> <?php echo isset($row1["buy_or_rent"]) ? $row1["buy_or_rent"] :"";?> </option>
<option >Buy</option>
<option>Rent</option>
</select>

</div>
<label class="control-label col-md-2">City: </label>
<div class="col-md-4">
<input type="text" name="city" placeholder="City" value="<?php echo isset($row1['city']) ? $row1["city"] : "";?>" class="form-control"/>
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">ZIP: </label>
<div class="col-md-4">
<input type="number" name="zip" placeholder="ZIP" class="form-control" value="<?php echo isset($row1['zip']) ? $row1["zip"] : "";?>"/>

</div>
<label class="control-label col-md-2">Is New: </label>
<div class="col-md-4">
<select name="isnew" class="form-control">
 <option> <?php echo isset($row1["isnew"]) ? $row1["isnew"] : "";?> </option>
<option>Yes</option>
<option>No</option>
</select>
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Price: </label>
<div class="col-md-4">
<input type="text" name="price" placeholder="price" class="form-control" value="<?php echo isset($row1['price']) ? $row1["price"] : "";?>">
</div>
<label class="control-label col-md-2">Surface Area: </label>
<div class="col-md-4">
<input type="text" name="surface_area" placeholder="surface_area" class="form-control" value="<?php echo isset($row1['surface_area']) ? $row1["surface_area"] : "";?>">
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">No. Of Rooms: </label>
<div class="col-md-4">
<input type="text" name="no_of_rooms" placeholder="no_of_rooms" class="form-control" value="<?php echo isset($row1['no_of_rooms']) ? $row1["no_of_rooms"] : "";?>">
</div>
<label class="control-label col-md-2">No.Of BedRooms: </label>
<div class="col-md-4">
<input type="text" name="no_of_bedrooms" placeholder="No. of BedRooms" class="form-control" value="<?php echo isset($row1['no_of_bedrooms']) ? $row1["no_of_bedrooms"] : "";?>">
<br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Estate: </label>
<div class="col-md-4">
<select name="estate" class="form-control">
 <option> <?php echo isset($row1["estate"]) ? $row1["estate"] : "";?> </option>
<option>Ascenseur</option>
<option> Digicode</option>
<option> Interphone</option>
<option> Gardien</option>
</select>
</div>
<label class="control-label col-md-2">Particularites: </label>
<div class="col-md-4">
<select name="particularites" class="form-control">
<option > <?php echo isset($row1["particularites"]) ? $row1["particularites"] : "";?> </option>
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
<option > <?php echo isset($row1["pieces"]) ? $row1["pieces"] : "";?> </option>
<option>WC Separes</option>
</select>
</div>
<label class="control-label col-md-2">Stationnement: </label>
<div class="col-md-4">
<select name="stationnment" class="form-control">
 <option> <?php echo isset($row1["stationnment"]) ? $row1["stationnment"] : "";?> </option>
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
 <option> <?php echo isset($row1["aproximite"]) ? $row1["aproximite"] : "";?> </option>
<option>Commerces</option>
<option> Transports en commun</option>
</select>
</div>
<label class="control-label col-sm-2">Ref:</label>
<div class="col-md-4">
<input type="text" name="ref" placeholder="Ref."required="required" class="form-control" value="<?php echo $row1['ref'];?>"><br/>
</div>

</div>

<div class="form-group">
<label class="control-label col-sm-2">Latitude:</label>
<div class="col-md-4">
<input type="text" name="lat" placeholder="Latitude"required="required" class="form-control" value="<?php echo $row1['lat'];?>">
</div>
<label class="control-label col-sm-2">Longitude:</label>
<div class="col-md-4">
<input type="text" name="lon"  placeholder="Longitude" class="form-control" value="<?php echo $row1['lon'];?>"><br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">WC:</label>
<div class="col-md-4">
<input type="text" name="wc" placeholder="WC"required="required" class="form-control" value="<?php echo $row1['wc'];?>">
</div>
<label class="control-label col-sm-2">salle_de_bain:</label>
<div class="col-md-4">
<input type="text" name="salle_de_bain"  placeholder="" class="form-control" value="<?php echo $row1['salle_de_bain'];?>"><br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">DPE:</label>
<div class="col-md-4">
<input type="text" name="dpe" placeholder=""required="required" class="form-control" value="<?php echo $row1['dpe'];?>">
</div>
<label class="control-label col-sm-2">GES:</label>
<div class="col-md-4">
<input type="text" name="ges"  placeholder="" class="form-control" value="<?php echo $row1['ges'];?>"><br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Adviser Id:</label>
<div class="col-md-4">
<input type="text" name="adv_id"  placeholder="" class="form-control" value="<?php echo $row1['adv_id'];?>">
</div>
<label class="control-label col-sm-2">Construit_en:</label>
<div class="col-md-4">
<input type="text" name="construit_en" placeholder=""required="required" class="form-control" value="<?php echo $row1['construit_en'];?>"><br/>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Type Of Property: </label>
<div class="col-md-4">
<select name="type_of_property[]" multiple="multiple" class="form-control">
 <option selected> <?php echo isset($row1['type_of_property']) ? $row1['type_of_property'] : '';?> </option>
<option>Maison</option>
<option> Appartement</option>
<option> Stationnement</option>
<option> Immeuble</option>
<option> Commerce</option>
<option> Terrain</option>
</select>
<br/>
</div>
<label class="control-label col-md-2">Property Description</label>
<div class="col-md-4">
<textarea cols="40" rows="3" name="prop_description" placeholder="Prop_Description" class="form-control"><?php echo isset($row1['prop_description']) ? $row1['prop_description']: ''; ?></textarea>
</div>
</div>

</div>
<div class="col-md-12" align="center"  style="margin:5px">
<input type="submit" name="update" value="Update" class="btn btn-success">
</div>
</div>
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

    <script src="js/jquery1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>