<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>My SHOP</title>
</head>
<body>
<form method="POST" action="order.php">
    <table border="1" id="order-table">
        <caption>주문 가능한 리스트</caption>
        <tr>
            <th>상품명</th>
            <th>가격</th>
        </tr>
        <?php
        $db = mysqli_connect("localhost", "root", "Min02choi!", "meal_kit_market");
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database server.";
            exit;
        }
        $sql = "SELECT cno, name FROM customer";
        $result = mysqli_query($db, $sql);
//        echo $row;
//        print_r($row);
        while ($row = mysqli_fetch_row($result)){
            echo "<tr>";
            echo "<td>$row[0]</td><td>$row[1]</td>";
            echo "<tr>";
        }
        // mysqli_close($db);
        ?>
    </table>
</form>
</body>

</html>