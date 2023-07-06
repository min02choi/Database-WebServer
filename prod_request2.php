<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $id = $_POST['pro_id'];
    $name = $_POST['pro_name'];
    $plus = $_POST['add_qty'];

    $query =   "UPDATE product
                    SET qty = qty + $plus
                    WHERE pid = $id";
    $result = mysqli_query($con, $query);

    $query =   "SELECT qty
                FROM product
                WHERE pid = $id";
    $result = mysqli_query($con, $query);

    $cur_qty = mysqli_fetch_row($result)[0];

    echo "<script>alert('{$name} {$plus}개 주문이 완료되었습니다.')</script>";
    echo "<script>alert('{$name}의 현재 수량은 {$cur_qty}개 입니다.');</script>";

    echo "<script>location.replace('prod_management.php');</script>";

    mysqli_close($con);
    ?>
</body>
</html>