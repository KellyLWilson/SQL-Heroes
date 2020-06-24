
<?php

require "connection.php";
require "header.php";

$id = $_GET["id"];

$sql = "SELECT * FROM heroes WHERE id = " . $id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="index.php" class="btn btn-primary">Back to SuperBook Home</a>';
        $killThem = "data.php?method=kill&id=". $id;
        echo '<a href='.$killThem. ' class="btn btn-primary">I am over SuperMedia Delete My Profile</a>';
        $hero = "hero.php?id=" . $row["id"];
        echo "<h3> $row[name]</h3></a>" . $row["biography"] . "<br>" . "<br>";
        echo '<img src="' . $row["image_url"] . '" alt="error" style="width:500px;height:600px;>'; 
        
    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM relationships 
INNER JOIN heroes on relationships.hero2_id=heroes.id 
WHERE (hero1_id = " . $id . ") AND (type_id = 1);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container pl-5 mt-3">';
    echo "<div class='row'>";
    echo "<div class='col'-md-4>";
    echo "<div class='col-md-4 col-sm-12 pl-5'>";
    echo "<h5>Friends</h5>";
    while ($row = $result->fetch_assoc()) {
        $output = ""; 
        echo '<div class="row">';
        echo '<li class="pl-3">' .$row["name"] . '</li>';
        echo "<a href='data.php?method=makeEnemy&hero=" . $id . "&id=" . $row['rel_id'] . "'> Make Enemy</a>";
        echo '</div>';
    }
    echo $output;
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "<p class='pl-5'>0 Friends</p>";
}
$sql = "SELECT * FROM relationships 
INNER JOIN heroes on relationships.hero2_id=heroes.id 
WHERE (hero1_id = " . $id . ") AND (type_id = 2);";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container pl-5 mt-3">';
    echo "<div class='row'>";
    echo "<div class='col-md-4 col-sm-12'>";
    echo "<h5>Enemies</h5>";
    while ($row = $result->fetch_assoc()) {
        $output .= "<li class='pl-3'>$row[name]</li><a href='data.php?method=makeFriend&hero=" . $id . "&id=" . $row['rel_id'] . "'>Create Alliance</a>";
    }

    echo $output;
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "<p class='pl-5'>No Enemies...yet</p>";
    
}

$sql = "SELECT * FROM ability_hero 
    INNER JOIN abilities on abilities.id=ability_hero.ability_id 
    INNER JOIN heroes on heroes.id=ability_hero.hero_id 
    WHERE (ability_hero.hero_id = $id)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container pl-5 mt-3 mb-5">';
    echo "<div class='row'>";
    echo "<div class='col-4'>";
    echo "<h5>Super Powers</h5>";
    while ($row = $result->fetch_assoc()) {
        $output .= "<li class='pl-3'>$row[ability]</li>";
    }

    echo $output;
    echo '<a href="index.php" class="btn btn-primary">Back to Main Page</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "0 results";
}

$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container-fluid">';
    echo "<h1>Enemies or Allies???</h1>";
    while ($row = $result->fetch_assoc()) {
        $hero = "hero.php?id=" . $row["id"];
        $output = "";
            echo '<li>  ' . $row["name"] . '    </li>';
            echo '<a href="data.php?method=makeFriend&hero=' . $id . '&id=' . $row['rel_id'] .' ">Create Alliance</a>';
            echo '<br>';
            echo '<a href="data.php?method=newEnemy&hero=' . $id . '&id=' . $row['rel_id'] .' ">Enemy Allert!!!</a>';
            echo '</li>';
}
} else {
    echo "0 results";
}

require "footer.php";
?>
