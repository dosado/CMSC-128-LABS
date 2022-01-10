<?php

include 'DBConnector.php';


// Used $_GET to cater the a href tag in html part of the DPSM,Dummy,and Ghost phpfiles.
$del_EmpID = $_GET['EmpID'];

$sql = "DELETE FROM employee WHERE EmpID = '$del_EmpID';";
$del_result = $conn-> query($sql);

//To make sure a query is either successful or unsuccessful before redirecting back to employees.php
if($conn -> query($sql) == TRUE){
    header("Location:employees.php");
    exit;
}
//Display Error for easy debugging
else{
    echo "Error: ".$sql."<br/>".$conn -> error;
}

$conn->close()

?>

