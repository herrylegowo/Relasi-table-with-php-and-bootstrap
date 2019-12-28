<?php
    $link = mysqli_connect("localhost", "root", "", "relasi_table");
    function query($query){
        global $link;
        $result = mysqli_query($link, $query);
        $rows = [];
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            return $rows;
    }
    function regist($data){
        global $link;
        $username = strtolower(stripslashes($data["nama"]));
        $email = $data["email"];
        $password = mysqli_real_escape_string($link, $data["password"]);
        $password2 = mysqli_real_escape_string($link, $data["password2"]);

        $result = mysqli_query($link, "SELECT nama FROM user WHERE nama = '$username'");
            if (mysqli_fetch_assoc($result)) {
                echo "
                        <script>
                            alert ('Username sudah terdaftar')
                        </script>
                     ";
                     return false;
            }
            if($password !== $password2) {
                echo "
                        <script>
                            alert ('password tidak sesuai')
                        </script>
                     ";
                     return false;
            }
        $password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($link, "INSERT INTO user VALUE ('', '$username', '$email', '$password')");
                return mysqli_affected_rows($link);
    }

        function make($data){
            global $link;
            // $judul = $data["judul"];
            // $isi = $data["isi"];
            $query = "INSERT INTO artikel VALUE('', '$data[id_user]', '$data[judulartikel]', '$data[isiartikel]', '$data[id_user]', '$data[komentar]')";
               return mysqli_query($link, $query);
                    
        }

        
        function comment($data){
            global $link;
            $query = "INSERT INTO comment VALUE('','$data[id_user]','$data[id_artikel]','$data[komentar]')";
            return mysqli_query($link, $query);
                   
        }


        function artikel(){            
            global $link;
            $query = "SELECT artikel.*, user.nama FROM artikel JOIN user ON artikel.id_user = user.id_user";
            $data = mysqli_query($link, $query);
        
            $result = [];
            foreach($data as $row){
                $comment = mysqli_query($link, "SELECT user.nama, comment.comment, comment.id_artikel FROM comment JOIN user ON comment.id_user = user.id_user WHERE comment.id_artikel = $row[id_artikel]");
                foreach($comment as $comments){
                    $komen = [
                        "nama" => $comments["nama"],
                        "komentar" => $comments["comment"]
                    ];
                    $row["comment"][] = $komen;
                }
                $result[] = $row;
            }
            return $result;
        }

        
        function artikel2(){            
            global $link;
            $query = "SELECT artikel.*, user.nama FROM artikel JOIN user ON artikel.id_user = user.id_user";
            return  mysqli_query($link, $query);
        }

?> 