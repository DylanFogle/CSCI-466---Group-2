<?php
  // You must implement a page that facilitates the addition of new foods/drinks into the database.
  // This should allow any of the relevant information (calories, macros, micronutrients, etc.) to be added.

  echo "Food/Drink Database Insertion!<br />";
  echo "<form method=POST>";
		echo "Input food/drink name here - <input type=text name=newFDName><br />";
		echo "Input micronutrients per gram here - <input type=text name=newFDMicro><br />";
		echo "Input macronutrients of fats per serving here - <input type=text name=newFDFats><br />";
		echo "Input macronutrients of carbohydrates per serving here - <input type=text name=newFDCarbo><br />";
		echo "Input macronutrients of protein per serving here - <input type=text name=newFDProtein><br />";
		echo "Input the size of a serving, in grams or mL, here - <input type=text name=newFDSize><br />";
    // Can add more depending on what is needed.
		echo "<input type=submit value='Submit to add food/drink!'/>";
	echo "</form>";
  if(!empty($_POST["newFDName"]) && !empty($_POST["newFDMicro"]) && !empty($_POST["newFDFats"])
		&& !empty($_POST["newFDCarbo"]) && !empty($_POST["newFDProtein"]) && !empty($_POST["newFDSize"])){
		$newFDName = $_POST["newFDName"];
		$newFDMicro = $_POST["newFDMicro"];
		$newFDFats = $_POST["newFDFats"];
		$newFDCarbo = $_POST["newFDCarbo"];
		$newFDProtein = $_POST["newFDProtein"];
	  	$newFDSize = $_POST["newFDSize"]
		$sql = "INSERT INTO Food/Drink VALUES (:Name,:Micro,:MacFats,:MacCarbo,:MacProtein,:Size);";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array(":Name" => "$newFDName", ":Micro" => "$newFDMicro",
			 ":MacFats" => "$newFDFats", ":MacCarbo" => "$newFDCarbo", ":MacProtein" => "newFDProtein",
			 ":Size" => "$newFDSize"));
		if(!$success){
			echo "Error in query";
			die();
		}
	}
?>
