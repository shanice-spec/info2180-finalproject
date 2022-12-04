<?php
    session_start();

    //Define database credentials
    //Make connection
    require 'config.php';

    //Try catch block to check for connection errors
    try {

        if(!empty($_GET['email']) && !empty($_GET['password'])){

            $email = htmlspecialchars(filter_input(INPUT_GET,'email',FILTER_SANITIZE_EMAIL));
            $pass = htmlspecialchars(filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING));

            
            $stmt = $conn->prepare("SELECT id, password FROM users WHERE email='$email'");
            $stmt->execute();

            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $correct = false;
            foreach($results as $result){
                $hashedpassword=$result['password'];
                if(password_verify($pass,$hashedpassword)){
                    $correct = true;
                    $_SESSION['sessionID'] = $email.$pass;
                    $_SESSION['ID'] = $result['id'];
                    $_SESSION['isLogged'] = true;
                    $_SESSION['email'] = $email;
                    break;
                }
            }
            
            if($correct){
                echo "success";
            } else {
                echo "failure";
            }  
        }        
    
    } catch (PDOException $e) {
        echo "Connection Error";
    }

    //Terminate connection
    $conn = NULL;   
?>