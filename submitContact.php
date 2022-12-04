<<<<<<< HEAD
<?php 
session_start();
if(isset($_SESSION['sessionID'])){
    
        require 'config.php';

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $title=htmlspecialchars(filter_input(INPUT_GET,'title',FILTER_SANITIZE_STRING));
        $fname = htmlspecialchars(filter_input(INPUT_GET,'fname',FILTER_SANITIZE_STRING));
        $lname = htmlspecialchars(filter_input(INPUT_GET,'lname',FILTER_SANITIZE_STRING));
        $email = htmlspecialchars(filter_input(INPUT_GET,'email',FILTER_SANITIZE_STRING));
        $telephone = htmlspecialchars(filter_input(INPUT_GET,'telephone',FILTER_SANITIZE_STRING));
        $company = htmlspecialchars(filter_input(INPUT_GET,'company',FILTER_SANITIZE_STRING));
        $type = htmlspecialchars(filter_input(INPUT_GET,'type',FILTER_SANITIZE_STRING));
        $assigned_to = htmlspecialchars(filter_input(INPUT_GET,'user',FILTER_SANITIZE_STRING));
        $createdby = $_SESSION['ID'];
        
        $stmt = $conn->prepare("INSERT INTO contacts (title,firstname,lastname,email,telephone,company,type,assigned_to,created_by,created,updated) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$title,$fname,$lname,$email,$telephone,$company,$type,$assigned_to,$createdby,date("Y-m-d h:i:s"),date("Y-m-d h:i:s")]);
        
        echo "alert('A new contact was successfully created');";    
   
} else {
    die();
}

=======
<?php 
session_start();
if(isset($_SESSION['sessionID'])){
    if($_SESSION['sessionID'] == "admin@project2.compassword123") {
        require 'config.php';

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        $fname = htmlspecialchars(filter_input(INPUT_GET,'fname',FILTER_SANITIZE_STRING));
        $lname = htmlspecialchars(filter_input(INPUT_GET,'lname',FILTER_SANITIZE_STRING));
        $email = htmlspecialchars(filter_input(INPUT_GET,'email',FILTER_SANITIZE_STRING));
        $telephone = htmlspecialchars(filter_input(INPUT_GET,'telephone',FILTER_SANITIZE_STRING));
        $company = htmlspecialchars(filter_input(INPUT_GET,'company',FILTER_SANITIZE_STRING));
        $type = htmlspecialchars(filter_input(INPUT_GET,'type',FILTER_SANITIZE_STRING));
        $assigned_to = htmlspecialchars(filter_input(INPUT_GET,'user',FILTER_SANITIZE_STRING));
        
        
        $stmt = $conn->prepare("INSERT INTO contacts (firstname,lastname,email,telephone,company,type,assigned_to,created_by,created,updated) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname,$lname,$email,$telephone,$company,$type,$assigned_to,date("Y-m-d h:i:s")]);
        
        echo "alert('A new contact was successfully created');";    
    } else{
        die();
    }
} else {
    die();
}

>>>>>>> 95601e190a18d10055aa29da5a113cb5f1403fa8
?>