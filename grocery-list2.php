<?php
// Create connection
 $link = new mysqli('localhost','sampleuser','test123','meal_list');
 
// Setting it to use only utf8 to prevent special characters from being entered 
 
  if(!mysqli_set_charset($link, 'utf8'))
 {
 	$output = 'utf8 charset not set';
 }


// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? echo $title ?></title>

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Inika' rel='stylesheet' type='text/css'>
    <link href="js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/js/vendor/Nivo-lightbox/nivo-lightbox.css" type="text/css" />
		<link rel="stylesheet" href="/js/vendor/Nivo-lightbox/themes/default/default.css" type="text/css" />
    <link href="css/main.css" rel="stylesheet">
    

    <!--[if lt IE 9]> -->
    
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
     <script src="/js/main.js"></script>
    
    <script src="https://code.jquery.com/jquery.js"></script> 
 <script src="js/vendor/bootstrap/bootstrap.min.js"></script> 											<!-- DONT FORGET TO ADD IN BOOTSTRAP JS -->
   
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 <link href='http://fonts.googleapis.com/css?family=Felipa' rel='stylesheet' type='text/css'>  
  <script src="/js/vendor/Nivo-lightbox/nivo-lightbox.min.js"></script>
   

  </head>
  <body >


<div class = "container">
<?php echo $output ?>

<h1>Grocery List</h1>

<div class ="meals">
	<h2>Select a Meal</h2>
	<p><? $ingredQuery = "SELECT * FROM `Ingredients` ";
		if($result = mysqli_query($link, $ingredQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
				<p><?=$row['id']?> <?=$row['name']?> 
		<? }
		} ?></p>
			<p><? $recipeQuery = "SELECT * FROM Recipes;";
		if($result = mysqli_query($link, $recipeQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
				<p><?=$row['id']?><?=$row['name_of_recipe']?>
		<? }
		} ?></p>
		<p><? $recipeQuery = "SELECT * FROM shop_list;";
		if($result = mysqli_query($link, $recipeQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
				<p>Recipe ID<?=$row['recipe_id']?> Quanity<?=$row['quanity']?> Ingredient ID<?=$row['ing_id']?> Name <?=$row['ingredient_name']?>
		<? }
		} ?></p>
		
		<h1>Start New section</h1>
		
			<p><? $recipeTest = "SELECT Recipes.name_of_recipe, Ingredients.name FROM Recipes INNER JOIN Ingredients WHERE recipe_id =2;";
		if($result = mysqli_query($link, $recipeTest)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
				<p>Recipe Name: <?=$row['name_of_recipe']?><br/> Ingredient Name: <?=$row['name']?> <hr>
		<? }
		}?></p>
		
		
		
		
		
		
		
	
		
		
		
	

</div>
</body>
</html>