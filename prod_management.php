<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 상품 관리</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
    <h2>상품 관리</h2>
    <table border="1">
        <th>상품 번호</th> <th>상품 이름</th> <th>카테고리</th> <th>금액</th> <th>수량</th> <th>상품 등록일자</th> <th>상품 설명</th> <th>정보 수정</th> <th>재고 신청</th>
        <?php
        $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');
        if (mysqli_connect_errno()) {
            echo "Error: 데이터베이스 시스템에 연결할 수 없습니다.";
            exit;
        }
        $query = "SELECT * FROM product";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_row($result)) {
        ?>
            <tr>
            <?php
            for ($i = 0; $i < count($row); $i++) {
                $data = $row[$i];
            ?>
                <td>
                    <?php echo $data ?>
                </td>
            <?php
            }
            ?>
                <td>
                    <form method="post" action="prod_modify.php">
                        <button type="submit" name="pro_id" value="<?php echo $row[0];?>">수정</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="prod_request.php">
                        <button type="submit" name="pro_id" value="<?php echo $row[0];?>">신청</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </br>
    <input type="button" value="메인화면" onclick="location.href='main_page.php'">

    <?php mysqli_close($con); ?>
</body>
</html>







