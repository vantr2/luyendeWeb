<?php
    require "db.php";
    $nvs = getListNhanVien();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm vận đơn</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.5.1.slim.js" type="text/javascript"></script>
</head>
<body>
<h5>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark pl-5 mb-5 font-weight-bold">
        <a href="index.php" class="navbar-brand">TRONGVAN</a>

        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Danh sách vận đơn</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Thêm vận đơn</a></li>
            <li class="nav-item"><a href="showimage.php" class="nav-link">Hình ảnh</a></li>
        </ul>
    </nav>
</h5>
<h1 class="text-center">Thêm vận đơn</h1>
<div class="container">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="id">Mã đơn hàng</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>

        <div class="form-group">
            <label for="hovaten">Nhân viên</label>
            <select name="hovaten" id="hovaten" class="form-control">
                <?php foreach($nvs as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['hovaten']?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
            <label for="trangthai">Trạng thái</label>
            <select name="trangthai" id="trangthai" class="form-control">
                <option value="0">Đang giao</option>
                <option value="1">Đã nhận</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nguoinhan">Người nhận</label>
            <input type="text" class="form-control" id="nguoinhan" name="nguoinhan" >
        </div>
        <div class="form-group">
            <label for="dienthoai">Điện thoại</label>
            <input type="text" class="form-control" id="dienthoai" name="dienthoai">
        </div>
        <div class="form-group">
            <label for="diachi">Địa chỉ</label>
            <textarea class="form-control" id="diachi" name="diachi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="ghichu">Ghi chú</label>
            <textarea class="form-control" id="ghichu" name="ghichu" rows="3"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
<footer class="text-center bg-dark py-3 text-light mt-5"><h5>75780 - Trần Trọng Văn - CNT58DH</h5></footer>
</body>
</html>

