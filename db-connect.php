<?php
// Create connection
 $con = new mysqli('localhost','webwolf2112','justin2112','meal_list');
 
 
// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>  
