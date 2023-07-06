<!DOCTYPE html>
<html>
<head>
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

    $con = mysqli_connect($host, $user, $pw, $dbName);

    $query = "SELECT admin_id FROM admin";

    $aadmin_id = $_POST['ad_id'];
    $aadmin_pw = $_POST['ad_pw'];

    $result = mysqli_query($con, $query);

    if (!mysqli_fetch_row($result)) {
        echo "관리자 내역이 없습니다.";
        echo "<script>location.replace('admin_login.php');</script>";
    }
    $flag = 0;
    while ($row = mysqli_fetch_row($result)) {
        if ($row[0] == $aadmin_id) {
//            print_r("아이디가 일치합니다.");
            $flag = 1;
        }
    }

    $query = "SELECT admin_name, admin_pw FROM admin WHERE admin_id = '$aadmin_id'";

    $result = mysqli_query($con, $query);
    if ($flag == 1) {
        while ($row = mysqli_fetch_row($result)) {
            if ($row[1] == $aadmin_pw) {
                $ad_name = $row[0];
                echo "<script>alert('[로그인 성공] \\n 관리자 $ad_name 님 반갑습니다.');</script>";
                echo "<script>location.replace('main_page.php');</script>";
            }
            else {
                echo "<script>alert('비밀번호가 올바르지 않습니다.');</script>";
                echo "<script>location.replace('admin_login.php');</script>";
            }
        }
    }
    else {
        echo "<script>alert('아이디가 올바르지 않습니다.');</script>";
        echo "<script>location.replace('admin_login.php');</script>";
    }

    mysqli_close($con);
    ?>
</body>
</html>