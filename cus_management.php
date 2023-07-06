<!DOCTYPE html>
<html>
<head>
    <title>사장님 사이트 - 고객 관리</title>
    <h3>카나리오 밀키트 판매점</h3><hr>
</head>
<body>
    <h2>고객 관리</h2>
    <table border="1">
        <th>고객 전화번호</th> <th>고객 이름</th> <th>비밀번호</th> <th>방문 횟수</th> <th>보유 스탬프 수</th> <th>회원 등록 일자</th> <th>회원 삭제</th>
        <?php
        $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');
        if (mysqli_connect_errno()) {
            echo "Error: 데이터베이스 시스템에 연결할 수 없습니다.";
            exit;
        }

        $query = "SELECT * FROM customer ORDER BY reg";
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
                    <form method="post" action="cus_delete.php">
                        <button type="submit" name="cus_id" value="<?php echo $row[0];?>">삭제</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <h3>회원의 세부 거래 내역 조회</h3>
    <form method="post" action="cus_purchase.php">
        회원번호 입력:
        <input type="text" name="cus_id"/>
        <input type="submit" value="조회" name=""/>
    </form>
    <br><br>
    <input type="button" value="메인화면" onclick="location.href='main_page.php'">

    <?php mysqli_close($con); ?>
</body>
</html>







