<?php include('db-connect.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? echo $title ?></title>
  </head>
  <body >

<? $recipeQuery = "SELECT name_of_recipe, recipe_id FROM Recipes;"; ?>

<form action="shopping-list-form.php" method="post">

			<h1>Grocery List  pulling from database</h1>
			<p><? if($result = mysqli_query($con, $recipeQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
			<input type="checkbox" name="recipe_id[]" value="<?=$row['recipe_id']?>"><?=$row['name_of_recipe']?> recipe id: <?=$row['recipe_id']?></input>
			
		<? }} ?>
		<br/>
		<input type="submit" name="submit" value="submit"/></p>
		</form>
		
		
				
		
		
		

<p><i> *on submit will populate a grocery check box list</i></p>

	
	
	
	
	
	
	

<div class ="meals">
	<h2>Ingredients from Meal</h2>
	<p><? $ingredQuery = "SELECT Ingredients.name, Ingredients.quanity, quanity.unit FROM Ingredients, quanity
WHERE Ingredients.quanity_id = quanity.quanity_id;";
		if($result = mysqli_query($con, $ingredQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {
				
				
			?>
				
				<p> <?=$row['name']?> <?=$row['quanity']?> <?=$row['unit']?>
		<? }
		} ?></p>
			
		
		<h1>Start New section</h1>
		
			<p><? $recipeTest = "SELECT Recipes.name_of_recipe, Ingredients.name FROM Recipes INNER JOIN Ingredients WHERE recipe_id =2;";
		if($result = mysqli_query($con, $recipeTest)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
				<p>Recipe Name: <?=$row['name_of_recipe']?><br/> Ingredient Name: <?=$row['name']?> <hr>
		<? }
		}?></p>
		
		
		
		
		


<div class="meal-list">

	<h2>Here is your list</h2>
		<input type="checkbox" name="meal" value="eggs">4 eggs</input>
	<input type="checkbox"	name="meal" value="milk">2 cups milk</input>
	<input type="checkbox"  name="meal" value="cheese">1 cup cheese</input>
	
	<button>Print Checked</button>

</div>
<hr>
<div class ="new-meal">
	<h1>This will come later</h1>
	<h2>form</h2>
		<form action="?" method="post">
			<label for="recipe_name">Recipe Name</label>
			<input name="recipe_name" type="text"></input>
			<input type="submit" value="Submit Recipe Name">
		
		</form>
	<h2>Add a New Meal</h2>
	<form>
	<label for="name_of_recipe">Name Of Recipe:</label>
	<input type="text" id="name_of_recipe"></input><br/>
	<label for="ingredient1">Ingredient 1:</label>
	<input type="text" id="ingredient1"></input>
	<label for="ingredient1_amount">Ingredient 1 Amount:</label>
	<input type="text" id="ingredient1_amount"></input><br/>
	<label for="ingredient2">Ingredient 2:</label>
	<input type="text" id="ingredient2"></input>
	<label for="ingredient2_amount">Ingredient 2 Amount:</label>
	<input type="text" id="ingredient2_amount"></input><br/>
	<label for="recipe_address">Recipe Address:</label><br/>
	
	<input type="text" id="recipe_address"></input>
	<button>Submit</button>
	</form>
</div>



</div>
</body>
</html>