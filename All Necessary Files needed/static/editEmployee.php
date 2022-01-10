<?php

include 'DBConnector.php'; 

// Conditional to check when Submit button is clicked and to contain the block of code.
if (isset($_GET['E  dit'])){  
    //Then takes the values that was filled up.
    $EmpID = $_GET["EmpID"]?? '';
    $name = $_GET["name"]?? '';
    $age = $_GET["age"]?? '';
    $salary = $_GET["salary"]?? ''; 
    $Percent_Time = $_GET["percent_time"]?? '';
    $HireDate = $_GET["date-hired"]?? '';
    
// Query in SQL DB to update selected tuple/row
    $sql = "UPDATE employee SET EmpName = '$name', Age = '$age', Salary = '$salary', HireDate = '$HireDate' WHERE EmpID = '$EmpID';";
    $result = $conn -> query($sql);

//To make sure a query is either successful or unsuccessful before redirecting back to employees.php
    if($conn -> query($sql) == TRUE){

        header("Location:employees.php"); 
        exit;	
    }
//Display Error for easy debugging
    else {
        echo "Error: ".$sql."<br/>".$conn -> error;
    }
    $conn -> close();
}
    
?>
<!-- Copied/Modified code from employees.php -->
<html>
<style>
	body{
        font-family: Calibri,Candara,Segoe,Segoe UI,Optimize,Arial,sans-serif;
        background-image: url('stars.jpg');
        background-repeat:no-repeat;
        background-size: cover;
        color: white;
    }
    td.tlabel{
        width: 90px;
        text-align: right;
        padding-right: 10px;
    }
    .expand{
        width: 170px;
    }
</style>
<body>
        <h1>Employee Management </h1>
        <br>
        <h3>Edit/Change Employee Details:</h3>
        <form action = "editEmployee.php" method="get">
            <table>  
                <tr>
                    <td class ="tlabel">Name</td>
                    <td><input type="text" name="name" value="<?php $name ?>"></td>
                </tr>
                <tr>
                    <td class = "tlabel">Age</td>
                    <td><input type="number" name="age" value="<?php $age ?>"></td>
                </tr>      
                <tr>
                    <td class = "tlabel">Salary</td>
                    <td><input type="number" step=".01" name="salary" value="<?php $salary ?>"></td>
                </tr>      
                <tr>
                    <td class = "tlabel">Percent Time</td>
                    <td><input type="number" name="percent_time" value="<?php $pecent_time ?>"></td>
                </tr>      
                <tr>
                    <td class = "tlabel">Date Hired</td>
                    <td><input class="expand" type="date" name="date-hired" value="<?php $HireDate ?>"></td>
                </tr>      
                <tr>
                    <td class="tlabel">Designation</td>
                    <td>
                        <input type="radio" name="designation" value ="1">Manager<br>
                        <input type="radio" name="designation" value ="2">Employee<br>
                    </td>
                </tr>
                <tr>
                    <!--takes the EmpID to be used as reference of where to edit after clicking submit-->
				    <td><input type="hidden" name="EmpID" value=<?php echo $_GET['EmpID']??'';?>></td>
			    </tr>     
                <tr>
                    <td class="tlabel"></td>
                    <!--buttons to either edit or cancel-->
                    <td><input type='submit' name='Edit' ></td> 
                    <td><a href="employees.php"><button type='button'>Cancel</button></a></td>
                </tr>
            </table>
        </form>
    </body>
</html>