<?php
    include 'includes/user_token.php';
    include 'includes/firebase.php';

    //Dapatkan username dari URL
    $username_url = $_GET['username'];

    //Data Admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    //Cetak Data Admin
    $nama_admin_f = $checkdata['nama_admin'];

    //Data Detail User
    $path_user_details = 'Users/'.$username_url;
    $checkdata_user_details = $database->getReference($path_user_details)->getValue();

    
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
    <title>Profile Detail - TiketSaya</title>
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
                    <a href="users.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-user"></i>
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

    <div class="main-content-user-detail main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    <?php echo $checkdata_user_details['nama_lengkap']; ?>
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class=" breadcrumb">
                        <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="row report-group">
                    <div class="col-md-12">
                        <div class="item-big-report col-md-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="wrap-user-picture-circle">
                                        <img class="primary-user-picture-circle" src="<?php echo $checkdata_user_details['url_photo_profile']; ?>"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-new-user row">
                                <div class="col-md-10">
                                    <form method="POST" action="includes/data_model.php">
                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Nama
                                                User</label>
                                            <input disabled value="<?php echo $checkdata_user_details['username']; ?>" name="username" required type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Nama
                                                Pengguna</label>
                                            <input value="<?php echo $checkdata_user_details['nama_lengkap']; ?>" name="nama_lengkap" required type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Nama Lengkap">
                                        </div>

                                        <div class="form-group content-password">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Email
                                                Address</label>
                                            <input value="<?php echo $checkdata_user_details['email_address']; ?>" name="email_address" required type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="email address">
                                        </div>

                                        <div class="form-group content-password">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Password</label>
                                            <input value="<?php echo $checkdata_user_details['password']; ?>" name="password" required type="password"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="masukan password">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label class="title-input-type-primary-tiketsaya"
                                                        for="exampleInputPassword1">Bio
                                                        ?</label>
                                                    <input value="<?php echo $checkdata_user_details['bio']; ?>" name="bio" required type="text"
                                                        class="form-control input-type-primary-tiketsaya"
                                                        id="exampleInputPassword1" placeholder="Bio">
                                                </div>

                                                <div class="col-md-7">
                                                    <label class="title-input-type-primary-tiketsaya"
                                                        for="exampleInputPassword1">Balance
                                                        (US$)</label>
                                                    <input disabled value="<?php echo $checkdata_user_details['userbalance']; ?>" name="userbalance" required type="text"
                                                        class="form-control input-type-primary-tiketsaya"
                                                        id="exampleInputPassword1" placeholder="US$">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group content-sign-in" style="margin-bottom: -40px;">
                                            <input type="file" id="image_file" hidden="hidden">
                                        </div>
                                        <input type="hidden" name="nama_username_url" value="<?php echo $username_url; ?>">
                                        <button type="submit" name="updateCustomer" class="btn btn-primary btn-primary-tiketsaya">Update</button>
                                        <a href="customer.php" class="btn btn-cancel-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5">
                <div class="item-danger-zone">
                    <p class="title">
                        Danger Zone
                    </p>
                    <p class="desc">
                        You are able to delete the user and
                        once you deleted it - it is gone
                    </p>
                    <form method="POST" action="includes/data_model.php">
                    <input type="hidden" name="nama_username_url" value="<?php echo $username_url; ?>">
                    <button name="deleteUser" type="submit" data-toggle="modal" data-target="#exampleModal" class="btn-delete btn btn-primary">
                        Delete User
                    </button>
                    </form>
                </div>
            </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete <?php echo $checkdata_user_details['nama_lengkap']; ?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Hapus <?php echo $checkdata_user_details['nama_lengkap']; ?> Sekarang ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger">Delete Now</button>
                    </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="javascript/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>

</html>