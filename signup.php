<?php 
    include "app/app.php";
    if(isset($_GET['alert'])){
        if($_GET['alert'] == "done"){
            $alert = "";
        }
        else{
            $alertisi = $_GET['isi'];
            $alert = "<p class='alert error'>$alertisi</p>";
        }
    }
    else{
        $alert = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Of MoonPedia</title>
    <link rel="stylesheet" href="assets/style/login.css">
</head>
<body>
    <form method="post">
        <div class="atas">
            <p id="text">Daftar Member</p>
            <p id="sub">Daftar dan nikmati harga spesial dari kami</p>
        </div>
        <?= $alert ?>
        <div class="input">
            <label for="">
                <p>Nama Panggilan</p>
                <input type="text" name="name">
            </label>
            <label for="">
                <p>Whatsapp</p>
                <input type="text" name="whatsapp">
            </label>
            <label for="">
                <p>Email</p>
                <input type="email" name="email">
            </label>
            <label for="">
                <p>Password</p>
                <input type="password" name="new-password">
            </label>
            <label for="">
                <p>konfirmasi Password</p>
                <input type="password" name="confirm-password">
            </label>
        </div>
        <div class="link">
            <a href="signin.html">Punya akun? Masuk</a>
        </div>
        <button type="submit" name="confirm">Daftar Sekarang</button>
    </form>

    <?php 
        if(isset($_POST['confirm'])){
            $name = $_POST['name'];
            $whatsapp = $_POST['whatsapp'];
            $email = $_POST['email'];
            $newpassword = md5($_POST['new-password']);
            $conpassword = md5($_POST['confirm-password']);

            if($newpassword == $conpassword){
                $scek = $conf->query("SELECT * FROM users WHERE whatsapp = '$whatsapp' AND email = '$email'");
                $ucek = mysqli_num_rows($scek);
                if($ucek > 0){
                    echo "<meta http-equiv='refresh' content='0;signup?alert=error&isi=Whatsapp atau Email Sudah Terdaftar'>";
                }
                else{
                    $query = $confapp->query("INSERT INTO users SET userid = '$userid', name = '$name', whatsapp = '$whatsapp', email = '$email', password = '$conpassword', role = 'guest'");
                    if($query){
                        session_start();
                        $_SESSION['userid'] = $userid;
                        echo "<meta http-equiv='refresh' content='0;index.html'>";
                    }  
                }
                
            }
            else{
                echo "<meta http-equiv='refresh' content='0;signup?alert=error&isi=Password Tidak Sama'>";
            }
        }
    ?>
</body>
</html>