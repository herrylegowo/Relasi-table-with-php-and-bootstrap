
<?php
     require 'function.php';
     if(isset($_POST["submit"])){
         if(regist($_POST) > 0){
             echo "
                     <script>
                         alert ('User baru berhasil ditambahkan');
                     </script>
                  ";
         }else{
             echo mysqli_error($link);
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
<body style="background: black">
    <div class="container text-center">
        <h2 style="color: white; margin-top: 3%;">Daftar disini</h2>
    </div>
    <div class="container" style="border: 1px solid white;  padding: 50px; margin-top: 4px; width: 30%; border-radius: 20px;">
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label style="color: white;" for="nama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8 col-sm-offset-1">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama...">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color: white" for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8 col-sm-offset-1">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color: white" for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8 col-sm-offset-1">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color: white;" for="password2" class="col-sm-2 control-label">Konfirmasi password</label>
                    <div class="col-sm-8 col-sm-offset-1">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Password...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-3">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
        </form>
    </div>
    








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>