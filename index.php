<?php
    session_start();
    require 'function.php';
    if(!isset($_SESSION["login"])){
        header("location: login.php");
    }
    $query = artikel();
    if(isset($_POST["submit"])){
        $komentar = [
            "id_artikel" => $_POST["artikelId"],
            "id_user" => $_SESSION["login"]["userId"],
            "komentar" => $_POST["comment"]
        ];
        $inserKomentar = comment($komentar);
        if($inserKomentar){
            header("location: index.php");
        }else{
            echo "<script>alert('Ada Masalah Saat Berkomentar!')</script>";
        
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artikel</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body">
    <nav style="background: #329596;" class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar">
                <a class="navbar-brand" href="logout.php">
                    Keluar <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                </a>
                <h2 class="navbar-text navbar-right">Buat artikel anda <a href="artikel.php" class="navbar-link">di sini</a></h2>
            </div>
        </div>  
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Halaman artikel</h1>
                <hr>
            </div>
            <div class="col-sm-12">
                <h3 class="text-center">Selamat datang</h3>
            </div>
            <div class="col-sm-12">
                <h4 class="text-center" style="color: blue;"><?= $_SESSION["login"]["nama"] ?></h4>
                <hr style="width: 40%;">
            </div>
        </div>
    </div>
    <section>
        <?php foreach($query as $artikel) : ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h3 class="text-center"><?= $artikel["nama"] ; ?></h3>
                </div>
                <div class="col-sm-4"><hr>
                    <h3 class="text-center"><?= $artikel["judul"] ; ?></h3><hr>
                    <p><?= $artikel["isi"] ?></p>
                </div>
                <div class="col-sm-4">
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="text" name="comment" placeholder="Tulis Komentar"></td>
                                <td><input type="hidden" name="artikelId" value="<?= $artikel["id_artikel"] ?>"></td>
                                <td><input type="submit" name="submit" value="Kirim"></td>
                            </tr>
                        </table>
                        <?php foreach($artikel["comment"] as $comments): ?>
                            <b class=""><?= $comments["nama"] ?></b>
                            <p class=""><?= $comments["komentar"] ?></p>
                            <hr>
                        <?php endforeach ; ?>
                    </form>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
    <hr>
    </section>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>