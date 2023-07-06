<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 고객 관리</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $id = $_POST['cus_id'];

    $query =   "SELECT customer.cno, customer.name, product.name, cart.qty, orders.ord_date
                FROM customer, product, orders, cart
                WHERE customer.cno = orders.cus_no
                    AND orders.oid = cart.ord_no
                    AND cart.pro_id = product.pid
                    AND customer.cno = '$id'";

    $result = mysqli_query($con, $query);

//    print_r($result);
    $row = mysqli_fetch_row($result);
//    $name = $row[1];

    ?>
    <?php
    if (!$row) {
        $query2 = "SELECT name FROM customer WHERE cno='$id'";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_row($result2);
        $name2 = $row2[0];

        echo "<script>alert('$name2 님의 결제내역이 없습니다.')</script>";
        echo "<script>location.replace('cus_management.php');</script>";
    }

    else {
//        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $name = $row[1];

        echo "<h2> 회원 < $name > 님의 구매 내역</h2>";
        echo "회원 전화번호: $id";
        ?>
        <table border="1">
            <th>구매 날짜</th>
            <th>상품 이름</th>
            <th>상품 수량</th>
            <?php
                while ($row = mysqli_fetch_row($result)){
                    echo "<tr><td>$row[4]</td><td>$row[2]</td><td>$row[3]</td></tr>";
            }
            ?>
        </table>
        <?php
            $query = "SELECT SUM(price) FROM orders WHERE cus_no = '$id'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            echo "<h4> 전체 기간 총 구매 금액: $row[0] 원</h4>"
        ?>
        <input type="button" value="돌아가기" onclick="location.href='cus_management.php'"/>
        <input type="button" value="메인화면" onclick="location.href='main_page.php'"/>
    <?php
    }
    ?>
    <?php mysqli_close($con); ?>
</body>
</html>