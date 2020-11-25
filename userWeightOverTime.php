<?php
  // A line graph of user weight over time. Can be represented just as a table.

  // We can just select all the values from the Weight table and sort by date.
  echo "<br />User weight over time!<br />";
  $resultWOT = $pdo->query("SELECT Date,WeightValue FROM Weight ORDER BY Date;");
  $rowsWOT = $resultsWOT->fetchAll(PDO::FETCH_ASSOC);
  echo "<table border=1>";
  echo "<tr><th>Date</th><th>Weight(lbs)</th></tr>";
  foreach($rowsWOT as $row){
    echo "<tr><td>".$row["Date"]."</td><td>".$row["WeightValue"]."</td></tr>"; 
  }
  echo "</table>";
?>
