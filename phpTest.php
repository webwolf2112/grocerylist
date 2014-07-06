<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

if($firstname == "supergirl"){
	echo "You rock".htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8');
}
else{ echo "Welcome to our website ".htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8')." " .htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8')."!";
	}
	
	$number = $_POST['number'];
	echo  "<br/>Your number is <b>".$number. "</b> Here it is counting down to 1: <br/>";
	while($number>=1){
		echo $number." bottles of beer on the wall . . .<br/>";
		$number --;
	}	
	echo "blast off ". $firstname ."!!";
	echo date('1, F ds Y.');
	
?> 