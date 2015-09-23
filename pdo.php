<?php
/**
 * PDO - PHP Data Object
 */

//Allows any (common) sql driver to be used
//Has protection against injection built in
//OO not procedural (like mysql_query / mysqli_query)


//Init (Data Source Name (dsn), username, password)
$pdo = new PDO('mysql:host=localhost;dbname=sillyTest', 'root', '');


echo "1==============\n\n\n";

//Simple select (no params)
$query = 'SELECT * FROM testTable';
$statement = $pdo->query($query);
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}

echo "2==============\n\n\n";

//Prepared statement select - The parameters are passed into a prepared query which protects against injection
$query = 'SELECT * FROM testTable WHERE id = ?';
$statement = $pdo->prepare($query);
$statement->execute(array(1));
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}

//We can reuse the same prepared statement
$statement->execute(array(2));
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}

echo "3==============\n\n\n";

//Can use named placeholders in the same way
$query = 'SELECT * FROM testTable WHERE id = :id';
$statement = $pdo->prepare($query);
$statement->execute(array(':id' => 1));
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}

//Or bind parameters so that their current values are auto used on execute
$variable = 1;
$query = 'SELECT * FROM testTable WHERE id = :id';
$statement = $pdo->prepare($query);
$statement->bindParam(':id', $variable);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}
$variable = 2;
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}

echo "4==============\n\n\n";

//Updates and inserts are used in the same way but do not return a statement with fetch available

//There are different fetch types (ofc)

//Also exec which returns counts






