<?php
session_start();
$conid = htmlspecialchars(filter_input(INPUT_GET,'conid',FILTER_SANITIZE_STRING)); 

require 'config.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->prepare("SELECT * FROM issues WHERE id ='$conid'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<header>
        <ul>
            <li><img src="media/bug_report-white-18dp.svg" alt="bug" /></li>
            <li>
                <h3>Dolphin_crm</h3>
            </li>
        </ul>
    </header>

    <!-- Beginning of sidebar -->
<aside>
    <div id="sidebar-items">
        <ul>
            <li class="sidebar-item" id="home">
                <img src="media/home-24px.svg" alt="home"/>Home
            </li>
            <li class="sidebar-item" id="addcontact">
                <img src="media/person_add-24px.svg" alt="add-contact"/>New Contact
            </li>
        <?php if($_SESSION['sessionID'] == "admin@project2.compassword123"){ ?>
            
            <li class="sidebar-item" id="user">
                <img src="media/add_circle-24px.svg" alt="add-issue"/>Users
            </li>
        <?php } ?>
        
            <li class="sidebar-item" id="logout">
                <img src="media/power_settings_new-24px.svg" alt="logout"/>Logout
            </li>
        </ul>
    </div>
</aside>
    <!-- End of sidebar -->
