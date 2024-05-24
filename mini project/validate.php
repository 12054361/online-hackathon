<?php
 
include_once('connection.php');
  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $phoneno = test_input($_POST["phoneno"]);
    $stmt = $connection->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['username'] == $username) && ($user['$email'] == $email) &&
            ($user['password'] == $password) && ($user['$phoneno'] == $phoneno)) {
                header("location: adminpage.php");
        }  else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
 
