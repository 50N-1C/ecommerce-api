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


    <h2>Admin Panel</h2>
    <ul>
        
        <li><a href="#">Manage Product Catalog</a></li>
        <li><a href="#">Manage Order</a></li>
        <li><a href="manage_user/index.php">Manage Users</a></li>
        <li><a href="#">Sales Manage</a></li>
        <li><a href="#">Manage Coupons</a></li>
        <li><a href="#">Manage Shipping Option</a></li>
        <li><a href="../logout/logout.php">Logout</a></li>
    </ul>
    
</body>
</html>


