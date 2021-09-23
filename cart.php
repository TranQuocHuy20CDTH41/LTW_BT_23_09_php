<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
        if (!isset($_POST['clear'])) {
            $arr = $_SESSION['arr'];
            if (count($arr) != 0) {
                echo "<h2>DANH SÁCH HÀNG HÓA</h2><br/>";
                echo "<table border = 1><tr><th>STT</th><th>Tên hàng</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr>";
                for ($j = 0; $j < count($arr); $j++) {
                echo "<tr><td>".$arr[$j][0]."</td><td>".$arr[$j][1]."</td><td>".$arr[$j][2]."</td><td>".$arr[$j][3]."</td><td>".$arr[$j][4]."</td></tr>";
                }
                $sum = 0;
                for ($i=0; $i < count($arr); $i++) { 
                    $sum += $arr[$i][4];
                }
                echo "<tr><td><b>Tổng</b></td><td></td><td></td><td></td><td>$sum</td></tr>";
                echo '</table>';
            }else {
                echo "Danh sách rỗng";
        }
        
        }else {
        echo "Giỏ hàng rỗng!";
        session_destroy();
        unset($_SESSION['arr']);
    }   
    ?>
        <div class="back">
                <br><a href ="index.php"><button type="submit" class="btn btn-primary" name="clear">Back</button></a></br>
            <form action="" method="post">
                <br><button type="submit" class="btn btn-primary" name="clear" style="color: black;">Xóa giỏ hàng</button></br>
            </form>
        </div> 
</body>
</html>
