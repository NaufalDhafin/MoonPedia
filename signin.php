<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Of MoonPedia</title>
    <link rel="stylesheet" href="assets/style/login.css">
</head>
<body>
    <form action="" method="post">
        <div class="atas">
            <p id="text">Masuk </p>
            <p id="sub">Masuk menggunakan akun yang telah terdaftar.</p>
        </div>
        <div class="input">
            <label for="">
                <p>Email / Whatsapp</p>
                <input type="text" name="form">
            </label>
            <label for="">
                <p>Password</p>
                <input type="password" name="password">
            </label>
        </div>
        <div class="link">
            <a href="signup.html">Daftar akun</a>
            <a href="lostpass.html">Lupa Password</a>
        </div>
        <button type="submit" name="confrim">Masuk Sekarang</button>
    </form>
    <?php 
        if(isset($_POST['confirm'])){
            $form = $_POST['form'];
            $pass = md5($_POST['pass']);
            $query = $confapp->query("SELECT * FROM users WHERE whatsapp = '$form' OR email = '$form' AND password = '$pass'");
            $cek   = mysqli_num_rows($query);
            if($cek > 0){
                $dataUser = $query->fetch_array();
                session_start();
                $_SESSION['userid'] = $dataUser['userid'];
                echo "<meta http-equiv='refresh' content='0;index.html'>";
            }
        }
    ?>
</body>
</html>