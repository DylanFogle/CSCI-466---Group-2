<?php
  // The user will search through a list of workouts to find the one closest to the one they’re going to do,
  // in order to track the activity.

  // Essentially the same as the searchFoodDatabase.php script. Show the user the available workouts,
  // and when one is chosen, show the information on it.

  echo "Search the Workout Database!<br />";
  echo "<form method=POST>";
  echo "Select a workout from the list<select name=pickedWorkout>";
    $pickedWorkoutResult = $pdo->query("SELECT FROM WorkoutDatabase;")
		$pickedWorkoutRows = $pickedWorkoutResult->fetchAll(PDO::FETCH_ASSOC);
		foreach($pickedWorkoutRows as $row){
			echo "<option value=".$row["Name"].">".$row["Name"]."</option>";	
		}
  echo "</select><br />";
  echo "<input type=submit value='Submit to see data about workout!'>";
  echo "</form>";

  if(!empty($_POST["pickedWorkout"])){
    $pickedWorkout = $_POST["pickedWorkout"];
    $sql = "SELECT * FROM WorkoutDatabase WHERE Name=:Name;";
    $prepared = $pdo->prepare($sql);
    $success = $prepared->execute(array(":Name" => "$pickedWorkout"));
		if(!$success){
			echo "Error in query";
			die();
		}
		// From here we have the workout, and can simply show all the data associated with it.
    $rowsWorkout = $prepared->(PDO::FETCH_ASSOC);
    echo "<table border=1>";
    echo "<tr><th>Name</th><th>Type</th><th>Intensity</th><th>Calories</th></tr>";
    echo "<tr><td>".$rowsWorkout["Name"]."</td><td>".$rowsWorkout["Type"]."</td><td>".$rowsWorkout["Intensity"]."</td></tr>";
    echo "</table>";
  }
?>
