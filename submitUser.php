<?php 
session_start();
if(isset($_SESSION['sessionID'])){
    if($_SESSION['sessionID'] == "admin@project2.compassword123") {
        require 'config.php';

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        $fname = htmlspecialchars(filter_input(INPUT_GET,'fname',FILTER_SANITIZE_STRING));
        $lname = htmlspecialchars(filter_input(INPUT_GET,'lname',FILTER_SANITIZE_STRING));
        $email = htmlspecialchars(filter_input(INPUT_GET,'email',FILTER_SANITIZE_STRING));
        $password = htmlspecialchars(filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING));
        $role = htmlspecialchars(filter_input(INPUT_GET,'role',FILTER_SANITIZE_STRING));
        $hash_password =  password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (firstname,lastname,email,password,role,created_at) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$fname,$lname,$email,$hash_password,$role,date("Y-m-d h:i:s")]);
        
        echo "alert('A new user was successfully created');";    
    } else{
        die();
    }
} else {
    die();
}

?>