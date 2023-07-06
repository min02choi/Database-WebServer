<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $no = $_POST['cus_no'];
    $name = $_POST['cus_name'];

    $query =   "DELETE 
                FROM customer
                WHERE cno = $no";

    $result = mysqli_query($con, $query);

    echo "<script>alert('화원 삭제가 완료되었습니다.')</script>";
    echo "<script>location.replace('cus_management.php');</script>";

    mysqli_close($con);
    ?>
</body>
</html>