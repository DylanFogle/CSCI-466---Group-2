<?php
  // A similar graph will be generated that shows how many calories were burnt each day of the week through workout.
  
  // Have the user enter a day, then show calories burned for the week.
  // Ex. The user inputs a Tuesday, so show the days from Sunday to Saturday.
  // This will involve calculating the week out, but the benefit is
  // great in that after that there will be a simple select statement.
  echo "<br />Showing how many calories a user burned in a week!<br />";

  echo "Please enter a date in the format YYYY-MM-DD!";
  echo "<form method=POST>";
    echo "<input type=text name=CBDate>";
    echo "<input type=submit value='Submit to see calories burned!'>";
  echo "</form>";

  if(!empty($_POST["CBDate"])){
    $CBDay = substr($_POST["CBDate"], 8, 2);
    $CBMonth = substr($_POST["CBDate"], 5, 2);
    $CBYear = substr($_POST["CBDate"], 0, 4);
    // From here we have the exact date entered.
    // Now we have to calculate the week out.
    $CBWeek = floor((4*$CBMonth)+$CBDay/7);
    // From here we can calculate the days of said week.
    // This will be easier if we restrict our year to only 2020, something to discuss.
    $CBDay0 = ;
    $CBDay1 = ;
    $CBDay2 = ;
    $CBDay3 = ;
    $CBDay4 = ;
    $CBDay5 = ;
    $CBDay6 = ;
    
    echo "<table border=1>";
    echo "<tr><th>".$CBDay0."</th><th>".$CBDay1."</th><th>".$CBDay2."</th>";
    echo "<th>".$CBDay3."</th><th>".$CBDay4."</th><th>".$CBDay5."</th><th>".$CBDay6."</th></tr>"; 
  }
?>
