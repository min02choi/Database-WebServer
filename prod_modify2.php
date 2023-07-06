<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $id = $_POST['pro_id'];
    $category = $_POST['pro_cate'];
    $price = $_POST['pro_price'];
    $description = $_POST['pro_des'];

    $query =   "UPDATE product
                SET cate = '$category', price = $price, des = '$description'
                WHERE pid = $id";
    $result = mysqli_query($con, $query);

    echo "<script>alert('수정이 완료되었습니다.')</script>";
    echo "<script>location.replace('prod_management.php');</script>";

    mysqli_close($con);
    ?>
</body>
</html>