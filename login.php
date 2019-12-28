<?php
    session_start();
      require 'function.php';
      if(isset($_POST["login"])){
          $username = $_POST["username"];
          $password = $_POST["password"];
          $result = mysqli_query($link, "SELECT * from user WHERE nama = '$username' ");
            if(mysqli_num_rows($result) === 1 ){
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row["password"])){
                    $userdata = [
                        "nama" => $row["nama"],
                        "userId" => $row["id_user"]
                    ];
                    $_SESSION["login"] = $userdata;
                    header("location: index.php");
                    exit;
                }
            }
            $error = true;
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
<body>
      <?php if(isset($error)) : ?>
        <p style="color: red;">Password atau Username salah</p>
      <?php endif ; ?>
    <div class="container text-center">
        <h2>Login</h2>
    </div>
    <div class="container" style="border: 1px solid black;  padding: 50px; margin-top: 4px; width: 30%; border-radius: 20px;">
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-8 col-sm-offset-1">
                    <input type="text" class="form-control" name="username" id="username" placeholder="username...">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8 col-sm-offset-1">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-3">
                    <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                    </div>
                </div>
        </form>
    </div>
    








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>