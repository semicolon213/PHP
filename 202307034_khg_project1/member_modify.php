<?php

$id = $_GET["id"];
// member_modify_form에서 post방식으로 값 받아오기
$pass = $_POST["pass"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$introduce = $_POST["introduce"];
$gender = $_POST["gender"];
$musicion = $_POST["musicion"];
$hobby = $_POST["hobby"];
$hobbys = json_encode($hobby);
$file_dir = "C:/xampp/htdocs/FinalTest/img/";
$file_path = $file_dir . $_FILES["img"]["name"];
if (move_uploaded_file($_FILES["img"]["tmp_name"], $file_path)) {
    $img_path = "img/" . $_FILES["img"]["name"];
}

$email = $email1 . "@" . $email2;

$address = htmlspecialchars($address, ENT_QUOTES);
$introduce = htmlspecialchars($introduce, ENT_QUOTES);

// DB에 업데이트
if($musicion == "yes"){
    $sql = "update members set pass='$pass', name='$name' , email='$email', phone='$phone', address='$address', introduce='$introduce', gender='$gender', hobbys='$hobbys', img='$img_path', level=3";
}
else {
    $sql = "update members set pass='$pass', name='$name' , email='$email', phone='$phone', address='$address', introduce='$introduce', gender='$gender', hobbys='$hobbys', img='$img_path', level=9";
}
$con = mysqli_connect("localhost", "user1", "12345", "202307034_hearhere");

$sql .= " where id='$id'";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>


