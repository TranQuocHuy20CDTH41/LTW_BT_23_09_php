
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <title>Bài Tập</title>
</head>
<body>
    <b>NHẬP THÔNG TIN MẶT HÀNG CẦN MUA</b><br>
    <form action="index.php" method="post">
        <div class="form-group">
            <div class="mb-3">
                Tên hàng:
                <input type="text" name="tenhang" placeholder="Nhập tên hàng" class="form-control" style="width: 300px"> 
                Số lượng: 
                <input type="text" name="soluong" placeholder="Nhập số lượng" class="form-control" style="width: 300px"> 
                Đơn giá: 
                <input type="text" name="dongia" placeholder="Nhập đơn giá" class="form-control" style="width: 300px"> 
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="add" style="color: black;">Thêm</button>
                <button type="submit" class="btn btn-primary" name="display" style="color: aliceblue;"><a href="cart.php" style="color: black;">Hiển thị giỏ hàng</a></button>
            </div>
        </div>
    </form>
    <?php
         $i = 0;
         session_start();
         if (isset($_POST['add'])) {
             if (isset($_POST['tenhang']) && isset($_POST['dongia']) && isset($_POST['soluong'])) {
                 if (!isset($_SESSION['arr'])) {
                     $arr = array(array());
                     $arr[0][0] = 1;
                     $arr[0][1] = $_POST['tenhang'];
                     $arr[0][2] = $_POST['soluong'];
                     $arr[0][3] = $_POST['dongia'];
                     $arr[0][4] = $_POST['dongia'] * $_POST['soluong'];
                     $_SESSION['arr'] = $arr; 
                 }else {
                    $arr = $_SESSION['arr'];
                    $i = count($arr);
                    $arr[$i][0] = $i+1;
                    $arr[$i][1] = $_POST['tenhang'];
                    $arr[$i][2] = $_POST['soluong'];
                    $arr[$i][3] = $_POST['dongia'];
                    $arr[$i][4] = $_POST['dongia'] * $_POST['soluong'];
                    $_SESSION['arr'] = $arr; 
                 }
             }
             echo "Tổng số loại mặt hàng đã mua là: ".count($arr);
         }
         if (isset($_POST['display'])) {
            header('location:cart.php');
        }
    ?>
</body>
</html>