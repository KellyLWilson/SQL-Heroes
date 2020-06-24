<?php

require "connection.php";
require "header.php";


$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container-fluid">';
    echo "<h1>Super Book</h1>";
    while ($row = $result->fetch_assoc()) {
        $hero = "hero.php?id=" . $row["id"];
        $output .=
            '<div class="card" style="width: 18rem;">
            <img class="card-img-top" style="width:50px;height:100px;" src=' . $row["image_url"] . ' />
            <div class="card-body">
                        <h5 class="card-title">' . $row["name"] . '</h5>
                        <p class="card-text">' . $row["about_me"] . '</p>
                        <a href=' . $hero . ' class="btn btn-primary btn-lg btn-block">About me</a>
                        <div class="row-fluid">
                        </div>
                    </div>
                </div>';     
    }

    echo $output;
    echo '</div>';
} else {
    echo "0 results";
}
?>

</div>
<hr>
<div class="card" style="width: 18rem;">
  <div class="form">
    <h1 class="text-center">Join SuperBook</h1>
    <form action="newSuper.php" method="post">
        <div class="form-group">
            <label for="Input1"><b>Your Name</b></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
    </div>
  <div class="ability">
    <label for="exampleFormControlSelect2"><b>Do You Even Have a SuperPower?</b></label>
    <select multiple class="form-control" name="ability"[] id="ability">
    <?php
    $sql = "SELECT * FROM abilities";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='$row[id]'>$row[ability]</option>";
        }
    }
    ?>
    </select>
  </div>
  <div class="container-fluid">
  '<div class="card" style="width: 18rem;">
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><b>All About Me</b></label>
    <textarea class="form-control" name="about" id="about" rows="2"></textarea>
    <label for="exampleFormControlTextare2"><b>Tell Us About Yourself</b></label>
    <textarea class="form-control" name="biography" id="biography" rows="3"></textarea>
    </div>
    <div class="form-group">
    <label for="exampleFormControlFile1">Add Profile Picture</label>
    <input type="file" class="form-control-file" name="image" id="image">
    
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
</div>
</div>
</div>
</div>
<?php
require "footer.php";
?>





