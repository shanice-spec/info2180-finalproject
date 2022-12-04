<?php
    session_start();

    require 'config.php';

    $stmt = $conn->prepare("SELECT * FROM contacts");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <header>
        <ul>
            <li><img src="media\35fc8ef6-8194-4482-9ea1-ef8a261d84fe.jpeg" alt="dolphin" /></li>
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
                    <img src="media/person_add-24px.svg" alt="add-user"/>New Contact
                </li>
            <?php if($_SESSION['sessionID'] == "admin@project2.compassword123"){ ?>
                
                <li class="sidebar-item" id="user">
                    <img src="media/add_circle-24px.svg" alt="view-users"/>Users
                </li>
            <?php } ?>
                
                <li class="sidebar-item" id="logout">
                    <img src="media/power_settings_new-24px.svg" alt="logout"/>Logout
                </li>
            </ul>
        </div>
    </aside>
    <!-- End of sidebar -->

    <div id="container">
        <main>
            <div class="inner">
                <div>
                    <h2 class="iTitle">Contacts</h2>
                    <button id="new_contact_create" class="iTitle">Create New Contact</button>
                </div>
                <div class="filter-inner">
                    <h5 class="filter">Filter by: </h5>    
                    <button id="all-filter" class="filter active">ALL</button>
                    <button id="support-filter" class="filter">Support</button>
                    <button id="sales-filter" class="filter">Sales Leads</button>
                    <button id="assigned-filter" class="filter">Assigned to me</button>

                </div>
                <div>
                    <table>
                        <thead id="table-header">
                            <tr>
                                <th id="title">Name</th>
                                <th id="type">Email</th>
                                <th id="company">Company</th>
                                <th id="assigned-to">Type</th>
                                <th id="vl"></th>
                            </tr>
                            </thead>

                        <!-- Dynamically insert rows here -->
                        <tbody id="contacts-table-body">
                            <div id="results">
                                <?php foreach($results as $result){ ?>

                                <?php if($result["type"]=="Support" && $result["assigned_to"] == $_SESSION['ID']){ ?>
                                    <tr class="all Support assigned">
                                <?php } elseif($result["type"]=="Sales Leads" && $result["assigned_to"] == $_SESSION['ID'] ){?>
                                    <tr class="all Sales-Leads assigned">
                                <?php } elseif($result["type"]=="Support"){ ?>
                                    <tr class="all Support">
                                <?php } elseif($result["type"]=="Sales Leads"){ ?>
                                    <tr class="all Sales-Leads">
                                <?php } elseif($result["assigned_to"] == $_SESSION['ID'] ){ ?>
                                    <tr class="all assigned">
                                <?php }else{ ?>
                                    <tr class="all">
                                <?php } ?>
                                        <input class="views_id" type="hidden" value="<?php echo $result['id'];?>"/>
                                        <td><?php echo $result["title"]." ";?><?php echo htmlspecialchars_decode($result["firstname"]);?><?php echo htmlspecialchars_decode($result["lastname"]);?></td>
                                        <td><?php echo $result["email"];?></td>
                                        <td> <?php echo $result["company"];?></td>
                                        <?php if($result["type"]=="Sales Leads"){?>
                                            <td id="contact-button"><button style="cursor: default;" id="sale">Sales Leads</button></td>
                                        <?php } ?>
                                        <?php if($result["type"]=="Support"){?>
                                            <td id="contact-button"><button style="cursor: default;" id="support">Support</button></td>
                                        <?php } ?>
                                        

                                        
                        
                                       
                                        
                                        <td><a class="views" >Views</a></td>
                                    </tr>
                                <?php } ?>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $.getScript("script.js");
    </script>