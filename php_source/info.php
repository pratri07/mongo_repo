<form method="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
<p><label>Search Error<strong>*</strong><br>
<input type="text" size="48" name="name" value="<?PHP if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>"></label></p>

<?php
    
    $m=new MongoClient();
    echo "<h2> connect to db success </h2>";
    $db=$m->mydb;
    $collection = new MongoCollection($db,'errorinfo');
    
    $cursor = $collection->find();
    foreach ($cursor as $doc){
        var_dump($doc);
    }
echo "<h2> database mydb selected </h2>";
?>