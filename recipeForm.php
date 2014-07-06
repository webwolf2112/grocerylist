<?php
// Create connection
 $con = new mysqli('localhost','webwolf2112','justin2112','meal_list');
 
// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{

	echo "Connection Successful <br/>";
	}
	

//queries

//echo $_GET[recipeName];
?>
<? $ingredQuery = "INSERT INTO `Recipes`(`name_of_recipe`, `recipe_id`) VALUES ('$_POST[recipeName]','');";
		if($result = mysqli_query($con, $ingredQuery)) { 
			
				echo "success $_POST[recipeName] was added </br>";
				echo "<a href='grocery-list.php'>Check it out on the grocery list</a>";
		}
		
?>



		
