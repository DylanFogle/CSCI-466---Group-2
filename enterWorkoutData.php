<?php
  // You must implement a page that allows the user to enter their workouts.

  echo "<br />Entering Workout Data!<br />";
  echo "<form method=POST>";
		echo "Select workout name here<select name=workoutName>";
			$workoutDataResult = $pdo->query("SELECT FROM Workout;")
			$worokutDataRows = $workoutDataResult->fetchAll(PDO::FETCH_ASSOC);
			foreach($workoutDataRows as $row){
				echo "<option value=".$row["Name"].">".$row["Name"]."</option>";	
			}
		echo "<select/><br />";
		echo "Input workout type here<input type=text name=workoutType><br />";
    echo "Input workout intensity here<input type=text name=workoutIntensity><br />";
    echo "Input workout duration, in minutes, here<input type=text name=workoutDuration><br />";
    // Either calories will be entered by user or calculated by the database.
		echo "Input calories burned here<input type=text name=workoutCalories><br />";
		echo "Input the date here, formatted as YYYY-MM-DD<input type=text name=workoutDate><br />";
		echo "<input type=submit value='Submit to add workout!'/>";
  echo "</form>";

	if(!empty($_POST["workoutName"]) && !empty($_POST["workoutType"]) && !empty($_POST["workoutIntensity"]) 
		&& !empty($_POST["workoutDuration"]) && !empty($_POST["workoutDate"]){
		$workoutName = $_POST["workoutName"];
		$workoutType = $_POST["workoutType"];
		$workoutIntensity = $_POST["workoutIntensity"];
		$workoutDuration = $_POST["workoutDuration"];
		$workoutDate = $_POST["workoutDate"];
		$workoutCalories = 0;
			
		// Calculate how many calories were burned given workout and duration.
		
		$sql0 = "INSERT INTO Workout(Name,Type,Intensity,Duration,Calories,Date) ";
      		$sql1 = "VALUES (:wName,:wType,:wIntensity,:wDuration,:wCalories,:wDate);";
      		$sql = $sql0.$sql;
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array(":wName" => "$workoutName", ":wType" => "$workoutType",
			":wIntensity" => "$workoutIntensity", ":wDuration" => "$workoutDuration",
       			":wCalories" => "$workoutCalories", ":wDate" => "$workoutDate"));
		if(!$success){
			echo "Error in query";
			die();
		}
	}
?>
