<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 상품 관리</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $prod_id = $_POST['pro_id'];
    $query = "SELECT * FROM product WHERE pid = $prod_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);
    ?>
    <h2>상품 정보 수정</h2>
    <form method="post" action="prod_modify2.php">
        <div>
            상품 번호: <input type="text" value="<?php echo $row[0];?>" name="pro_id" readonly></br>
            메뉴 이름: <?php echo $row[1]; ?></br>
            카테고리: <input type="text" value="<?php echo $row[2];?>" name="pro_cate"></br>
            가격: <input type="text" value="<?php echo $row[3];?>" name="pro_price"></br>
            재고: <?php echo $row[4]; ?></br>
            등록 날짜: <?php echo $row[5]; ?></br>
            상품 설명: <input type="text" value="<?php echo $row[6];?>" name="pro_des"></br>
        </div>
        <div>
            </br>
            <input type="submit" value="적용">
            <input type="button" value="취소" onclick="location.href='prod_management.php'">
        </div>
    </form>
    <?php mysqli_close($con); ?>
</body>
</html>