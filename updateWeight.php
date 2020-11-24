<?php
  // You must implement a page that allows the user to update their weight.

  echo "Update your weight!<br />";
  echo "<form method=POST>";
    echo "Enter your current weight, in pounds, here<input type=text name=newWeight><br />";
    echo "Enter the date, in in the formation YYYY-MM-DD, here<input type=text name=weightDate><br />";
    echo "<input type=submit value='Submite to log your weight!'>";
  echo "</form>";

  if(!empty($_POST["newWeight"]) && !empty($_POST["weightDate"])){
    $newWeight = $_POST["newWeight"];
    $weightDate = $_POST["weightDate"];
    
    $sql = "INSERT INTO Weight(WeightValue,Date) VALUES (:Weight,:Date);";
    $prepared = $pdo->prepare($sql);
    $success = $prepared->execute(array(":Weight" => "$newWeight", ":Weight" => "$weightDate"));
    if(!$success){
			echo "Error in query";
			die();
		}
  }
?>
