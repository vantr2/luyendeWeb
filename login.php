<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    require "db.php";
    $kq = "";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if (validateUser($_POST['username'],$_POST['password']) == 1){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['login_time'] = date('F j, Y , g:i a');
            header("location:index.php");
        }else{
            $kq = "Đăng nhập thất bại";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.5.1.slim.js" type="text/javascript"></script>
    
    
</head>
<body>
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-md-6 offset-3">
                <h1 class="text-center">Đăng nhập</h1>
                <form method="post" class="border border-primary rounded p-4">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input class="form-control" type="text" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <span class="btn btn-light"><a href="index.php">Trở về trang chủ</a></span>
                    <h6 class="text-danger mt-3"><?php if($kq){echo $kq;}?></h6>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
