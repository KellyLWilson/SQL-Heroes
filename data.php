<?php
require "connection.php";
$id= $_GET["id"];

$method= $_GET["method"];
    if ($method== "makeEnemy") {
        makeEnemy($id);
    }
    elseif ($method== "makeFriend") {
        makeFriend($id);
    }
    elseif ($method== "newEnemy") {
        newEnemy($id, $type_id);
    }
    elseif ($method== "addSuper") {
        addSuper($id);
    }

$test = $_GET['id'];
//var_dump ($test);

$kill = "DELETE FROM heroes WHERE id=".$test;
if ($conn->query($kill) === TRUE) {
    echo "Record deleted successfully";
    header("Location: /index.php?id=");
} else {
    echo "Error deleting record: " . $conn->error;
    header("Location: /index.php?id=");
}

function makeEnemy($id) {
    $sql = "UPDATE relationships SET type_id = '2' WHERE rel_id = $id";
    $result = $GLOBALS["conn"]->query($sql);
}

function newEnemy($id, $type_id) {
    $sql = "INSERT INTO relationships (rel_id, hero1_id, hero2_id, type_id) VALUES ($rel_id, $hero_id, $hero2_id, $type_id)"; 
    $result = $GLOBALS["conn"]->query($sql);
}

function makeFriend($id) {
    $sql = "UPDATE relationships SET type_id = '1' WHERE rel_id = $id";
    $result = $GLOBALS["conn"]->query($sql);
}

$conn->close();


?>

-- INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
-- VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway');
-- VALUES ('

