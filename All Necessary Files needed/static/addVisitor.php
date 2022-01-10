<?php

include 'DBConnector.php';

$name = $_POST["visname"];


$sql = "INSERT INTO visitor (Visitor_ID, Visitor_Name)
        VALUES (NULL, '$name');";
        
$result = $conn -> query($sql);

if ($conn -> query($sql) == TRUE){
    $last_id = $conn -> insert_id;

    echo "ORAYTEEEEEEE";
    $query = "INSERT INTO visitor (Visitor_ID, Visitor_Name)
            VALUES ('$last_id', '$name');";
    $result = $conn -> query($query);

    header("Location: 2ndpagesprint.html");
}
else{
    echo "Error: ".$sql ."<br/>".$conn -> error;
}

$conn -> close();
?>