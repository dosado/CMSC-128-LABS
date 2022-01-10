<?php
include 'DBConnector.php';

$sql = "SELECT * FROM department";
$result = $conn -> query($sql);

if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
        echo "<option value='".$row['DeptID']."'>".$row['DeptName']."</option>";
    }
} else{
    echo "0 results";
}

$conn -> close();
?>
