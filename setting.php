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
    <title>Account Setting - TiketSaya</title>
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

                <div class="item-menu">
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
                    <li class="active-link">
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
                    Settings
                </p>
                <p class="sub-header">
                    Ensure your account is healthy
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="row report-group">
                    <div class="col-md-12">
                        <div class="item-big-report col-md-12">
                            <div class="row">
                                <div class="col-4">
                                        <form encype="multipart/form-data">
                                        </form>
                                    <div class="wrap-user-picture-circle">
                                        <img class="primary-user-picture-circle" src="image/anastasyangopiyuk.jepeg.jpg"alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-new-user row">
                                <div class="col-md-10">
                                    <form method="POST" action="includes/data_model.php">
                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Nama
                                                Admin</label>
                                            <input name="nama_admin" value="<?php echo $checkdata['nama_admin']; ?>" required type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="nama admin">
                                        </div>

                                        <div class="form-group content-sign-in">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputEmail1">Username</label>
                                            <input disabled name="username" value="<?php echo $checkdata['username']; ?>" required type="text"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Nama Lengkap">
                                        </div>

                                        <div class="form-group content-password">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Email
                                                Address</label>
                                            <input name="email_admin" value="<?php echo $checkdata['email_admin']; ?>" required type="email"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="email address">
                                        </div>

                                        <div class="form-group content-password">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Password</label>
                                            <input name="password" value="<?php echo $checkdata['password']; ?>" required type="password"
                                                class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="masukan password">
                                        </div>
                                        <div class="form-group content-sign-in" style="margin-bottom: -40px;">
                                            <input type="file" id="image_file" hidden="hidden">
                                        </div>
                                        <input type="file" id="image_file" accept="image/*" hidden="hidden">
                                        <input type="hidden" name="username_admin_url" value="<?php echo $checkdata['username']; ?>">
                                        <button name="updateAdmin" type="submit" class="btn btn-primary btn-primary-tiketsaya">Update</button>
                                        <a href="customer.html" class="btn btn-cancel-secondary">Cancel</a>
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
                    <a href="delete_admin.php?username_url=<?php echo $checkdata['username']; ?>" class="btn-delete btn btn-primary">
                        Delete Account
                    </a>
                </div>
            </div>
        </div>

    </div>

    </div>


    </div>

    </div>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyBnox1gyDGoduLbhlCce9kfYunYIJ3LiKg",
    authDomain: "tiketsaya-bb541.firebaseapp.com",
    databaseURL: "https://tiketsaya-bb541.firebaseio.com",
    projectId: "tiketsaya-bb541",
    storageBucket: "tiketsaya-bb541.appspot.com",
    messagingSenderId: "660800035186",
    appId: "1:660800035186:web:2ff87093059a387dbe25eb"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>

</html>