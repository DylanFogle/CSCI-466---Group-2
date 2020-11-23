<html><head><title>CSCI 466 - Group 2 - Second Stringers</title></head><body>
<?php
  try{
    // Depending on who's hosting the db, this information is likely to change.
		$dsn = "mysql:host=courses;dbname=TEMP";
		$pdo = new PDO($dsn,$usernameTEMP,$passwordTEMP);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo "Connection to database failed: ".$e->getMessage();
	}
  
  // Each of these files will be self contained.
  // However some variables may conflict with one another.
  // In that case try to make variable names unique to file.
  // I'll try to figure out a solution in the meantime.
  include("addToMealDatabase.php");
  include("caloriesBurnedPerWeek.php");
  include("caloriesConsumedPerWeek.php");
  include("enterMealData.php");
  include("enterWorkoutData.php");
  include("macronutrientPercentage.php");
  include("searchFoodDatabase.php");
  include("searchWorkoutDatabase.php");
  include("showFoodConsumption.php");
  include("showWorkoutUsage.php");
  include("trackMicronutrient.php");
  include("updateWeight.php");
  include("userWeightOverTime.php");
  
?>
</body></html>
