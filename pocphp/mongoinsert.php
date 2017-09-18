<?php

    $m = new MongoClient("mongodb://mongodb", array("username" => user8MT, "password" => TM8NoRUhuIkuaC5T));
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'errorinfo');

    $person = array( "dbname" => $_POST["dname"],"error" => $_POST["edesc"],"Solution" => $_POST["solu"],"Vendorcase" => $_POST["vendor"] );
    var_dump($person);
    $collection->insert($person);
?>
