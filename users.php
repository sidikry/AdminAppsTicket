<?php
    include 'includes/user_token.php';
    include 'includes/firebase.php';

    //Data Admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    //Cetak Data Admin
    $nama_admin_f = $checkdata['nama_admin'];

    //Data Turis
    $path_turis_fb = 'Users';
    $checkdata_turis = $database->getReference($path_turis_fb)->getValue();

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Login TiketSaya Admin">
    <meta name="keywords" content="TiketSaya, Web Dashboard Tiketsaya, Login Tiketsaya">
    <meta name="author" content="Sidik Ristiawan">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/66a71038c0.js" crossorigin="anonymous"></script>
    <title>Manage Users-TiketSaya</title>
</head>

<body>
<div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
            <div class="emblem">
                <img src="image/emblem_app.png" height="29" alt="">
            </div>
            <div class="menus">

                <div class="item-menu ">
                    <a href="dashboard.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="sales.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="wisata.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="customer.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-cog"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="users.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-user"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="#">
                        <p class="icon-item-menu">
                            <i class="fas fa-power-off"></i>
                        </p>
                    </a>
                </div>

            </div>
        </div>

        <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hideAdminProfile()">
            <div class="admin-picture">
                <img src="image/anastasyangopiyuk.jepeg.jpg" alt="">
            </div>
            <p class="admin-name">
                <?php echo $nama_admin_f; ?>
            </p>
            <p class="admin-level">
                Ngopi Yuk :)
            </p>
            <ul class="admin-menus">
                <a href="dashboard.php">
                    <li class="active-link">
                        My Dashboard
                    </li>
                </a>
                <a href="sales.php">
                    <li>
                        Ticket Sales
                    </li>
                </a>
                <a href="wisata.php">
                    <li>
                        Manage Wisata
                    </li>
                </a>
                <a href="customer.php">
                    <li>
                        Customers <span class="badge badge-primary badge-tiketsaya">96</span>
                    </li>
                </a>
                <a href="users.php">
                    <li>
                        Manage Users
                    </li>
                </a>
                
                <a href="setting.php">
                    <li>
                        Account Setting
                    </li>
                </a>
               
                <a href="includes/user_destroy.php">
                    <li style="margin-top: 89px;">
                        Log Out
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    Manage Users
                </p>
                <p class="sub-header">
                    Manage Users Anda
                </p>

            </div>
        </div>
        <div class="row report-group">
            <div class="col-md-12">
                <div class="item-big-report col-md-12">
                    <table class="table-wisata table-tiketsaya table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Username</th>
                                <th scope="col">User Balance</th>
                                <th scope="col">Bio</th>
                                <th scope="col">Email Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($checkdata_turis as $checkdata_turis_final => $checkdata_turis_value){
                        ?>
                            <tr>
                            <td> <?php echo $checkdata_turis_value['nama_lengkap']; ?> </td>
                            <td> <?php echo $checkdata_turis_value['username']; ?></a> </td>
                            <td> <?php echo $checkdata_turis_value['userbalance']; ?></td>
                            <td> <?php echo $checkdata_turis_value['bio']; ?></td>
                            <td> <?php echo $checkdata_turis_value['email_address']; ?></td>
                            <td> 
                            <a href="manage_users.php?username=<?php echo $checkdata_turis_value['username']; ?>" class="btn btn-small-table btn-primary">Details</a> 
                            </td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>