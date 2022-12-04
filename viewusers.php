<?php
    session_start();

    require 'config.php';

    $stmt = $conn->prepare("SELECT * FROM users");
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
                    <h2 class="iTitle">Users</h2>
                    <button id="new_user_create" class="iTitle">Add User</button>
                </div>
                
                <div>
                    <table>
                        <thead id="table-header">
                            <tr>
                                <th id="title">Name</th>
                                <th id="type">Email</th>
                                <th id="company">Role</th>
                                <th id="assigned-to">Created</th>
                                
                            </tr>
                            </thead>

                        <!-- Dynamically insert rows here -->
                        <tbody id="issues-table-body">
                            <div id="results">
                                <?php foreach($results as $result){ ?>
                                    <?php if($result["id"] != $_SESSION["ID"]){ ?>
                                  
                                    <tr>
                                        <td><strong><?php echo $result['firstname'].' ';?><?php echo $result['lastname'];?></strong></td>
                                        <td> <?php echo $result['email'];?></td>
                                        <td> <?php echo $result['role'];?></td>
                                        <td> <?php echo $result['created_at'];?></td>
                                    </tr>
                                    <?php } ?>
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