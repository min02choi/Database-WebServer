<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 매출 관리</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
<body>
    <?php
        $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');
//        $day = $_POST['sel_day'];객
        $day = $_POST['one_day'];
        if (!$day) {
            echo "<script>alert('날짜를 선택해 주세요.')</script>";
            echo "<script>location.replace('order_management.php');</script>";
        }
        $quy = "SELECT ord_date FROM orders WHERE ord_date = '$day'";
        $res = mysqli_query($con, $quy);
        $day_exist = mysqli_fetch_row($res);
        if (!$day_exist) {
            echo "<script>alert('$day 의 판매내역이 없습니다.')</script>";
            echo "<script>location.replace('order_management.php');</script>";
        }
//        print_r($day);
        $query = "SELECT product.pid, product.name, SUM(cart.qty), SUM(product.price * cart.qty), SUM(product.price * cart.qty) FROM product, orders, cart WHERE orders.ord_date = '$day' AND orders.oid = cart.ord_no AND cart.pro_id = product.pid GROUP BY product.pid, product.name ORDER BY product.pid";
//        print_r($query);
        $result = mysqli_query($con, $query);
//        $row = mysqli_fetch_row($result);
    ?>
    <?php echo "<h2>$day 판매 내역</h2>" ?>
    <table border="1">
        <th>상품 번호</th>
        <th>상품 이름</th>
        <th>판매 수량</th>
        <th>총 금액</th>
        <?php
            while ($row = mysqli_fetch_row($result)){
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        }
        ?>
    </table>
    <?php
        $query = "SELECT SUM(price) FROM orders WHERE ord_date = '$day'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        echo "<h4> 총 판매 금액: $row[0] 원</h4>"
    ?>
    <input type="button" value="돌아가기" onclick="location.href='order_management.php'"/>
    <input type="button" value="메인화면" onclick="location.href='main_page.php'"/>

    <?php mysqli_close($con); ?>
</body>
</html>


<!---->
<!--1. 고객이 사간 시간을 Log로 조회-->
<!--2. 그날 판매한 물품의 총 수량과 가격, 총 매출-->
<!---->
<!--3. Web에서 Insert? 상품?-->