<?php
	include 'DBConnector.php';

	//
	$sql = "SELECT * FROM employee INNER JOIN work ON employee.EmpID = work.EmpID WHERE DeptID = 3"; //where DeptID 3 is Ghost Department
	$result = $conn -> query($sql);

	//
	$designation_sql = "SELECT * FROM department";
	$designation_result = $conn -> query($designation_sql);
	$designation_row = $designation_result -> fetch_assoc();

	if($result -> num_rows > 0){
		while($row = $result -> fetch_assoc()){

			echo "<tr>".
				"<td align='center'>".$row["EmpID"]."</td>".
				"<td align='center'>".$row["EmpName"]."</td>".
				"<td align='center'>".$row["Age"]."</td>".
				"<td align='center'>".$row["Salary"]."</td>".
				"<td align='center'>".$row["HireDate"]."</td>";
			if($designation_row["MgrEmpID"] == $row["EmpID"])
			{
				echo "<td align='center'> Manager </td>";
			} else
			{
				echo "<td align='center'> Employee </td>";
			}
			echo 	"<td align='center'>".
						"<a href='deleteEmployee.php?EmpID=".$row['EmpID']."'>".
						"<button type='button'>Delete</button>".
					"</form>".
					"<form action='editEmployee.php' method='post'>".
						"<button type='button'>Edit</button>".
					"</form>".
				"</td>";
		}
	}else{
		echo "<tr>".
				"<td align='center'>"."--"."</td>".
				"<td align='center'>"."--"."</td>".
				"<td align='center'>"."--"."</td>".
				"<td align='center'>"."--"."</td>".
				"<td align='center'>"."--"."</td>".
			"</tr>";
	}
	$conn -> close();
?>