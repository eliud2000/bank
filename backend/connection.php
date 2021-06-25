<?php

    $servername = "localhost";
    $username = "eliud";
    $password = "Eliud@1";
    $db = "swiftbank";

    $conn = mysqli_connect($servername,$username,$password,$db);

    if (!$conn) {
        die("Connection Error!");
    }





?>