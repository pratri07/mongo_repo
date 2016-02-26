<?php

    $m=new MongoClient();
    echo "<h2> connect to db success Testing </h2>";
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'errorinfo');

    $cursor = $collection->find();
    foreach ($cursor as $doc){
        var_dump($doc);
    }

echo "<h2> database mydb selected and printing in my format </h2>";

/* Getting data into cursor from collection */
foreach($cursor as $c)
    {
        echo $c["dbname"] . "     " . $c["Solution"];
        echo "<br>";
    }

/* Getting data in Array */
    $arr = array();
    foreach($cursor as $c)
        {
            $temp = array("DB name" => $c["dbname"],"Solution" => $c["Solution"]);
            array_push($arr, $temp);
        }

        echo "<h2> Priting in JSON format </h2>";
        echo json_encode($arr);


/* Working code */
  echo "<h2> searching </h2>";

  $sweetquery = array('error' => $_GET["msearch"]);

  $match_results = $collection->find($sweetquery);
  foreach ($match_results as $doc1){
      var_dump($doc1);
  }

  echo "<h2> priting in formatted </h2>";
  foreach($match_results as $d)
      {
          echo $d["dbname"] . "     " . $d["Solution"];
          echo "<br>";
      }
?>
