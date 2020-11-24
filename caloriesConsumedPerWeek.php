<?php
  // A graph will be generated of how many calories a user consumed each day of the week.

  // Same idea as the calories burned in a week. Ask the user to give a date,
  // calculate the week from that and give values for the whole week.
  echo "<br />Showing how many calories a user consumed in a week!<br />";

  echo "Please enter a date in the format YYYY-MM-DD!";
  echo "<form method=POST>";
    echo "<input type=text name=CCDate>";
    echo "<input type=submit value='Submit to see calories consumed!'>";
  echo "</form>";

  if(!empty($_POST["CCDate"])){
    $CCDay = substr($_POST["CCDate"], 8, 2);
    $CCMonth = substr($_POST["CCDate"], 5, 2);
    $CCYear = substr($_POST["CCDate"], 0, 4);
    // From here we have the exact date entered.
    // Now we have to calculate the week out.
    $CCWeek = floor((4*$CCMonth)+$CCDay/7);
    // From here we can calculate the days of said week.
    // This will be easier if we restrict our year to only 2020, something to discuss.
    $CCDay0 = ;
    $CCDay1 = ;
    $CCDay2 = ;
    $CCDay3 = ;
    $CCDay4 = ;
    $CCDay5 = ;
    $CCDay6 = ;
    
    echo "<table border=1>";
    echo "<tr><th>".$CCDay0."</th><th>".$CCDay1."</th><th>".$CCDay2."</th>";
    echo "<th>".$CCDay3."</th><th>".$CCDay4."</th><th>".$CCDay5."</th><th>".$CCDay6."</th></tr>"; 
  }
?>
