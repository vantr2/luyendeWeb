<?php
    $host = "localhost";
    $username = "student";
    $pass = "123456";
    $dbname = "ontap";

    $conn = mysqli_connect($host,$username,$pass,$dbname);

    function getViewVanDon(){
        global $conn;
        $sql = "SELECT * FROM v_vandon";
        $query = mysqli_query($conn,$sql);
        $result = array();
        if($query){
            while ($rows = mysqli_fetch_assoc($query)){
                $result[] = $rows;
            }
        }
        return $result;
    }

    function getListNhanVien(){
        global $conn;
        $sql = "SELECT id,hovaten FROM nhanvien";
        $query = mysqli_query($conn,$sql);
        $result = array();
        if($query){
            while ($rows = mysqli_fetch_assoc($query)){
                $result[] = $rows;
            }
        }
        return $result;
    }

    function addVanDon($id, $nv_id, $trangthai, $nguoinhan, $dienthoai, $diachi, $ngaygh, $ghichu){
        global $conn;
        $sql = "INSERT INTO vandon
            VALUES('$id','$nv_id','$trangthai','$nguoinhan','$dienthoai','$diachi','$ngaygh','$ghichu')";
        if(mysqli_query($conn,$sql)){
            return "Thêm thành công";
        }else{
            return "Lỗi :" . mysqli_error($conn);
        }
    }

    function validateUser($user,$pass){
        global $conn;
        $sql = "SELECT * FROM user where username='$user' and matkhau='$pass' ";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) == 0){
            return 0;
        }else{
            return 1;
        }
    }


?>