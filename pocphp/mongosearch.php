
<form action="mongosearch.php" method="get">
Search Error: <input type="text" name="msearch"><br>
<input type="submit">
</form>

<?php

    $m=new MongoClient();
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'errorinfo');

    $cursor = $collection->find();
    foreach ($cursor as $doc){
        /*var_dump($doc);*/
    }

    /* Working code */
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


    /*$sweetquery1 = array('error' => $_GET["msearch"],'dbname' => $_GET["msearch"],'Solution' => $_GET["msearch"],'Vendorcase' => $_GET["msearch"]);*/
    $searchfield = array('dbname', 'error','Solution','Vendorcase');


global $sweetquery;
$sweetquery = array();
global $sweetquery1;
$sweetquery1 = array();
global $match_results;
$match_results = array();
global $final_results;
$final_results = array();


$sweetquery1 = array('error' => $_GET["msearch"]);
$match_results = $collection->find($sweetquery1);

$searchtext = $_GET["msearch"];

foreach ($searchfield as $searchkey) {
  $sweetquery = array($searchkey => $searchtext);
  /*$sweetquery1 = array_merge($sweetquery);
  /*arrya_push($sweetquery, $searchkey => $searchtext);

  global $sweetquery = array($searchkey=> $searchtext);*/

 /*$sweetquery[$searchkey]=$searchtext;*/

 echo "<br>";

 $match_results = $collection->find($sweetquery);
 /*var_dump($sweetquery);
 var_dump ($match_results);*/
if (!empty($match_results)){
 $final_result[$searchkey] = iterator_to_array($match_results);
}

echo "<br>";
echo "<br>";
var_dump($sweetquery);
}
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($final_result);
  /*$match_results = $collection->find($sweetquery1);*/

  /*$final_result = array_merge($match_results);*/

  /*$match_results = $collection->find('error' => "ora-600");*/
foreach($final_result as $document){
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
