<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bhagwant
 * Date: 25-Sep-16
 * Time: 11:46 PM
 */

// connect to the database

include('dbconfig.php');

// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

    $id = $_GET['id'];



// delete the entry

    $result = mysqli_query($conn,"DELETE FROM tbl_advisers WHERE id=$id")

    or die(mysql_error());



// redirect back to the view page

    header("Location: adviserlist.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

    header("Location: adviserlist.php");

}


