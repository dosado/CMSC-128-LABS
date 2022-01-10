<?php
	include 'DBConnector.php';

	$sql = "SELECT * FROM visitor ORDER BY Visitor_ID DESC LIMIT 1";
	$result = $conn -> query($sql);
	if ($result !== false && $result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
			echo 
			$row['Visitor_Name'];
	}else{
		
		echo "0 results";
	}

	$conn -> close();
?>
