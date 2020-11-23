<?php
  // You must implement a page that allows the user to enter the foods/drinks they have consumed, and
  // in what quantities (tracking page). This page must allow the amount consumed to be specified in any
  // relevant type of unit, and the rest of your app should be able to handle those conversions.

  echo "<br />Entering Meal Data!<br />";
  echo "<form method=POST>";
		echo "Select food/drink name here<select name=FDName>";
			$mealDataResult = $pdo->query("SELECT FROM Food/Drink;")
			$mealDataRows = $mealDataResult->fetchAll(PDO::FETCH_ASSOC);
			foreach($mealDataRows as $row){
				echo "<option value=".$row["Name"].">".$row["Name"]."</option>";	
			}
		echo "<select/><br />";
		echo "Input food/drink amount here<input type=text name=dietAmount>";
    echo "<select name=dietMeasurement>";
      foreach(MEASUREMENT as $dietM){
        echo "<option value=".$dietM.">".$dietM."</option>"; 
      }
    echo "<select/><br />";
    // Either calories will be entered by user or calculated by the database.
		echo "Input food/drink calories here<input type=text name=dietCalories><br />";
		echo "Input the date here, formatted as YYYY-MM-DD<input type=text name=dietDate><br />";
		echo "<input type=submit value='Submit to add meal!'/>";
  echo "</form>";

	if(!empty($_POST["dietName"]) && !empty($_POST["dietAmount"])
		 && !empty($_POST["dietCalories"]) && !empty($_POST["dietDate"])){
			$dietName = $_POST["dietName"];
			$dietAmount = $_POST["dietAmount"];
			$dietMeasure = $_POST["dietMeasurement"];
			$dietCalories = $_POST["dietCalories"];
			$dietDate = $_POST["dietDate"];
		
			// Somewhere between getting amount and insertion into database, convert to common measurement.
		
			$sql = "INSERT INTO Food/Drink(Name,Amount,Date,Calories) VALUES (:dietN,:dietA,:dietD,:dietC);";
			$prepared = $pdo->prepare($sql);
			$success = $prepared->execute(array(":dietN" => "$dietName", ":dietA" => "$dietAmount",
			 ":dietDate" => "$dietDate", ":dietC" => "dietCalories"));
			if(!$success){
				echo "Error in query";
				die();
			}
		}
?>
