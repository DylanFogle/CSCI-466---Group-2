<?php
  // Allow the user to search through the food database to find common foods, in order to plan their diets.
  // These same foods will be used to track their eating.

  // Allow the user to select a food/drink from the database using a drop down menu.
  // From here just display the information about the chosen item.

  echo "Search the Food/Drink Database!<br />";
  echo "<form method=POST>";
  echo "Select a food/drink from the list<select name=pickedItem>";
    $itemDataResult = $pdo->query("SELECT FROM Food/Drink;")
		$itemDataRows = $itemDataResult->fetchAll(PDO::FETCH_ASSOC);
		foreach($itemDataRows as $row){
			echo "<option value=".$row["Name"].">".$row["Name"]."</option>";	
		}
  echo "</select><br />";
  echo "<input type=submit value='Submit to see data about item!'>";
  echo "</form>";

  if(!empty($_POST["pickedItem"])){
    $itemName = $_POST["pickedItem"];
    $sql = "SELECT * FROM Food/Drink WHERE Name=:Name;";
    $prepared = $pdo->prepare($sql);
    $success = $prepared->execute(array(":Name" => "$itemName"));
		if(!$success){
			echo "Error in query";
			die();
		}
		// From here we have the food/drink, and can simply show all the data associated with it.
    $rowsItem = $prepared->(PDO::FETCH_ASSOC);  
    echo "<table border=1>";
    echo "<tr><th>Name</th><th>Vitamin A</th><th>Vitamin C</th><th>Calcium</th><th>Iron</th>";
		echo "<th>Fats</th><th>Carbohydrates</th><th>Protein</th><th>Size</th><th>Calories</th></tr>";
		echo "<tr><td>".$rowsItem["Name"]."</td><td>".$rowsItem["VitaminA"]."</td><td>".$rowsItem["VitaminC"]."</td>";
		echo "<td>".$rowsItem["Calcium"]."</td><td>".$rowsItem["Iron"]."</td><td>".$rowsItem["Fats"]."</td>";
		echo "<td>".$rowsItem["Carbohydrates"]."</td><td>".$rowsItem["Protein"]."</td><td>".$rowsItem["Size"]."</td>";
		echo "<td>".$rowsItem["Calories"]."</td></tr>";
    echo "</table>";
  }
?>
