<? include('db-connect.php') ?>
<?  
$recipeId = implode(',',$_POST['recipe_id']);  //create an array from the $_post variables
echo $recipeId. "  just showing the recipe ids that were selected for testing </br></br>";
//$allThree = "SELECT Recipes.recipe_id, Recipes.name_of_recipe,Ingredients.name, Ingredients.quanity   FROM Recipes, Ingredients, quanity
//WHERE Recipes.recipe_id = Ingredients.recipe_id
//AND Recipes.recipe_id = '$recipeId[0]';" 

$allThree = "SELECT Recipes.recipe_id, Recipes.name_of_recipe, Ingredients.name, Ingredients.quanity
FROM Recipes, Ingredients, quanity
WHERE Recipes.recipe_id = Ingredients.recipe_id
AND Recipes.recipe_id
IN ($recipeId);";

$ingredientNames = "SELECT DISTINCT name FROM Ingredients;";

$nameArray = array();
$count=0;

?>

 
<!-- getting the name variables from ingredients to form an array to loop through to be able to add them in the grocery list -->

		<? if($result= mysqli_query($con, $ingredientNames)){
			
				while($name = mysqli_fetch_assoc($result)){
				
						$nameArray[$count] = $name['name'];
						$count += 1;

		 }} ?>

 

<h1>pulling from Ingredient and Recipe tables</h1>
															
			<!--looping through the ingredients -->
										
			<p><? if($result= mysqli_query($con, $allThree)){
				while($row = mysqli_fetch_assoc($result)){?>
				<ul>
								
				<li><?//=$row['recipe_id']//?> <?//=$row['name_of_recipe']//?> <?=$row['name']?> <?=$row['quanity']?></li>
				
													<!--  creating a conditional statement to count the ingredients -->
				
				<? if($row['name'] == "egg"){ $egg += 1?>
				<p><?=$egg?> egg</p> <? } ?>
				</ul>
				
			
		<? }} ?>
		
		
		
	
	<!-- just a simple loop to show what is stored in the ingredients array -->
	<p>This is the ingredient name array- will use to compare in future switch statement</p>
		
<?	foreach($nameArray as $name){
    echo $name.'<br>';
} 
	
?>
			
			
		
						
			
