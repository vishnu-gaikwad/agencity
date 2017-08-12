<?php
/**
* Created by IntelliJ IDEA.
* User: Bhagwant
* Date: 25-Sep-16
* Time: 11:46 PM
*/
?>
<!DOCTYPE html>
<html lang="en">
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
	<script>
	function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
</head>

<body>

<!-- Static navbar -->
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
 

			   <!-- <li><a href="#contact">Contact</a></li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="#">Action</a></li>
                         <li><a href="#">Another action</a></li>
                         <li><a href="#">Something else here</a></li>
                         <li role="separator" class="divider"></li>
                         <li class="dropdown-header">Nav header</li>
                         <li><a href="#">Separated link</a></li>
                         <li><a href="#">One more separated link</a></li>
                     </ul>
                 </li>
             </ul>
             <ul class="nav navbar-nav navbar-right">
                 <li><a href="#">Default</a></li>
                            <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
                 <li><a href="#">Fixed top</a></li>
             </ul>-->
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>


<div class="container">

    <div class="row">
        <div class="col-md-12">

            <?php

            include('dbconfig.php');


            $sql = "SELECT COUNT(id) FROM tbl_property";

            // $sql = "SELECT COUNT(f_id),sum(score) FROM tbl_feedback where url like '%". $_SESSION["url"] ."%'";
            $rs_result = mysqli_query($conn, $sql);


            $limit = 10;

            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];


            $total_pages = ceil($total_records / $limit);
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $start_from = ($page - 1) * $limit;


            if ($total_records > 0) {
                $pagLink = "<ul class='pagination pull-right' style='margin:0px;'>";

                if ($total_pages <= 5 || $page <= 4) {
                    for ($i = 1; $i <= 5 && $i <= $total_pages; $i++) {
                        $pagLink .= "<li";
                        if ($page == $i): $pagLink .= " class='active'>";
                        else: $pagLink .= " >";  endif;

                        $pagLink .= "<a href='propertylist.php?page=" . $i . "'>" . $i . "</a></li>";
                    }
                } elseif ($total_pages > 5 || $page > 4) {

                    for ($i = $total_pages - 4; $i <= $total_pages; $i++) {
                        $pagLink .= "<li";
                        if ($page == $i): $pagLink .= " class='active'>";
                        else: $pagLink .= " >";  endif;

                        $pagLink .= "<a href='propertylist.php?page=" . $i . "'>" . $i . "</a></li>";
                    }
                }


                $sql = "SELECT * FROM tbl_property LIMIT $start_from, $limit ";
                //}


                $rs_result2 = mysqli_query($conn, $sql);


                // display data in table

                echo "<table class='table table-bordered'>";

                echo "<tr> <th>ID</th> <th>Buy Or Rent</th> <th>Is New</th><th>Type Of Property</th><th>Surface Area</th><th>City</th><th>Price</th> <th></th> <th></th></tr>";

                // loop through results of database query, displaying them in the table


                while ($row = mysqli_fetch_assoc($rs_result2)) {

                    echo "<tr>";

                    echo '<td>' . $row['id'] . '</td>';

                    echo '<td>' . $row['buy_or_rent'] . '</td>';
					
					  echo '<td>' . $row['isnew'] . '</td>';

                    echo '<td>' . $row['type_of_property'] . '</td>';

                    echo '<td>' . $row['surface_area'] . '</td>';

                    echo '<td>' . $row['city'] . '</td>';

                    echo '<td>' . $row['price'] . '</td>';

                    echo '<td><a href="update_property.php?id=' . $row['id'] . '">Edit</a></td>';

					echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_property.php?id=".$row['id']."'>Delete</a></td>";
                    //echo '<td><a href="delete_adviser.php?id=' . $row['id'] . '">Delete</a></td>';

                    echo "</tr>";

                }


                // close table>

                echo "</table>";


                // display pagination

                if ($total_pages != 0) {
                    echo $pagLink . '<li><a>....</a></li><li><a href=propertylist.php?page=' . $total_pages . ">" . $total_pages . "</a></li></ul>";
                }


            } else {
                echo 'No Records Found';
            }
            ?>

            <p><a href="add_property.php">Add a new Property</a></p>


        </div>
    </div>


</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
