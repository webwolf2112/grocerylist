<?php
 include('db-connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? echo $title ?></title>
  </head>
  <body >



<form action="" method="post">

			<h1>Grocery List  pulling from database</h1>
			
			
			<p><?
				// Select name of recipe and ID to populate the checkboxes 
	
				$recipeQuery = "SELECT name_of_recipe, recipe_id FROM Recipes;";
			
			 if($result = mysqli_query($con, $recipeQuery)) { 
			while($row = mysqli_fetch_assoc($result)) {?>
			<input type="checkbox" name="recipe_id[]" value="<?=$row['recipe_id']?>"><?=$row['name_of_recipe']?> recipe id: <?=$row['recipe_id']?></input>
			
		<? }} ?>
		<br/>
		<input type="submit" name="submit" value="submit"/></p>
		</form>
		

<p><i> *on submit will populate a grocery check box list</i></p>

	
<div class ="meals">
				
			
		
			
			<?  // Pulling the IDs from the posted checkbox form and making a new query to populate the grocery list 
			
			$recipeId = implode(',',$_POST['recipe_id']);  //create an array from the $_post variables to insert into the $ingredientList querie

			$ingredientList = "SELECT Recipes.recipe_id, Recipes.name_of_recipe, Ingredients.name, Ingredients.quanity, quanity.unit 
			FROM Recipes, Ingredients, quanity WHERE Recipes.recipe_id = Ingredients.recipe_id 
			AND Ingredients.measurement = quanity.quanity_id 
			AND Recipes.recipe_id
			IN ($recipeId);";

			?>

 
<!-- getting the name variables from ingredients to form an array to loop through to be able to add them in the grocery list -->

		<? //getting ingredient names in order to combine the ingredients into the list
		
		$ingredientNames = "SELECT DISTINCT name FROM Ingredients;";
		
		if($result= mysqli_query($con, $ingredientNames)){
				$nameArray = array();
				$count=0;
				while($name = mysqli_fetch_assoc($result)){
				
						$nameArray[$count] = $name['name'];
						$count += 1;

		 }} ?>

 
<!--pulling from Ingredient and Recipe tables-->

		<? if(isset($_POST['recipe_id'])) { ?>
		
		<div class="meal-list">
			<h2>Here is your list</h2>
			
							
			<!--looping through the ingredients -->
										
			<p><? if($result= mysqli_query($con, $ingredientList)){
			
				// new array start at 0 to prevent malicious code
				$firstArray = [0];
				
				
				while($row = mysqli_fetch_assoc($result)){
				
					$unit = $row['unit'];				
		//looping through and adding up the quanity values
		
					foreach($nameArray as $name){
    			if($name == $row['name']){
    				${"quanity_{$name}"} += $row['quanity'];
    				${"unit_{$name}"} = $row['unit'];
    				
    				    				 
   				 } // END if($name == $row['name'])
				} // END foreach($nameArray as $name){ 
				
				
				
				// unset the first element of the array
				unset($firstArray[0]);
				
				// Set New array to create new list
				array_push($firstArray, $row['name']);
				
						
			
		 } // END while($row = mysqli_fetch_assoc($result))
		}// END if($result= mysqli_query($con, $ingredientList)) ?>
		
		
		<!-- second loop through -->
		
			<? 
				$results = array_unique($firstArray);
		
				
			foreach($results as $ingName ){ 
			
			// assigning a new value for the units  *** research a better way to do this- lots of repeating code ***
			
    				
    				switch($ingName){
    				
    					case ${"unit_{$ingName}"} =='unit':
    						${"unit_{$ingName}"} = " ";
     					break;
     					
     					case ${"unit_{$ingName}"} =="cup":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;
     					
     					case ${"unit_{$ingName}"} =="tablespoon":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;   
     					
     					case ${"unit_{$ingName}"} =="teaspoon":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break; 
     					
     					case ${"unit_{$ingName}"} =="package":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;	
     					
     					case ${"unit_{$ingName}"} =="can":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;	
     					
     					case ${"unit_{$ingName}"} =="bag":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;	
     					
     					case ${"unit_{$ingName}"} =="box":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;	
     					
     					case ${"unit_{$ingName}"} =="gallon":
     						if(${"quanity_{$ingName}"} >1){
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"}."s";}
    						else{
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    						}
     					break;
    					
    				 	default:
    						${"unit_{$ingName}"} = ${"unit_{$ingName}"};
    					break;
    					
    				} //END switch ($row['unit'])
    				
    			

			
			
			
			?>		
				
		<input type="checkbox" value="<?=$ingName?>"><?=$ingName?>, <?=${"quanity_{$ingName}"}?> <?=${"unit_{$ingName}"}?> </input><br/>
		
			<? } // END foreach($firstArray as $ingNames )?>
		
		
		
		
					<button>Print Checked not hooked up</button>
	

	<h2>This Will Be Hidden Later</h2>
	<p>This is the ingredient name array- will use to compare in future switch statement </p>
		
<?	foreach($nameArray as $name){
    echo $name.'<br>';
    } // END foreach($nameArray as $name){ 
	
?>
		
			
	<? } // END if($_POST['recipe_id'])  {  ?>		
			

</div>
<hr>

<!-- Hidden Until Ready to Add More Functionality 
<div class ="new-meal">
	<h1>This will come later</h1>
	<h2>Functionality Not Plugged In</h2>
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



</div> -->
</body>
</html>