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
    $qty = $row[4];
    ?>
    <h2>상품 발주</h2>
    <form method="post" action="prod_request2.php">
        <div>
            상품 번호: <input type="text" value="<?php echo $row[0];?>" name="pro_id" readonly></br>
            메뉴 이름: <input type="text" value="<?php echo $row[1];?>" name="pro_name" readonly></br>
            카테고리: <?php echo $row[2]; ?></br>
            가격: <?php echo $row[3];?></br>
            재고: <?php echo $row[4]; ?></br>
            등록 날짜: <?php echo $row[5]; ?></br>
            상품 설명: <?php echo $row[6];?></br>
        </div>
        <div>
            <br><?php echo $row[1]; ?>의 수량이 <?php echo $qty; ?>개 남았습니다.</br>
            추가로 주문하실 수량을 선택해주세요<input type="number" name="add_qty">
        </div>
        <div>
            </br>
            <input type="submit" value="주문">
            <input type="button" value="취소" onclick="location.href='prod_management.php'">
        </div>
    </form>
    <?php mysqli_close($con); ?>
</body>
</html>