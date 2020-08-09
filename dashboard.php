<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Dashboard</title>

<style>
    table,th,td{
        border:1px solid black;
        border-collapse: collapse;
    }
    th,td{
        padding: 5px;
        text-align:center;
    }
</style>
</head>
<body style="background-color:<?=$_SESSION['color'];?>">
    <table>
        <tr>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>color</th>
            <th>gender</th>
            <th>Department</th>
        </tr>
        <tr>
            <td><?= $_SESSION['first_name']; ?></td>
            <td><?= $_SESSION['second_name']; ?></td>
            <td><?= $_SESSION['email']; ?></td>
            <td><?= $_SESSION['date']; ?></td>
            <td><?= $_SESSION['color']; ?></td>
            <td><?= $_SESSION['gender'][0]; ?></td>
            <td><?= $_SESSION['department']; ?></td>
    
        </tr>
    </table>
</body>
</html>