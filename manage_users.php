<?php

include 'includes/user_token.php';
    include 'includes/firebase.php';

    //Data Admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    //Cetak Data Admin
    $nama_admin_f = $checkdata['nama_admin'];

     //Dapatkan nama users dari URL
     $username_url = $_GET['username'];

    //Data Turis
    $path_turis_fb_details = 'Users/'.$username_url;
    $checkdata_turis_details = $database->getReference($path_turis_fb_details)->getValue();

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
    <title>Manage Users Details-TiketSaya</title>
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

                <div class="item-menu">
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
                    <li>
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
                    <li class="active-link">
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
                    <?php echo $checkdata_turis_details['username']; ?>
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class=" breadcrumb">
                        <li class="breadcrumb-item"><a href="wisata.php">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details Users</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row report-group">
            <div class="col-md-12">
                <div class="item-big-report col-md-12">

                    <div class="row">
                        <div class="overlay-box col-md-4">
                            <a href="#" id="open-file" class="btn btn-primary btn-third-tiketsaya">Replace</a>
                        </div>
                        <div class="thumbnail-box label-image-wisata col-md-4">
                            <p class="label-thumbnail">Photo Profile</p>
                            <img src="<?php echo $checkdata_turis_details['url_photo_profile']; ?>" class="thumbail-wisata" alt="">
                            <p class="label-thumbnail" id="custom-text">No File Choosen Yet</p>
                        </div>

                        <div class="col-md-5 offset-1">
                            <form method="POST" action="includes/data_model.php">
                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="<?php echo $checkdata_turis_details['nama_lengkap']; ?>" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nama Lengkap">
                                </div>

                                <div class="form-group content-password">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleInputPassword1">Username</label>
                                    <input disabled required type="text" name="username" value="<?php echo $checkdata_turis_details['username']; ?>" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="Username">
                                </div>

                                <div class="form-group content-password">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleInputPassword1">Password</label>
                                    <input disabled required type="text" name="password" value="<?php echo $checkdata_turis_details['password']; ?>" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="Username">
                                </div>

                                <div class="form-group content-password">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Bio</label>
                                            <input required type="text" name="bio"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_turis_details['bio']; ?>"
                                                id="exampleInputPassword1" placeholder="Bio">
                                        </div>

                                        <div class="col-md-8">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">User Balance</label>
                                            <input required type="text" name="userbalance"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_turis_details['userbalance']; ?>"
                                                id="exampleInputPassword1" placeholder="User Balance">
                                        </div>

                                        <div class="col-md-8">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Email Address</label>
                                            <input required type="text" name="email_address"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_turis_details['email_address']; ?>"
                                                id="exampleInputPassword1" placeholder="Email">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group content-sign-in" style="margin-bottom: -40px;">
                                    <input type="file" id="image_file" hidden="hidden">
                                </div>
                                    <button name="updateUsers" type="submit" class="btn btn-primary btn-primary-tiketsaya">Update</button>
                                    <button type="reset" class="btn btn-primary btn-secondary-tiketsaya">Cancel</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>

</body>