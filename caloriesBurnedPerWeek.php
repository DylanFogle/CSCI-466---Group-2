<?php
  // A similar graph will be generated that shows how many calories were burnt each day of the week through workout.
  
  // Have the user enter two days that will define a week.
  // Then we simply calculate the amount of calories burned each day.
  echo "<br />Showing how many calories a user burned in a week!<br />";

  echo "<form method=POST>";
    echo "Please enter the first day of the week in the format YYYY-MM-DD!";
    echo "<input type=text name=CBFirstDate>";
    echo "Please enter the last day of the week in the format YYYY-MM-DD!";
    echo "<input type=text name=CBLastDate>";
    echo "<input type=submit value='Submit to see calories burned!'>";
  echo "</form>";

  if(!empty($_POST["CBFirstDate"]) && !empty($_POST["CBLastDate"])){
    $CBFirstDate = $_POST["CBFirstDate"];
    $CBLastDate = $_POST["CBLastDate"];
    $sql = "SELECT DISTINCT DATE FROM WORKOUT WHERE Date >= :CBFD AND DATE <= :CBLD;";
    $prepared = $pdo->prepare($sql);
    $success = $prepared->execute(array(":CBFD" => "$CBFirstDate", ":CBLD" => "$CBLastDate"));
		if(!$success){
			echo "Error in query";
			die();
		}
    $rowsDoW = $prepared->fetchAll(PDO::FETCH_ASSOC);
    // We now have every distinct day of possible workout given by the user
    $i = 0;
    foreach($rowsDoW as $row){
      $CBDay.$i = $row["DATE"];
      $i = $i + 1;
    }
    // But we need to redo the query again to get all workouts done in that time.
    $sql1 = "SELECT NAME,DURATION,DATE FROM WORKOUT WHERE Date >= :CBFD AND DATE <= :CBLD;";
    $prepared1 = $pdo->prepare($sql);
    $success1 = $prepared1->execute(array(":CBFD" => "$CBFirstDate", ":CBLD" => "$CBLastDate"));
		if(!$success1){
			echo "Error in query";
			die();
		}
    $rowsWoW = $prepared1->fetchAll(PDO::FETCH_ASSOC);
    $resultCB = $pdo->query("SELECT NAME, CALORIES_BURNED_PER_MINUTE FROM WORKOUTINFO;");
    $rowsWI = $resultCB->fetchAll(PDO::FETCH_ASSOC);
    // We now have all the workouts done by the user in the week, as well as all the workout info.
    // In order to calculate calories burned, we simply do CALORIES_BURNED_PER_MINUTE * DURATION.
    $CBDay0Amount = 0;
    $CBDay1Amount = 0;
    $CBDay2Amount = 0;
    $CBDay3Amount = 0;
    $CBDay4Amount = 0;
    $CBDay5Amount = 0;
    $CBDay6Amount = 0;
    // For each workout done by the user.
    foreach($rowsWoW as $rowWOW){
      // For each workout in the DB.
      foreach($rowsWI as $rowWI){
        // We have the same workout.
        if($rowWOW["NAME"] == $rowWI["NAME"]){
          // Now check for day.
          if($CBDay."0" == $rowWOW["DATE"]){
            $CBDay0Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
          if($CBDay."1" == $rowWOW["DATE"]){
            $CBDay1Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
          if($CBDay."2" == $rowWOW["DATE"]){
            $CBDay2Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
          if($CBDay."3" == $rowWOW["DATE"]){
            $CBDay3Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
          if($CBDay."4" == $rowWOW["DATE"]){
            $CBDay4Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
          if($CBDay."5" == $rowWOW["DATE"]){
            $CBDay5Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
          if($CBDay."6" == $rowWOW["DATE"]){
            $CBDay6Amount += $rowWOW["DURATION"] * $rowWI["CALORIES_BURNED_PER_MINUTE"];
          }
        }  
      }
    }
    
    echo "<table border=1>";
    echo "<tr><th>".$CBDay."0"."</th><th>".$CBDay."1"."</th><th>".$CBDay."2"."</th>";
    echo "<th>".$CBDay."3"."</th><th>".$CBDay."4"."</th><th>".$CBDay"5"."</th><th>".$CBDay."6"."</th></tr>";
    echo "<tr><td>".$CBDay0Amount."</td><td>".$CBDay1Amount."</td><td>".$CBDay2Amount."</td><td>".$CBDay3Amount."</td>";
    echo "<tr><td>".$CBDay4Amount."</td><td>".$CBDay5Amount."</td><td>".$CBDay6Amount."</td></tr>";
  }
?>
