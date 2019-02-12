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
/*$sql= "INSERT INTO pets(type,name, color)
        VALUES(:type,:name, :color)";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$type = 'wolf';
$name = 'Yuki';
$color = 'white';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";
*/

/*UPDATE
 * //Define the query
$sql= "UPDATE pets SET color = :new WHERE name = :name AND type = :type ";
//Prepare the statement
$statement = $dbh->prepare($sql);
//Bind the parameters
$new = 'brown';
$name = 'Oscar';
$type = "alpaca";
$statement->bindParam(':new', $new, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':type', $type, PDO::PARAM_STR);
//Execute
$statement->execute();
*/

/* Delete query
//Define the query
$sql= "DELETE FROM pets WHERE id = :id";
//Prepare the statement
$statement = $dbh->prepare($sql);
//Bind the parameters
$id = 1;$statement->bindParam(':id', $id, PDO::PARAM_INT);
//Execute
$statement->execute();
*/

/* SELECT query
//Define the query
$sql="SELECT * FROM pets WHERE id = :id";
//Prepare the statement
$statement = $dbh->prepare($sql);
//Bind the parameters
$id = 3;$statement->bindParam(':id', $id, PDO::PARAM_INT);
//Execute the statement
$statement->execute();
//Process the result
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['name'].", ".$row['type'].", ".$row['color'];
*/
/* SELECT query: multiple rows
//Define the query
$sql="SELECT*FROM pets";
//Prepare the statement
$statement = $dbh->prepare($sql);
//Execute the statement
$statement->execute();
//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);foreach($result as $row) {
    echo $row['name'] . ", " . $row['type'] . ", " . $row['color'];
}
*/
$sql="SELECT * FROM petOwners";
$statement = $dbh->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<table><th>id</th><th>first</th><th>last</th><th>petId</th>";
foreach($result as $row) {
    echo "<tr><td>" . $row['id'] ."</td>". ", " ."<td>" . $row['first'] ."</td>" .
        ", " ."<td>". $row['last'] ."</td>" . ", " . "<td>" .$row['petId']."</td></tr>";
}
echo "</table>";


$sql2="SELECT * FROM petOwners INNER JOIN pets ON petOwners.petId = pets.id";
$statement = $dbh->prepare($sql2);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<table><th>id</th><th>first</th><th>last</th><th>petId</th><th>name</th>";
foreach($result as $row) {
    echo "<tr><td>" . $row['id'] ."</td>". ", " ."<td>" . $row['first'] ."</td>" .
        ", " ."<td>". $row['last'] ."</td>" . ", " . "<td>" .$row['petId'] ."</td>". "<td>".$row['name']."</td></tr>";
}
echo "</table>";