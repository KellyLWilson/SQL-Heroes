<?php
require "connection.php";
require "header.php";

$name = $_POST["name"];
$about = $_POST["about"];
$bio = $_POST["biography"];
$power = $_POST["ability"];
$pic = $_POST["image"];

$sql = "INSERT INTO heroes (name, about_me, biography, image_url) VALUES ('$name', '$about', '$bio', '$pic')";
$result = $conn->query($sql);

if ($result === TRUE) {
    $last_id = $conn->insert_id;
    echo $last_id;
}

?>

<?php
require "footer.php";
$conn->close();

header("Location: /hero.php?id=" . $last_id);

//insert into 

?>