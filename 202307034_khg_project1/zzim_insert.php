<?php

@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    $userid = "";
}
$num = $_GET['num'];
$con = mysqli_connect("localhost", "user1", "12345", "202307034_hearhere");

// 데이터베이스 연결 확인
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// 중복 체크 쿼리
$sql = "select * from zzim where id = '$userid' and num = '$num'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // 이미 존재하는 경우
    echo "이미 찜한 항목입니다.";
} else {
    // 존재하지 않는 경우, 삽입
    $sql = "insert into zzim(id, num) values('$userid', '$num')";
    echo "<script>
                window.alert('찜했습니다.');
            </script>";
    if (mysqli_query($con, $sql)) {
        
    } else {
        echo "에러: " . $sql . "<br>" . mysqli_error($con);
    }
}
// DB 연결 해제
mysqli_close($con);

// 페이지 이동
echo "
  <script>
        location.href = 'profile.php';
  </script>
";
?>
