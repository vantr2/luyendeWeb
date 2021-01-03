<?php
    require "db.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $nv = $_POST['hovaten'];
        $trangthai = $_POST['trangthai'];
        $nguoinhan = $_POST['nguoinhan'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $ngaygiao = date("Y-m-d H:i:s");
        $ghichu = $_POST['ghichu'];

        $kq = addVanDon($id,$nv,$trangthai,$nguoinhan,$dienthoai,$diachi,$ngaygiao,$ghichu);
    }
    $result = getViewVanDon();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.5.1.slim.js" type="text/javascript"></script>
    <title>Quản lý vận đơn</title>
</head>
<body>

    <h5>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark pl-5 mb-5 font-weight-bold">
        <a href="index.php" class="navbar-brand">TRONGVAN</a>

        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Danh sách vận đơn</a></li>
            <li class="nav-item"><a href="themvandon.php" class="nav-link">Thêm vận đơn</a></li>
            <li class="nav-item"><a href="showimage.php" class="nav-link">Hình ảnh</a></li>
        </ul>
    </nav>
    </h5>
    <div class="container">
        <h1 class="text-center text-uppercase m-4">quản lý vận đơn</h1>
        <input class="form-control" id="tennv" onkeyup="searchByName()" type="text" placeholder="Tên nhân viên"><br>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr class="text-center">
                <th>Mã đơn hàng</th>
                <th>Nhân viên</th>
                <th>Trạng thái</th>
                <th>Người nhận</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày giao hàng</th>
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody id="vandon">
                <?php foreach($result as $item):?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><?=$item['hovaten']?></td>
                    <td><?=$item['trangthai']?></td>
                    <td><?=$item['nguoinhan']?></td>
                    <td><?=$item['dienthoai']?></td>
                    <td><?=$item['diachi']?></td>
                    <td><?=date("d-m-Y",strtotime($item['ngaygiaohang']))?></td>
                    <td><?=$item['ghichu']?></td>
                    <td><a href="themvandon.php">Thêm</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <h4><?php if(isset($kq)) echo $kq;?></h4>
    </div>


    <footer class="text-center bg-dark py-3 text-light mt-5"><h5>75780 - Trần Trọng Văn - CNT58DH</h5></footer>
    <script>
        function searchByName(){
            var input = document.getElementById("tennv");
            var kw = input.value.toUpperCase();
            var table = document.getElementById("vandon");
            var rows = table.getElementsByTagName("tr");

            for(var i = 0 ; i<rows.length;i++){
                cell = rows[i].getElementsByTagName("td")[1]; // teen nhaan vien
                if(cell){
                    data = cell.textContent || cell.innerText; // textContent không hỗ trợ IE8
                    if (data.toUpperCase().indexOf(kw) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }

                }
            }
        }
    </script>
</body>
</html>

<?php
