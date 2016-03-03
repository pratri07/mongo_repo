<?php

    $m=new MongoClient();
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'errorinfo');

    $person = array( "dbname" => $_POST["dname"],"error" => $_POST["edesc"],"Solution" => $_POST["solu"],"Vendorcase" => $_POST["vendor"] );
    var_dump($person);
    $collection->insert($person);
?>
