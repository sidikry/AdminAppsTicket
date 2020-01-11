<?php
    include 'includes/user_token.php';
    include 'includes/firebase.php';

    //Dapatkan username dari URL
    $username_url = $_GET['username'];

    //Data Wisata User
    $path_wisata_user_fb = 'MyTickets/'.$username_url.'/wisata';
    $checkdata_wisata = $database->getReference($path_wisata_user_fb)->getValue();

    //Data Detail User
    $path_user_details = 'Users/'.$username_url;
    $checkdata_user_details = $database->getReference($path_user_details)->getValue();


    //Data Admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    //Cetak Data Admin
    $nama_admin_f = $checkdata['nama_admin'];
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
    <title>Sales Detail - TiketSaya</title>
</head>

<body>

    <div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
            <div class="emblem">
                <img src="image/emblem_app.png" height="29" alt="">
            </div>
            <div class="menus">

                <div class="item-menu inactive">
                    <a href="dashboard.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
                    <a href="ticket.php">
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
                    <a href="users.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-user"></i>
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
                    <a href="includes/user_destroy.php">
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
                    <li>
                        My Dashboard
                    </li>
                </a>
                <a href="sales.php">
                    <li class="active-link">
                        Ticket Sales
                    </li>
                </a>
                <a href="wisata.php">
                    <li>
                        Manage Wisata
                    </li>
                </a>
                <a href="users.php">
                    <li>
                        Manage Users
                    </li>
                </a>
                <a href="customer.php">
                    <li>
                        Customers <span class="badge badge-primary badge-tiketsaya">96</span>
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
                    Details
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class=" breadcrumb">
                        <li class="breadcrumb-item"><a href="sales.php">Sales</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_user_details['nama_lengkap']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row report-group">
            <div class="col-md-12">
                <div class="item-big-report col-md-12">

                    <div class="row">
                        <div class="col-5">
                            <div class="wrap-user-picture-circle">
                                <img class="primary-user-picture-circle" src="image/riska_photo.jpg" alt="">
                            </div>
                            <div class="user-info" style="margin-top: 15px;">
                                <p class="title">
                                    <?php echo $checkdata_user_details['nama_lengkap']; ?></li>
                                </p>
                                <br>
                                <p class="sub-title">
                                    <?php echo $checkdata_user_details['bio']; ?></li>
                                </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <p class="total-balance">
                                Total Balance : <span class="value-balance">US$ <?php echo $checkdata_user_details['userbalance']; ?></li></span>
                            </p>
                        </div>
                    </div>

                    <div class="row user-wisata-places">
                        <div class="col-md-12">
                            <p class="title">
                            <?php echo $checkdata_user_details['nama_lengkap']; ?>'s Wisata
                            </p>
                        </div>

                        <?php

                            foreach($checkdata_wisata as $checkdata_wisata_final => $checkdata_wisata_final_value) :                               
                                // data lengkap wisata
                                $path_wisata_details = 'Wisata/'.$checkdata_wisata_final_value['nama_wisata'];
                                $checkdata_wisata_details = $database->getReference($path_wisata_details)->getValue();

                                foreach($checkdata_wisata_details as $checkdata_wisata_details_final => $checkdata_wisata_details_value)
                                {}
                            ?>

                        <div class="item-wisata-places col-md-4">
                            <img src="image/candi.png" alt="">
                            <p class="title-info-wisata-places">
                                <?php echo $checkdata_wisata_details['nama_wisata']; ?>
                            </p>
                            <p class="subtitle-info-wisata-places">
                                <?php echo $checkdata_wisata_details['lokasi']; ?>
                            </p>
                        </div>
                            <?php endforeach; ?>  
                    </div>
                    

                </div>
            </div>

        </div>


    </div>

    </div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>

</html>