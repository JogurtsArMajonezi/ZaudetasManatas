<?php
$l = $_POST["login"];
$p = $_POST["password"];

include("cfg.php");
$result = $mysqli->query("SELECT * FROM users WHERE login = '$l' and password ='$p'");
if (mysqli_num_rows($result) > 0){
    echo "All good!";
}
else{
    echo "Try again!";
}


?>