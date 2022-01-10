<?php

include 'DBConnector.php';

$sql = "INSERT INTO visitor (Visitor_ID, Visitor_Name)
        VALUES (NULL, 'Visitor A')";
$result = $conn -> query($sql);

if ($conn -> query($sql) == TRUE) {
    $last_id = $conn -> insert_id;
    echo "New record created successfully. Last inserted ID is: " .$last_id. "<br/>";

    echo "Retrieving data of employee with ID ".$last_id. ".....<br/>";

    $query = "SELECT * FROM visitor WHERE Visitor_ID = '$last_id';";
    $result = $conn -> query($query);
    echo "<pre />";
    print_r($result -> fetch_assoc());

}else{
    echo "Error: ".$sql."<br/>". $conn -> error ; 
}

$conn -> close();
?>