<?php 
include('dbconfig.php');
session_start();
/*if(isset($_SESSION['login_id']) == false)
{
header("Location:login.php");
}
*/
?>
<?php 
error_reporting (E_ALL ^ E_NOTICE);
	$error=''; 
 if(isset($_POST["submit"])) {

	$name = trim($_POST['name']);
	$firstname = trim($_POST['firstname']);
	//$firstname=($_POST['firstname']);
	//$name = ($_POST['name']);
	$siret = ($_POST['siret']);
	$type = ($_POST['type']);
	$socialreason = ($_POST['socialreason']);
	$tradename = ($_POST['tradename']);
	$address = ($_POST['address']);
	$cp = ($_POST['cp']);
	$city = ($_POST['city']);
	$phone = ($_POST['phone']);
	$fax = ($_POST['fax']);
	$email = ($_POST['email']);
	$civ = ($_POST['civ']);
	$websiteurl = ($_POST['websiteurl']);
	$photo = ("photo_url/".$_FILES['photo']['name']);
	$lat=isset($_POST['lat']) ? $_POST['lat'] : '';
	$lon=isset($_POST['lon']) ? $_POST['lon'] : '';
	$pass=isset($_POST['pass']) ? $_POST['pass'] : '';
	$username = $firstname." ".$name;
	$error='';
	//$check = getimagesize($_FILES["photo"]["tmp_name"]);
    if (strlen($firstname) < 3) {
		$error .= "<font color='red' >First Name should be 3 characters long.</font>";
		}
	//else if($check == false) {
		//   $error = "<font color='red'>File is not an image.</font>";
        //$uploadOk = 0;
		//}
		else if($_FILES['photo']['name']=="")
		{
		$query = "INSERT INTO `tbl_advisers` (`id`, `siret`, `type`, `socialreason`, `tradename`,
				`address`, `cp`, `city`, `phone`, `fax`, `email`,`civ`, `firstname`, `lastname`, 
				`websiteurl`,lat, lon, username, password)	
				VALUES('','$siret','$type','$socialreason','$tradename','$address','$cp',
				'$city','$phone','$fax','$email','$civ','$firstname','$name','$websiteurl','$lat','$lon','$username','$pass')";
			$error= "<font color='green'>Data Inserted without Image.</font><br />";
		mysqli_query($conn,$query);
		//echo $query;
			header('Refresh :2; URL= adviserlist.php');
		}
		
		else{
			move_uploaded_file($_FILES['photo']['tmp_name'],"photo_url/".$_FILES['photo']['name']);

			mysqli_query($conn,"INSERT INTO `tbl_advisers` (`id`, `siret`, `type`, `socialreason`, `tradename`,
				`address`, `cp`, `city`, `phone`, `fax`, `email`,`civ`, `firstname`, `lastname`, 
				`websiteurl`, `photo_url`,lat, lon, username, password)	
				VALUES('','$siret','$type','$socialreason','$tradename','$address','$cp',
				'$city','$phone','$fax','$email','$civ','$firstname','$name','$websiteurl','$photo','$lat','$lon','$username','$pass')");
			$error= "<font color='green'>Data Entered Successfully.</font><br />";
			header('Refresh :2; URL= adviserlist.php');

			}
} 
  ?>



<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
-->	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Add New</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	
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
                         <li class="active"><a href="adviserlist.php">Adviser List</a></li>
                         <li><a href="propertylist.php">Property List</a></li>
                     </ul>
				</li>	 
        </div>

    </div>
</nav>


<div class="container">

	<div class="col-md-12">
	 <h4 align="center"><?php echo $error;?></h4>
		
			<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
			<div class="col-md-12">
			<h2 align="center">Add New</h2><br/>
					</div>
			<div class="col-md-6" >
				
					<div class="form-group">
						<label class="control-label col-md-4">Siret: </label>
						<div class="col-md-8">
						<input type="text" name="siret" placeholder="siret" class="form-control"><br/>
					</div></div><div class="form-group">
						<label for="type" class="control-label  col-md-4">Type:</label> 
						<div class="col-md-8">
					<input type="text" name="type"   placeholder="Type" required="required" class="form-control"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-md-4">Social Reason:</label> 
					<div class="col-md-8">
						<input type="text" name="socialreason"  placeholder="Social Reason" required="required"class="form-control"><br/>
					<br/>
					</div>

						<label class="control-label col-md-4">Trade Name:</label>  
					<div class="col-md-8">
						<input type="text" name="tradename"  placeholder="Trade Name" required="required"class="form-control"><br/>
					</div></div>
					</div>
					<div class="col-md-6">
							<div class="form-group">
							<div class="col-md-12">
							<div class="col-md-4">
							</div>
							<div class="col-md-6" align="center">
							<img id="photo_url" src="#" class="img-rounded" alt="your image" width="200px" height="200px"/>	
							</div>
							</div>
						</div>
							
							<div class="form-group">
							<div class="col-md-12">
							<div class="col-md-4">
							<label class="control-label col-md-2">Photo: </label>
							</div>
							<div class="col-md-8">
								<input type="file" name="photo" id="photo" onchange="ShowpImagePreview(this);">
							</div>
							</div>
						</div>
			</div>
					
			<div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-2">Address:</label>
					<div class="col-md-4">
						<input type="text" name="address"  placeholder="Address" required="required"class="form-control"><br/>
					</div>
					<label class="control-label col-md-1">CP:</label>
							<div class="col-md-4">
							<input type="text" name="cp" placeholder="CP" required="required"class="form-control"><br/>
					</div></div>
						
					<div class="form-group">
						<label class="control-label col-sm-2">City:</label>
					<div class="col-md-4">
						<input type="text" name="city" placeholder="City" required="required" class="form-control"><br/>
					</div>
						<label class="control-label col-sm-1">Phone:</label>
					<div class="col-md-4">
						<input type="text" name="phone"  placeholder="Phone" required="required" class="form-control"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-sm-2">Email:</label>
					<div class="col-md-4">
						<input type="text" name="email"  placeholder="email" required="required" class="form-control"><br/>
					</div>
						<label class="control-label col-sm-1">Fax:</label>
					<div class="col-md-4">
						<input type="text" name="fax"  placeholder="Fax" required="required" class="form-control"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-sm-2">First Name:</label>
					<div class="col-md-4">
						<input type="text" name="firstname" placeholder="First Name" class="form-control" required="required"><br/>
					</div>
						<label class="control-label col-sm-1">Last Name:</label>
					<div class="col-md-4">
						<input type="text" name="name" placeholder="Name"required="required" class="form-control"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-sm-2">Website:</label>
					<div class="col-md-4">
					<input type="text" name="websiteurl" placeholder="Web URL"required="required" class="form-control"><br/>
					</div>
						<label class="control-label col-sm-1">CIV:</label>
					<div class="col-md-4">
						<input type="text" name="civ"  placeholder="Civ" class="form-control"><br/>
					</div></div>
					
					<div class="form-group">
						<label class="control-label col-sm-2">Latitude:</label>
					<div class="col-md-4">
					<input type="text" name="lat" placeholder="Latitude"required="required" class="form-control"><br/>
					</div>
						<label class="control-label col-sm-1">Longitude:</label>
					<div class="col-md-4">
						<input type="text" name="lon"  placeholder="Longitude" class="form-control"><br/>
					</div></div>
					
					
										<div class="form-group">
						<label class="control-label col-sm-2">Password:</label>
					<div class="col-md-4">
					<input type="password" name="pass" placeholder="Password"required="required" class="form-control"><br/>
					</div></div>

		</div>
		
		
		<div class="col-md-12" align="center" style="margin:5px">	
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</div>
		</form>
</div>

<!--Code for Edit Info-->
<div class="col-md-4" align="center" style="margin:5px">	

</div>
<!--End of Edit Info-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

 <script type="text/javascript">
         function ShowpImagePreview(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $('#photo_url').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(input.files[0]);
             }
         }
    </script>
</div>
<script src="js/jquery1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>