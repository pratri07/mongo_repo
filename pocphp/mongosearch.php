<?php

    $m=new MongoClient();
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'errorinfo');

    $cursor = $collection->find();
    foreach ($cursor as $doc){
        var_dump($doc);
    }


/* Working code */
  echo "<h2> searching </h2>";

  $sweetquery = array('error' => $_GET["msearch"]);

  $match_results = $collection->find($sweetquery);
  foreach ($match_results as $doc1){
      var_dump($doc1);
  }

  echo "<h2> Table printing </h2>";
  $data  = "<table style='border:1px solid red;";
  $data .= "border-collapse:collapse' border='1px'>";
  $data .= "<thead>";
  $data .= "<tr>";
  $data .= "<th>Database Name</th>";
  $data .= "<th>Error</th>";
  $data .= "<th>Solution</th>";
  $data .= "<th>Vendor Case ID</th>";
  $data .= "</tr>";
  $data .= "</thead>";
  $data .= "<tbody>";


foreach($cursor as $document){
  $data .= "<tr>";
  $data .= "<td>" . $document["dbname"]."</td>";
  $data .= "<td>" . $document["error"]."</td>";
  $data .= "<td>" . $document["Solution"]."</td>";
  $data .= "<td>" . $document["Vendorcase"]."</td>";
  $data .= "</tr>";
}
  $data .= "</tbody>";
  $data .= "</table>";
  echo $data;

  /* Working code */
    echo "<h2> searching and printing in Table format </h2>";
    $data  = "<table style='border:1px solid red;";
    $data .= "border-collapse:collapse' border='1px'>";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>Database Name</th>";
    $data .= "<th>Error</th>";
    $data .= "<th>Solution</th>";
    $data .= "<th>Vendor Case ID</th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";
    $sweetquery = array('error' => $_GET["msearch"]);

$match_results = $collection->find($sweetquery);
foreach($match_results as $document){
  $data .= "<tr>";
  $data .= "<td>" . $document["dbname"]."</td>";
  $data .= "<td>" . $document["error"]."</td>";
  $data .= "<td>" . $document["Solution"]."</td>";
  $data .= "<td>" . $document["Vendorcase"]."</td>";
  $data .= "</tr>";
}
  $data .= "</tbody>";
  $data .= "</table>";
  echo $data;
?>
