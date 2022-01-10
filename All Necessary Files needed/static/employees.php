<!DOCTYPE html>
<html>
<style>
    body{
        font-family: Arial;
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
        <h1> Employee Management </h1>
        <h3>New Employee:</h3>
        <form action="addEmployee.php" method="get">
            <table>
                <tr>
                    <td class="tlabel">Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="tlabel">Age</td>
                    <td><input type="number" name="age"></td>
                </tr>
                <tr>
                    <td class="tlabel">Salary</td>
                    <td><input type="number" step=".01" name="salary"></td>
                </tr>
                <tr>
                    <td class="tlabel">Percent Time </td>
                    <td><input type="text" name="percent_time"></td>
                </tr>
                <tr>
                    <td class="tlabel">Date Hired</td>
                    <td><input class="expand" type="date" name="HireDate"></td>
                </tr>
                <tr>
                    <td class="tlabel">Department</td>
                    <td>
                        <select class="expand" name="department">
                            <option value="" disabled="">--Select Department--</option>
                            <?php
                                include 'allDepartment.php';
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="tlabel"> Designation </td>
                    <td>
                        <input type="radio" name="designation" value="1">Manager<br>
                        <input type="radio" name="designation" value="2">Employee<br>
                    </td>
                </tr>
                <tr>
                    <td class="tlabel"></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
        <h2> All Employees</h2>
        <br>
            <?php  
                include 'index.php'
            ?>
    </body>
</html>