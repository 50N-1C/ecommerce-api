<?php 



?>

<!DOCTYPE html>
<html>
    <head>
        <title>View User Details</title>
    <style>
        table, th, td {
        border:1px solid black;
        text-align: center;
        }
    </style>
    </head>
    <body>
        
        <form style="text-align:center;" action="" method="POST">
        <h1>Enter Name of User</h1>
        <input type="text" name="username" placeholder="Enter name">
        <br><br>
        <input type="submit" value="View">
        
        </form>
        <br><br>
        <table style="width:100%">
            <tr>
                <th>UserID</th>
                <th>Role</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
            </tr>
            <tr>
                <td><?php echo @$userID ; ?></td>
                <td><?php echo @$role ; ?></td>
                <td><?php echo @$username ; ?></td>
                <td><?php echo @$email ; ?></td>
                <td><?php echo @$password ; ?></td>
                <td><?php echo @$address ; ?></td>

            </tr>
            <h4 style="color: red;"><?php echo @$notFound ; ?></h4>
        </table>        
    </body>
</html>