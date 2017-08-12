<?php
require_once('dbconfig.php');
?>



<?php
error_reporting (E_ALL ^ E_NOTICE);
	$error=''; 

	if(isset($_POST['update'])){
	$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$lastname = trim($_POST['lastname']);
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
	$civ = isset($_POST['civ']) ? $_POST['civ'] : '';
	$websiteurl = ($_POST['websiteurl']);
	$photo = ("photo_url/".$_FILES['photo']['name']);
	$lat=isset($_POST['lat']) ? $_POST['lat'] : '';
	$lon=isset($_POST['lon']) ? $_POST['lon'] : '';
	$error='';
	//$check = getimagesize($_FILES["photo"]["tmp_name"]);
 
		if (strlen($firstname) < 3) {
		$error .= "<font color='red' >First Name should be within 3-20 characters long.</font>";
		}
		//else if($check == false) {
		//  $error = "<font color='red'>File is not an image.</font>";
        //$uploadOk = 0;
		//}
		
		else if($_FILES['photo']['name']=="")
		{
			mysqli_query($conn,"UPDATE tbl_advisers SET siret='$siret', type='$type', socialreason='$socialreason', tradename='$tradename',
			address='$address', cp='$cp', city='$city', phone='$phone', fax='$fax', email='$email',civ='$civ', firstname='$firstname', lastname='$lastname', 
			websiteurl='$websiteurl',lat='$lat',lon='$lon' where id=$id");
			$error= "<font color='green'>Data Entered Successfully.</font><br />";
		}
		
		
		else{
			move_uploaded_file($_FILES['photo']['tmp_name'],"photo_url/".$_FILES['photo']['name']);
			mysqli_query($conn,"UPDATE tbl_advisers set `siret`='$siret', `type`='$type', `socialreason`='$socialreason', `tradename`='$tradename',
			`address`='$address', `cp`='$cp', `city`='$city', `phone`='$phone', `fax`='$fax', `email`='$email',`civ`='$civ', `firstname`='$firstname', `lastname`='$lastname', 
			`websiteurl`='$websiteurl', `photo_url`='$photo',`lat`='$lat',`lon`='$lon' where id=$id");
			$error= "<font color='green'>Data Updated Successfully.</font><br />";

	}
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

    <title>Static Top Navbar Example for Bootstrap</title>

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
                
                 <li class="dropdown" >
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Agencity <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li class="active"><a href="adviserlist.php">Adviser List</a></li>
                         <li><a href="propertylist.php">Property List</a></li>
                     </ul>
				</li>	 
			 </ul>
        </div>
    </div>
</nav>


<div class="container">


<?php
if(isset($_REQUEST['id'])){
$query1 = mysqli_query($conn,"select * from tbl_advisers where id={$_REQUEST['id']}");
$row1 = mysqli_fetch_assoc($query1);
	}
?>

	<div class="col-md-12">
		<h4 align="center"><?php echo $error;?></h4>
			<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
			<div class="col-md-12">
			<h2 align="center">Edit</h2><br/>
			</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4">Siret: </label>
						<div class="col-md-8">
						<input type="text" name="siret" placeholder="siret" class="form-control" value="<?php echo $row1['siret'];?>"><br/>
						<br/>
						</div>
					
						<label for="type" class="control-label  col-md-4">Type:</label> 
						<div class="col-md-8">
						<input type="text" name="type"   placeholder="Type" required="required" class="form-control" value="<?php echo $row1['type'];?>"><br/>
						<br/>
						</div>
					
						<label class="control-label col-md-4">Social Reason:</label> 
						<div class="col-md-8">
						<input type="text" name="socialreason"  placeholder="Social Reason" required="required"class="form-control" value="<?php echo $row1['socialreason'];?>"><br/>
						<br/>
						</div>
						<label class="control-label col-md-4">Trade Name:</label>  
						<div class="col-md-8">
						<input type="text" name="tradename"  placeholder="Trade Name" required="required"class="form-control" value="<?php echo $row1['tradename'];?>"><br/>
						</div>
					</div>
				</div>
					<div class="col-md-6">
							
						<div class="form-group">
							<div class="col-md-12">
								<div class="col-md-4">
							</div>
							<div class="col-md-6" align="center">
								<img id="photo_url" src="<?php echo $row1['photo_url'];?>" class="img-rounded" alt="your image" width="200px" height="210px" />
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Photo </label>
							<div class="col-md-8">
								<input type="file" name="photo" id="photo" onchange="ShowpImagePreview(this);">
							</div>
						</div>
							
			</div>
			
					
			<div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-2">Address:</label>
					<div class="col-md-4">
						<input type="text" name="address"  placeholder="Address" required="required"class="form-control" value="<?php echo $row1['address'];?>"><br/>
					</div>
					<label class="control-label col-md-2">CP:</label>
							<div class="col-md-4">
							<input type="text" name="cp" placeholder="CP" required="required"class="form-control" value="<?php echo $row1['cp'];?>"><br/>
					</div></div>
						
					<div class="form-group">
						<label class="control-label col-sm-2">City:</label>
					<div class="col-md-4">
						<input type="text" name="city" placeholder="City" required="required" class="form-control" value="<?php echo $row1['city'];?>"><br/>
					</div>
						<label class="control-label col-sm-2">Phone:</label>
					<div class="col-md-4">
						<input type="text" name="phone"  placeholder="Phone" required="required" class="form-control" value="<?php echo $row1['phone'];?>"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-sm-2">Email:</label>
					<div class="col-md-4">
						<input type="text" name="email"  placeholder="email" required="required" class="form-control" value="<?php echo $row1['email'];?>"><br/>
					</div>
						<label class="control-label col-sm-2">Fax:</label>
					<div class="col-md-4">
						<input type="text" name="fax"  placeholder="Fax" required="required" class="form-control" value="<?php echo $row1['fax'];?>"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-sm-2">First Name:</label>
					<div class="col-md-4">
						<input type="text" name="firstname" placeholder="First Name" class="form-control" required="required" value="<?php echo $row1['firstname'];?>"><br/>
					</div>
						<label class="control-label col-sm-2">Last Name:</label>
					<div class="col-md-4">
						<input type="text" name="lastname" placeholder="Last Name"required="required" class="form-control" value="<?php echo $row1['lastname'];?>"><br/>
					</div></div>
					<div class="form-group">
						<label class="control-label col-sm-2">Website:</label>
					<div class="col-md-4">
					<input type="text" name="websiteurl" placeholder="Web URL"required="required" class="form-control" value="<?php echo $row1['websiteurl'];?>"><br/>
					</div>
						<label class="control-label col-sm-2">CIV:</label>
					<div class="col-md-4">
						<input type="text" name="civ"  placeholder="Civ" class="form-control" value="<?php echo $row1['civ'];?>"><br/>
					</div></div>
					
					<div class="form-group">
						<label class="control-label col-sm-2">Latitude:</label>
					<div class="col-md-4">
						<input type="text" name="lat" placeholder="Latitude"required="required" class="form-control" value="<?php echo $row1['lat'];?>"><br/>
					</div>
						<label class="control-label col-sm-2">Longitude:</label>
					<div class="col-md-4">
						<input type="text" name="lon"  placeholder="Longitude" class="form-control" value="<?php echo $row1['lon'];?>"><br/>
					</div>
					</div>

		</div>
		
		
		<div class="col-md-12" align="center" style="margin:5px">	
					<input type="submit" name="update" value="Update" class="btn btn-primary">
		</div>
		</form>
</div>
</div>
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

</body>
</html>



