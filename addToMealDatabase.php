<?php
  // You must implement a page that facilitates the addition of new foods/drinks into the database.
  // This should allow any of the relevant information (calories, macros, micronutrients, etc.) to be added.

  echo "Food/Drink Database Insertion!<br />";
  echo "<form method=POST>";
		echo "Input food/drink name here - <input type=text name=newFDName><br />";
		echo "Input micronutrients per gram here - <input type=text name=newFDMicro><br />";
		echo "Input macronutrients per serving here - <input type=text name=newFDMacro><br />";
    // Can add more depending on what is needed.
		echo "<input type=submit value='Submit to add food/drink!'/>";
	echo "</form>";
  if(!empty($_POST["newFDName"]) && !empty($_POST["newFDMicro"]) && !empty($_POST["newFDMacro"])){
		$newFDName = $_POST["newFDName"];
		$newFDMicro = $_POST["newFDMicro"];
		$newFDMacro = $_POST["newFDMacro"];
		$sql = "INSERT INTO DB_NAME VALUES (:Name,:Micro,:Macro);";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array(":Name" => "$newFDName", ":Micro" => "$newFDMicro",
			 ":Macro" => "$newFDMacro"));
		if(!$success){
			echo "Error in query";
			die();
		}
	}
?>
