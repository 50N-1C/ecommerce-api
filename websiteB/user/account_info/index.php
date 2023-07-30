<?php 
session_start();
// if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  
// }else {
//   exit();
// }

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        * {
          text-align: center;
        }
      
        ul {
          margin: 0 auto;
          text-align: center;
          padding: 0;
          width: 200px;
          background-color: #f1f1f1;
          border: 1px solid #555;
        }
      
        li a {
          display: block;
          color: #000;
          padding: 8px 16px;
          text-decoration: none;
        }
      
        li {
          text-align: center;
          border-bottom: 1px solid #555;
        }
      
        li:last-child {
          border-bottom: none;
        }
      
        li a:hover {
          background-color: #555;
          color: white;
        }
      </style>
</head>
<body>


    <h2>Choose Operation</h2>
    <ul>
        <li><a href="viewAccount.php">View Account Info</a></li>
        <li><a href="updateAccount.php">Update Account Info</a></li>
        <li><a href="changePassword.php">Change Password</a></li>
    </ul>
    
</body>
</html>