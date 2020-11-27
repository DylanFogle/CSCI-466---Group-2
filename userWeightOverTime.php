<?php
  // A line graph of user weight over time. Can be represented just as a table.

  // We can just select all the values from the Weight table and sort by date.
  echo "<br />User weight over time!<br />";
  $resultWOT = $pdo->query("SELECT DATE,NUMERIC_WEIGHT FROM WEIGHT ORDER BY DATE;");
  $rowsWOT = $resultsWOT->fetchAll(PDO::FETCH_ASSOC);
  echo "<table border=1>";
  echo "<tr><th>Date</th><th>Weight(lbs)</th></tr>";
  foreach($rowsWOT as $row){
    echo "<tr><td>".$row["DATE"]."</td><td>".$row["NUMERIC_WEIGHT"]."</td></tr>"; 
  }
  echo "</table>";
?>
