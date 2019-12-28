<?php
    session_start();
    require 'function.php';
    if(!isset($_SESSION["login"])){
        header("location: login.php");
    }
    $query = artikel2();
    
    if(isset($_POST["submit"])){
        $artikel = [
            
            "id_user" => $_SESSION["login"]["userId"],
            "judulartikel" => ($_POST["judul"]) ,
            "isiartikel" => ($_POST["isi"]),
        ];
        $inserKomentar = make($artikel);
        if($inserKomentar){
            echo "
                    <script>
                        alert ('succes');
                        document.location.href = 'index.php';
                    </script>
                ";
        }else{
            echo "
                    <script>
                        alert ('Try again');
                        document,location.href = 'index.php';
                    </script>
                ";
        }
        
            
    }
    foreach ($query as $row);
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat artikel</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="jumbotron text-center">
    <form action="" method="POST">
        <h3><?= $_SESSION["login"]["nama"] ; ?></h3>
    </form>
    </div>
    <div class="container" style="padding: 50px; width: 50%; border: 1px solid #000;">
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="judul" class="col-sm-2 control-label">Judul</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul...">
                </div>
            </div>
            <div class="form-group">
                <label for="isi" class="col-sm-2 control-label">Artikel</label>
                <div class="col-sm-10">
                <input style="padding: 20%;" type="text" class="form-control" name="isi" id="isi" placeholder="....">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" id="submit" class="btn btn-default">Buat</button>
                </div>
            </div>
        </form>
    </div>









    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script> 
</body>
</html>