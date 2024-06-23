<?php
session_start();
if (isset($_SESSION["userlevel"]))
    $userlevel = $_SESSION["userlevel"];
else
    $userlevel = "";

// 관리자, 뮤지션이 아닐 때
if ($userlevel != 1 && $userlevel != 3) {
    echo("
                    <script>
                    alert('공연 공지 게시판 글쓰기는 관리자, 뮤지션만 가능합니다!');
                    history.go(-1)
                    </script>
        ");
    exit;
}

$num = $_GET["num"];
$page = $_GET["page"];

$subject = $_POST["subject"];
$content = $_POST["content"];

$con = mysqli_connect("localhost", "user1", "12345", "202307034_hearhere");
$sql = "update musician_board set subject='$subject', content='$content' ";
$sql .= " where num=$num";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
	      <script>
	          location.href = 'musicion_board_list.php?page=$page';
	      </script>
	  ";
?>


