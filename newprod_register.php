<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 신규 상품</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
<body>
    <h2>신규 상품 발주</h2>
    <form method="post" action="newprod_register2.php">
        <div>
            상품 이름: <input type="type" name="menu_name"/><br>
            카테고리: <input type="type" name="menu_cate"/><br>
            가격: <input type="type" name="menu_price"/><br>
            주문 수량: <input type="number" name="menu_qty"/><br>
            상품 설명: <input type="type" name="menu_des"/><br>
        </div>
        <br>
        <input type="submit" value="신청">
        <input type="button" value="취소" onclick="location.href='main_page.php'">
    </form>
</body>
</html>
