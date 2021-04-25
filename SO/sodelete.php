<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM softwares WHERE id=$id");

// Move deleted row to bin


//redirecting to the display page (index)
header("Location:SO.php");
?>

