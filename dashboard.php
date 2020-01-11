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

    //Data Wisata
    $path_wisata_fb = 'Wisata';
    $checkdata_wisata = $database->getReference($path_wisata_fb)->getValue();

    //Data Sales
    $path_sales_fb = 'MyTickets';
    $checkdata_sales = $database->getReference($path_sales_fb)->getValue();

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
    <title>Dashboard-TiketSaya</title>
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
                <a href="setting.php">
                    <li>
                        Account Setting
                    </li>
                </a>
                <a href="users.php">
                    <li>
                        Manage Users
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
                    My Dashboard
                </p>
                <p class="sub-header">
                    Latest report updated this week and on
                </p>

            </div>
        </div>
        <div class="row report-group">
            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="image/icon_total_pengguna.png" alt="">
                            <p class="title-item">
                                Tourist
                            </p>
                            <p class="subtitle-item">
                                TICKET BEING SOLD
                            </p>
                            <p class="value-item">
                                <?php echo count($checkdata_turis);  ?>
                            </p>
                            <p class="desc-item">
                                Arround The Earth
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="image/icon_total_sales.png" alt="">
                            <p class="title-item">
                                SALES
                            </p>
                            <p class="subtitle-item">
                                TICKET BEING SOLD
                            </p>
                            <p class="value-item">
                            <?php echo count ($checkdata_sales);  ?>
                            </p>
                            <p class="desc-item">
                                Arround The World
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="image/icon_total_wisata.png" alt="">
                            <p class="title-item">
                                WISATA
                            </p>
                            <p class="subtitle-item">
                                PLACE THAT AVAILABLE
                            </p>
                            <p class="value-item">
                                <?php echo count($checkdata_wisata);  ?>
                            </p>
                            <p class="desc-item">
                                Arround The Indonesia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row report-group">
            <div class="col-md-6">
                <div class="item-big-report col-md-12">
                    <p class="title">
                        <span class="title-blue">NEWEST</span> USERS
                    </p>
                    <p class="sub-title">
                        USER THAT SIGN UP NOWADAYS
                    </p>
                    <a href="#" class="btn btn-small btn-primary btn-primary-tiketsaya">See More</a>
                    <div class="divider-line"></div>

                    <?php 
                        foreach($checkdata_turis as $checkdata_turis_value){

                        
                    ?>

                    <div class="user-item">
                        <div class="user-picture">
                            <img src="<?php echo $checkdata_turis_value['url_photo_profile']; ?>" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                                <?php echo $checkdata_turis_value['nama_lengkap']; ?>
                            </p>
                            <br>
                            <p class="sub-title">
                            <?php echo $checkdata_turis_value['bio']; ?>
                            </p>
                        </div>
                        <a href="#" class="btn btn-small-border btn-primary">View Profile</a>
                    </div>

                        <?php } ?>

                </div>
            </div>

            <div class="col-md-6">
                <div class="item-big-report col-md-12">
                    <p class="title">
                        <span class="title-blue">TICKETS</span> SOLD
                    </p>
                    <p class="sub-title">
                        USERS JUST BOUGHT TICKET
                    </p>
                    <a href="#" class="btn btn-small btn-primary btn-primary-tiketsaya">See More</a>
                    <div class="divider-line"></div>

                    <?php  
                        foreach($checkdata_sales as $data_sales_final => $data_print_sales){

                            $path_data_based_on_username = 'Users/'.$data_print_sales['username'];
                            $print_data_user_profile = $database->getReference($path_data_based_on_username)->getValue();

                            foreach($print_data_user_profile as $print_data_user_profile_final => $value_data_user_profile)
                            {}
                                
                            
                    ?>
                    <div class="user-item">
                        <div class="user-picture">
                            <img src="<?php echo $checkdata_turis_value['url_photo_profile']; ?>" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                                <?php echo $print_data_user_profile['nama_lengkap']; ?>
                            </p>
                            <br>
                            <p class="sub-title">
                            <?php echo $print_data_user_profile['bio']; ?>
                            </p>
                        </div>
                        <a href="#" class="btn btn-small-border btn-primary">View Profile</a>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>


    </div>

    </div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>

</html>