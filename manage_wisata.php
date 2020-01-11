<?php
    include 'includes/user_token.php';
    include 'includes/firebase.php';

    //Data Admin
    $reference = 'Admin/'.$_SESSION['username'];
    $checkdata = $database->getReference($reference)->getValue();

    //Cetak Data Admin
    $nama_admin_f = $checkdata['nama_admin'];

    //Dapatkan nama wisata dari URL
    $nama_wisata_url = $_GET['nama_wisata'];

    //Data Detail Wisata
    $path_wisata_details = 'Wisata/'.$nama_wisata_url;
    $checkdata_wisata_details = $database->getReference($path_wisata_details)->getValue();
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
    <title>Manage Wisata Details-TiketSaya</title>
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

                <div class="item-menu">
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
                <img src="image/admin_picture.png" alt="">
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
                    <li class="active-link">
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
                    <?php echo $checkdata_wisata_details['nama_wisata']; ?>
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class=" breadcrumb">
                        <li class="breadcrumb-item"><a href="wisata.php">Wisata</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details Wisata</li>
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
                            <p class="label-thumbnail">Thumbail Wisata</p>
                            <img src="<?php echo $checkdata_wisata_details['url_thumbnail']; ?>" class="thumbail-wisata" alt="">
                            <p class="label-thumbnail" id="custom-text">No File Choosen Yet</p>
                        </div>

                        <div class="col-md-5 offset-1">
                            <form method="POST" action="includes/data_model.php">
                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama
                                        Wisata</label>
                                    <input disabled type="text" name="nama_wisata" value="<?php echo $checkdata_wisata_details['nama_wisata']; ?>" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Masukan Nama Wisata">
                                </div>

                                <div class="form-group content-password">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleInputPassword1">Lokasi</label>
                                    <input required type="text" name="lokasi" value="<?php echo $checkdata_wisata_details['lokasi']; ?>" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="Masukan Lokasi">
                                </div>

                                <div class="form-group content-password">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Harga Tiket</label>
                                            <input required type="number" name="harga_tiket"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_wisata_details['harga_tiket']; ?>"
                                                id="exampleInputPassword1" placeholder="Harga">
                                        </div>

                                        <div class="col-md-8">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Tanggal Wisata</label>
                                            <input required type="text" name="date_wisata"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_wisata_details['date_wisata']; ?>"
                                                id="exampleInputPassword1" placeholder="Tanggal">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: -20px;">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleFormControlTextarea1">Ketentuan</label>
                                    <textarea class="form-control input-type-primary-tiketsaya" name="ketentuan"
                                        id="exampleFormControlTextarea1" rows="3"><?php echo $checkdata_wisata_details['ketentuan']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleFormControlTextarea1">Deskripsi Wisata</label>
                                    <textarea class="form-control input-type-primary-tiketsaya" name="short_desc"
                                        id="exampleFormControlTextarea1" rows="3"><?php echo $checkdata_wisata_details['short_desc']; ?></textarea>
                                </div>

                                <div class="form-group content-password">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Has Wifi ?</label>
                                            <input required type="text" name="is_wifi"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_wisata_details['is_wifi']; ?>"
                                                id="exampleInputPassword1" placeholder="Yes/No">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Has Spot ?</label>
                                            <input required type="text" name="is_photo_spot"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_wisata_details['is_photo_spot']; ?>"
                                                id="exampleInputPassword1" placeholder="spot">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Has Festival</label>
                                            <input required type="text" name="is_festival"
                                                class="form-control input-type-primary-tiketsaya" value="<?php echo $checkdata_wisata_details['is_festival']; ?>"
                                                id="exampleInputPassword1" placeholder="festival">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group content-sign-in" style="margin-bottom: -40px;">
                                    <input type="file" id="image_file" hidden="hidden">
                                </div>
                                    <button name="updateWisata" type="submit" class="btn btn-primary btn-primary-tiketsaya">Update</button>
                                    <button type="reset" class="btn btn-primary btn-secondary-tiketsaya">Cancel</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>

</html>