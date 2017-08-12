<?php
header("Access-Control-Allow-Origin: *");

/**
 * Created by IntelliJ IDEA.
 * User: Bhagwant
 * Date: 25-Sep-16
 * Time: 9:11 PM
 */

// Database Variables (edit with your own server information)

$server = 'localhost';

$user = 'root';//'abc';

$pass = '';//'abc123';

$db = 'agencity';


/*

$server = 'localhost';

$user = 'drugs_agencity';

$pass = 'agencity123';

$db = 'drugstat_agencity';

*/

// Connect to Database

$conn=mysqli_connect($server,$user,$pass,$db)

or die ("Could not connect to server ... \n" . mysql_error ());


?>