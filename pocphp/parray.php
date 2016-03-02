<?php

    $m=new MongoClient();
    $db=$m->selectDB("mydb");
    $collection = new MongoCollection($db,'atest');

    /*$cursor = $collection->find();
    foreach ($cursor as $doc){
        /*var_dump($doc);
    } */

$tengen = array( 'name' => '10gen', 'locations' => array( array( 'street no' => '100', 'street' => 'Marine Parkway', 'suite' => '175', 'city' => 'Redwood City', 'state' => 'CA', 'zip' => '94065' ), array( 'street no' => '134', 'street' => '5th Avenue', 'floor' => '3rd', 'city' => 'New York', 'state' => 'NY', 'zip' => '10011' ), ));
$db->atest->save($tengen);

$cursor = $collection->find( array('locations' => array( '$elemMatch' => array( 'state' => 'NY', 'city' => 'New York') )));

foreach ($cursor as $doc){
    var_dump($doc);
}

?>
