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
    $rowsItem = $prepared->(PDO::FETCH_ASSOC);
    
    // From here we have the food/drink, and can simply show all the data associated with it.
    
    echo "<table border=1>";
    echo "<tr><th></th>"
    echo "</table>";
  }
?>
