<?php
  // You must implement a page that facilitates the addition of new foods/drinks into the database.
  // This should allow any of the relevant information (calories, macros, micronutrients, etc.) to be added.

  echo "Food/Drink Database Insertion!<br />";
  echo "<form method=POST>";
		// Micronutrients will be in milligrams, Macronutrients will be in grams.
		// We'll convert later.
		echo "Input food/drink name here - <input type=text name=newFDName><br />";
		echo "Input micronutrients of Vitamin A per milligram here - <input type=text name=newFDVitA><br />";
		echo "Input micronutrients of Vitamin C per milligram here - <input type=text name=newFDVitC><br />";
		echo "Input micronutrients of Calcium per milligram here - <input type=text name=newFDCalcium><br />";
		echo "Input micronutrients of Iron per milligram here - <input type=text name=newFDIron><br />";
		echo "Input macronutrients of fats per serving here - <input type=text name=newFDFats><br />";
		echo "Input macronutrients of carbohydrates per serving here - <input type=text name=newFDCarbo><br />";
		echo "Input macronutrients of protein per serving here - <input type=text name=newFDProtein><br />";
		echo "Input the size of a serving, in grams or mL, here - <input type=text name=newFDSize><br />";
		echo "<input type=submit value='Submit to add food/drink!'/>";
	echo "</form>";
  if(!empty($_POST["newFDName"]) && !empty($_POST["newFDVitA"]) && !empty($_POST["newFDVitC"])
     		&& !empty($_POST["newFDCalcium"]) && !empty($_POST["newFDIron"]) && !empty($_POST["newFDFats"])
		&& !empty($_POST["newFDCarbo"]) && !empty($_POST["newFDProtein"]) && !empty($_POST["newFDSize"])){
		$newFDName = $_POST["newFDName"];
		$newFDVitA = ($_POST["newFDVitA"]/1000);
	  	$newFDVitC = ($_POST["newFDVitC"]/1000);
	  	$newFDCalcium = ($_POST["newFDCalcium"]/1000);
	  	$newFDIron = ($_POST["newFDIron"]/1000);
		$newFDFats = $_POST["newFDFats"];
		$newFDCarbo = $_POST["newFDCarbo"];
		$newFDProtein = $_POST["newFDProtein"];
	  	$newFDSize = $_POST["newFDSize"]
		$sql = "INSERT INTO Food/Drink (Name,VitaminA,VitaminC,Calcium,Iron,Fats,Carbohydrates,Protein,Size) ";
		$sql2 = "VALUES (:Name,:VitA,:VitC,:Calc,:Iron,:Fats,:Carbo,:Protein,:Size);";
		$sql = $sql.$sql2
		$prepared = $pdo->prepare($sql);
	  	// All values entered are in grams.
	  	// It seems as though 1g = 1mL so we don't have to worry about that.
		$success = $prepared->execute(array(":Name" => "$newFDName", ":VitA" => "$newFDVitA",
			 ":VitC" => "$newFDVitC", ":Calc" => "$newFDCalcium", ":Iron" => "$newFDIron",
			 ":Fats" => "$newFDFats", ":Carbo" => "$newFDCarbo", ":Protein" => "newFDProtein",
			 ":Size" => "$newFDSize"));
		if(!$success){
			echo "Error in query";
			die();
		}
	}
?>
