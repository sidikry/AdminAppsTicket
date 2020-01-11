<?php

    include 'firebase.php';
    if(isset($_POST['signin'])){
        $username = htmlspecialchars( $_POST['username']);
        $password = htmlspecialchars( $_POST['password']);


        if($username !=null){
            if($password !=null){
                $reference = 'Admin/'.$username;
                $checkdata = $database->getReference($reference)->getValue();
                if($checkdata !=null){
                    if($password != null)
                    {  
                         //Ambil data
                         $password_admin_saat_ini = $checkdata['password'];
                         if($password == $password_admin_saat_ini)
                         {
                             //Jawaban Benar
                             session_start();
                             $_SESSION['username'] = $username;
                             header('location: ../dashboard.php');
                         }
                         else{
                             echo "Password Salah";
                         }
                        
                    }
                    else{
                        echo "Data Tidak Ada";
                    }
                }
                else{
                    echo "Data Tidak Ada";
                }
            }
        }
    }

    else if(isset($_POST['updateWisata'])){

        $nama_wisata_url = htmlspecialchars($_POST['nama_wisata_url']);

        $nama_wisata = htmlspecialchars( $_POST['nama_wisata_url']);
        $lokasi = htmlspecialchars( $_POST['lokasi']);
        $harga_tiket = htmlspecialchars( $_POST['harga_tiket']);
        $date_wisata = htmlspecialchars( $_POST['date_wisata']);
        $ketentuan = htmlspecialchars( $_POST['ketentuan']);
        $short_desc = htmlspecialchars( $_POST['short_desc']);
        $is_photo_spot = htmlspecialchars( $_POST['is_photo_spot']);
        $is_wifi = htmlspecialchars( $_POST['is_wifi']);
        $is_festival = htmlspecialchars( $_POST['is_festival']);

        $reference = 'Wisata/'.$nama_wisata_url;

        $data = [
            'nama_wisata' => $nama_wisata,
            'lokasi' => $lokasi,
            'harga_tiket' => $harga_tiket,
            'date_wisata' => $date_wisata,
            'ketentuan' => $ketentuan,
            'short_desc' => $short_desc,
            'is_photo_spot' => $is_photo_spot,
            'is_wifi' => $is_wifi,
            'is_festival' => $is_festival
        ];

        //Upload To Server
        $pushData = $database->getReference($reference)->update($data);
        header('location: ../wisata.php');
    }
    
    elseif(isset($_POST['updateCustomer'])){
        $username_url = htmlspecialchars($_POST['nama_username_url']);
        $username = htmlspecialchars($_POST['nama_username_url']);
        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $email_address = htmlspecialchars($_POST['email_address']);
        $password = htmlspecialchars($_POST['password']);
        $bio = htmlspecialchars($_POST['bio']);

        $reference = 'Users/'.$username_url;

        $data =[
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'email_address' => $email_address,
            'password' => $password,
            'bio' => $bio
        ];

        //Upload To Server
        $pushData = $database->getReference($reference)->update($data);
        //Setelah button update ditekan lempar menjuju customer.php
        header('location: ../customer.php');
    }

    elseif(isset($_POST['deleteUser'])){

        $username_url = htmlspecialchars($_POST['nama_username_url']);
        $reference = 'Users/'.$username_url;
        $reference_ticket = 'MyTickets/'.$username_url;

        //Action to Server
        $pushData = $database->getReference($reference)->remove();
        $removeTicket = $database->getReference($reference_ticket)->remove();
        //lempar ke customer.php
        header('location: ../customer.php');
    }

    elseif(isset($_POST['addUser'])){
        $username = htmlspecialchars($_POST['username']);
        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $email_address = htmlspecialchars($_POST['email_address']);
        $password = htmlspecialchars($_POST['password']);
        $bio = htmlspecialchars($_POST['bio']);
        $userbalance = htmlspecialchars($_POST['userbalance']);

        $reference = 'Users/'.$username;

        $data =[
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'email_address' => $email_address,
            'password' => $password,
            'bio' => $bio,
            'userbalance' => $userbalance
        ];
    
        //Action to Server
        $pushData = $database->getReference($reference)->set($data);
        //lempar ke customer.php
        header('location: ../customer.php');
    }

    elseif(isset($_POST['updateAdmin'])){
        $nama_admin = htmlspecialchars($_POST['nama_admin']);
        $email_admin = htmlspecialchars($_POST['email_admin']);
        $password = htmlspecialchars($_POST['password']);

        $reference = 'Admin/'.$username_admin_url;

        $data =[
            'username' => $username_admin_url,
            'nama_admin' => $nama_admin,
            'email_admin' => $email_admin,
            'password' => $password,
        ];

        //Upload To Server
        $pushData = $database->getReference($reference)->update($data);
        //Setelah button update ditekan lempar menjuju customer.php
        header('location: ../dashboard.php');
    }
    else if(isset($_POST['updateUsers'])){

        $username_url = htmlspecialchars( $_POST['username_url']);
        $nama_lengkap = htmlspecialchars( $_POST['nama_lengkap']);
        $username = htmlspecialchars( $_POST['username']);
        $bio = htmlspecialchars( $_POST['bio']);
        $password = htmlspecialchars( $_POST['password']);
        $userbalance = htmlspecialchars( $_POST['userbalance']);
        $email_address = htmlspecialchars( $_POST['email_address']);
        

        $reference = 'Users/'.$username_url;

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'bio' => $bio,
            'password' => $password,
            'userbalance' => $userbalance,
            'email_address' => $email_address,
        ];

        //Upload To Server
        $pushData = $database->getReference($reference)->update($data);
        header('location: ../users.php');
    }

?>