<!DOCTYPE html>
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
    <title>Sign In Admin TiketSaya</title>
</head>

<body>
    <div class="container">
        <div class="row header-sign-in">
            <div class="col-md-12">
                <img class="logo-header" height="80" src="image/applogocolored.png" alt="">
            </div>
        </div>

        <div class="row ">
            <div class="col-md-10 offset-md-1 form-sign-in">
                <div class="row">
                    <div class="col-md-6 d-none d-sm-block">
                        <img class="icon-header" height="276" src="image/undraw_authentication_fsn5.svg" alt="">
                    </div>
                    <div class="col-md-4">
                        <p class="title-form">
                            Sign In
                        </p>
                        <p class="subtitle-form">
                            Let's make a report today
                        </p>
                        <form method="POST" action="includes/data_model.php">
                            <div class="form-group content-sign-in">
                                <label class="title-input-type-primary-tiketsaya"
                                    for="exampleInputEmail1">Username</label>
                                <input required type="text" name="username" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Username">
                            </div>
                            <div class="form-group content-password">
                                <label class="title-input-type-primary-tiketsaya"
                                    for="exampleInputPassword1">Password</label>
                                <input required type="password" name="password" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputPassword1" placeholder="Masukan Password">
                            </div>
                            <button type="submit" name="signin" class="btn btn-primary btn-primary-tiketsaya">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
</body>

</html>