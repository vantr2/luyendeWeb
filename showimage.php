<?php
    session_start();

    //Xử lý phần menu đăng nhập, Nếu đã đăng nhập thì ghi Đăng xuất, chưa đăng nhập thì Đăng nhập
    $link = "";$title = "";
    //Hiển thị tên đăng nhập và thời gian đăng nhập
    $log_note = "";
    if(isset($_SESSION['username'])){
        $link = "logout.php";
        $title = "Đăng xuất";
        $log_note = $_SESSION['username']." - Đăng nhập lần cuối lúc : " .  $_SESSION['login_time'];
    }else{
        $link = "login.php";
        $title = "Đăng nhập";
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hình ảnh chứng minh</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.5.1.slim.js" type="text/javascript"></script>
</head>
<body>
<h6>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark pl-5">
        <a href="index.php" class="navbar-brand">TRONGVAN</a>

        <ul class="navbar-nav">
            <li class="nav-item mx-4"><a href="index.php" class="nav-link">Danh sách vận đơn</a></li>
            <li class="nav-item mx-4"><a href="#" class="nav-link">Thêm vận đơn</a></li>
            <li class="nav-item mx-4"><a href="showimage.php" class="nav-link">Hình ảnh</a></li>
            <li class="nav-item mx-4"><a href="<?=$link?>" class="nav-link"><?=$title?></a></li>

        </ul>
    </nav>
</h6>
<div class="text-right"><?=$log_note?></div>
<div class="container">
    <div class="text-center my-5 py-5">
        <img src="images/img.png" alt="Hình ảnh chứng minh" width="80%">
    </div>
</div>
<footer class="text-center bg-dark py-3 text-light mt-5"><h5>75780 - Trần Trọng Văn - CNT58DH</h5></footer>
</body>
</html>
