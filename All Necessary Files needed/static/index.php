<!DOCTYPE html>
<html>
<style>
    body{
        font-family: Calibri,Candara, Segoe, Segoe UI,Optimize,Arial, sans-serif;
        background-image: url('stars.jpg');
        background-repeat:no-repeat;
        background-size: cover;
        color: white;
    }
    table, th, td{
        border: 2px solid silver;
    }
</style>
<body>
    <h1 style ="color: darkgrey"> This page will display the content of each table in the <i style="color: gold;"> sample</i>database.</h1>
    <p style ="color: grey;">Typing tutorial 2.0</p>
    <br>
    <h2 style="color: silver;">Department Table:</h2>
    <table style="width: 100%">
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Manager Name</th>
            <th>Budget</th>
            <th>City</th>
        </tr>
    <?php
        include 'department.php';
    ?>
    </table>

    <!-- DPSM_dept -->
    <br>
    <h2 style="color: silver;">DPSM</h2>
    <table style="width: 100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Salary</th>
            <th>HireDate</th>
            <th>Designation</th>
			<th>Actions</th>
        </tr>
    <?php
        include 'DPSM_dept.php';
    ?>
    </table>

    <!-- Dummy_dept -->
    <br>
    <h2 style="color: silver;">Dummy Department</h2>
    <table style="width: 100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Salary</th>
            <th>HireDate</th>
            <th>Designation</th>
			<th>Actions</th>
        </tr>
    <?php
        include 'Dummy_dept.php';
    ?>
    </table>

    <!-- Dummy_dept -->
    <br>
    <h2 style="color: silver;">Ghost Department</h2>
    <table style="width: 100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Salary</th>
            <th>HireDate</th>
            <th>Designation</th>
			<th>Actions</th>
        </tr>
    <?php
        include 'Ghost_dept.php';
    ?>
    </table>

</body>
</html>