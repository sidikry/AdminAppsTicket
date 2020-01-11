<?php
    include 'includes/user_token.php';
    include 'includes/firebase.php';

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
    <title>Add New User - TiketSaya</title>
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

                <div class="item-menu">
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
                Ngopi Yuk
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
                    <li class="active-link">
                        Customers <span class="badge badge-primary badge-tiketsaya">96</span>
                    </li>
                </a>
                <a href="setting.php">
                    <li>
                        Account Setting
                    </li>
                </a>
                <a href="#">
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
                    Add New User
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class=" breadcrumb">
                        <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Let's we add new user</li>
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
                                <img class="primary-user-picture-circle" src="image/icon_nopic.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="form-new-user row">
                        <div class="col-md-6">
                            <form method="POST" action="includes/data_model.php">
                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama
                                        User</label>
                                    <input name="username" required type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                                </div>

                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama
                                        Pengguna</label>
                                    <input name="nama_lengkap" required type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                </div>

                                <div class="form-group content-password">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputPassword1">Email
                                        Address</label>
                                    <input name="email_address" required type="email" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="email address">
                                </div>

                                <div class="form-group content-password">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleInputPassword1">Password</label>
                                    <input name="password" required type="password" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="masukan password">
                                </div>
                        </div>
                    </div>

                    <div class="form-group content-password">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="title-input-type-primary-tiketsaya" for="exampleInputPassword1">Bio
                                    ?</label>
                                <input name="bio" required type="text" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputPassword1" placeholder="Bio">
                            </div>

                            <div class="col-md-3">
                                <label class="title-input-type-primary-tiketsaya" for="exampleInputPassword1">Balance
                                    (US$)</label>
                                <input name="userbalance" required type="text" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputPassword1" placeholder="US$">
                            </div>

                        </div>
                    </div>
                    <div class="form-group content-sign-in" style="margin-bottom: -40px;">
                        <input type="file" id="image_file" hidden="hidden">
                    </div>   
                        <button name="addUser" type="submit" class="btn btn-primary btn-primary-tiketsaya">Add Now</button>
                        <a href="customer.html" class="btn btn-cancel-secondary">Cancel</a>
                    </form>
                </div>
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