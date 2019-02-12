<?php
/**
 * Created by PhpStorm.
 * User: wuvyk
 * Date: 2/11/2019
 * Time: 8:00 PM
 */
//connect to DB
try{
    //instantiate a database object
    $dbh = new PDO("mysql:dbname=nalexand_grc",
    "nalexand", "@lexander1");
    echo 'connected to database!';
}
catch(PDOException $e)
{
    echo $e->getMessage();
}