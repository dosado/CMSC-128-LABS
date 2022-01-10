<?php

include 'DBConnector.php';

$name = $_GET["name"];
$age = $_GET["age"];
$salary = $_GET["salary"];
$HireDate = $_GET["HireDate"];
$DeptID = $_GET["department"];
$Percent_Time = $_GET["percent_pime"];

$sql = "INSERT INTO employee (EmpID, EmpName, Age, Salary, HireDate)
        VALUES (NULL, '$name', '$age', '$salary', '$HireDate');";
        
$result = $conn -> query($sql);

if ($conn -> query($sql) == TRUE){
    $last_id = $conn -> insert_id;


    $query = "INSERT INTO work ( EmpID, DeptID,  Percent_Time)
            VALUES ('$last_id', '$DeptID', '$Percent_Time');";
    $result = $conn -> query($query);

    header("Location: employees.php");
}
else{
    echo "Error: ".$sql ."<br/>".$conn -> error;
}

$conn -> close();
?>