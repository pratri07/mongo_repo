
<form action="mongosearch_test.php" method="get">
Search Error: <input type="text" name="msearch"><br>
<input type="submit">
</form>

<?php

    $m=new MongoClient();
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'errorinfo');

    $cursor = $collection->find();

/* Cursor to array conversion and search inside the array */

$curtoarry = iterator_to_array($cursor);

echo "<h2> Searching and printing in Table format </h2>";
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

$searchtext = $_GET["msearch"];

global $results;
$results = array();

foreach ($curtoarry as $document){

    if (in_array($searchtext, $document))
      {
      array_push($results,$document);
      }
}

foreach ($results as $document1) {
  # code...
  echo "<br>";
  echo "NExt for loop";
  print_r($document1);

}

/* Ends here Cursor to array conversion and search inside the array */

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


foreach($results as $document){
$data .= "<tr>";
$data .= "<td>" . $document["dbname"]."</td>";
$data .= "<td>" . $document["error"]."</td>";
if(isset($document["Solution"])){
$data .= "<td>" . $document["Solution"]."</td>";
 }
 else{
$data .= "<td>" . "Sorry No Solution Available - If you got one, please update this record"."</td>";
 }
if(isset($document["Vendorcase"])){
$data .= "<td>" . $document["Vendorcase"]."</td>";
 }
else{
  $data .= "<td>" ."No Vendor Case Raised yet - If Case raised please update this record"."</td>";
}
$data .= "</tr>";
}
$data .= "</tbody>";
$data .= "</table>";
echo $data;


?>
