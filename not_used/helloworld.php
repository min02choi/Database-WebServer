<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>예제 회원가입</title>
</head>
<body>
    <?php
        $host = 'localhost';
        $user = 'root';
        $pw = 'Min02choi!';
        $dbName = 'meal_kit_market';
        $mysqli = new mysqli($host, $user, $pw, $dbName);

        if($mysqli){
            echo "MySQL 접속 성공";
        }
        else{
            echo "MySQL 접속 실패";
        }
    ?>

    <form method="post" action="../admin_login.php">

    </form>

    <form method="post" action="./testdb.php">
        <label>테이블 <input type="text" name='tab'> </label><br>
        <label>상품 <input type="text" name='col'> </label><br>
        <input type="submit" value='가입하기'>
    </form>
</body>
</html>
