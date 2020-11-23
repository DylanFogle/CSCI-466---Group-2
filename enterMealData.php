<?php
  // You must implement a page that allows the user to enter the foods/drinks they have consumed, and
  // in what quantities (tracking page). This page must allow the amount consumed to be specified in any
  // relevant type of unit, and the rest of your app should be able to handle those conversions.

  echo "<br />Entering Meal Data!<br />";
  echo "<form method=POST>";
		echo "Input food/drink name here<input type=text name=dietName><br />";
		echo "Input food/drink amount here<input type=text name=dietAmount>";
    echo "<select name=dietMeasurement>";
      foreach(MEASUREMENT as $dietM){
        echo "<option value=".$dietM.">".$dietM."<option/>"; 
      }
    echo "<select/><br />";
    // Either calories will be entered by user or calculated by the database.
		echo "Input food/drink calories here<input type=text name=dietCalories><br />";
		echo "<input type=submit value='Submit to add meal!'/>";
	echo "</form>";
?>
