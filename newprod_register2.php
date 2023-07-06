<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $name = $_POST['menu_name'];
    $cate = $_POST['menu_cate'];
    $price = $_POST['menu_price'];
    $qty = $_POST['menu_qty'];
    $des = $_POST['menu_des'];

    $query = "SELECT max(pid) FROM product";
    $result = mysqli_query($con, $query);
    $id = mysqli_fetch_row($result)[0] + 1;

    if (!$des) {
        $des = "상품 설명이 없습니다.";
    }
    if (!$name or !$cate or !$price or !$qty) {
        echo "<script>alert('입력에 공백이 있습니다. 신청을 취소합니다.')</script>";
        echo "<script>location.replace('main_page.php');</script>";
    }

    $query =   "INSERT 
                INTO product (pid, name, cate, price, qty, des)
                VALUES ($id, '$name', '$cate', $price, $qty, '$des')";

    $result = mysqli_query($con, $query);

    echo "<script>alert('신규 상품 신청이 완료되었습니다.')</script>";
    echo "<script>location.replace('main_page.php');</script>";

    mysqli_close($con);
    ?>
</body>
</html>