<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 상품 관리</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
<body>
<h2>전체 날짜 매출 확인</h2>
    <table border="1">
        <th>날짜</th>
        <th>주문 건수</th>
        <th>총 매출</th>
        <?php
        $con = mysqli_connect("localhost", "root", "Min02choi!", "meal_kit_market");
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database server.";
            exit;
        }
        $query = "SELECT ord_date, COUNT(ord_date), SUM(price) FROM orders GROUP BY ord_date";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_row($result)){
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        ?>
    </table>
    <br>
    <h3>특정 날짜의 세부 매출 내역 확인</h3>
    <form method="post" action="order_daysale.php">
        <input type="date" name="one_day"/>
        <input type="submit" value="조회" name="sel_day"/>
    <form/>
    <br><br>
    <input type="button" value="메인화면" onclick="location.href='main_page.php'"/>
</body>
</html>