<?php
include 'DBConnector.php';

$sql = "SELECT * FROM visitor";
$result = $conn -> query($sql);

if($result -> num_rows > 0 ) {
    //output data of each row
    while ($row = $result -> fetch_assoc()){

        echo "<pre/>";
        print_r($row);

        echo "EmpID: ".$row["Visitor_ID"]."<br>".
            "- Name: " .$row["Visitor_Name"];
    }
}else{
    echo "0 results";
}

$conn -> close();   //closes the Database Connection
?>