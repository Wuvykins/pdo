<?php
/**
 * Created by PhpStorm.
 * User: wuvyk
 * Date: 2/11/2019
 * Time: 8:00 PM
 */
//connect to DB
require '/home/nalexand/config.php';
try{
    //instantiate a database object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'connected to database!';
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
//define the query
$sql= "INSERT INTO pets(type,name, color)
        VALUES(:type,:name, :color)";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();