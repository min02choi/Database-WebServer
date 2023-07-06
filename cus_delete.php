<!DOCTYPE html>
<html>
<head>
    <title>회원 탈퇴 화면</title>
</head>
<body>
    <?php
    $con = mysqli_connect('localhost', 'root', 'Min02choi!', 'meal_kit_market');

    $cus_no = $_POST['cus_id'];
    $query = "SELECT * FROM customer WHERE cno = $cus_no";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);
    ?>

    <h2>회원 정보 확인</h2>
    <form method="post" action="cus_delete2.php">
        <div>
            회원 번호: <input type="text" value="<?php echo $row[0];?>" name="cus_no" readonly> </br>
            회원 이름: <input type="text" value="<?php echo $row[1];?>" name="cus_name" readonly> </br>
            비밀번호: <?php echo $row[2]; ?> </br>
            방문 횟수: <?php echo $row[3] ;?> </br>
            보유 스탬프 수: <?php echo $row[4]; ?> </br>
            회원 등록 날짜: <?php echo $row[5]; ?> </br>
        </div>
        <div>
            </br>
            정말 회원 목록에서 삭제하시겠습니까?</br> 이 동작은 되돌릴 수 없습니다.</br>

            <input type="submit" value="회원 삭제">
            <input type="button" value="취소" onclick="location.href='cus_management.php'">
        </div>
    </form>

    <?php mysqli_close($con); ?>
</body>
</html>