<?php

$id = $_POST["id"];
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
    $img_path = "img/".$_FILES["img"]["name"];
}

$email = $email1 . "@" . $email2;

$address = htmlspecialchars($address, ENT_QUOTES);
$introduce = htmlspecialchars($introduce, ENT_QUOTES);

$con = mysqli_connect("localhost", "user1", "12345", "202307034_hearhere");
if ($musicion == 'yes') {
    $sql = "insert into members(id, pass, name, email, phone, address, introduce, gender, hobbys, img, level, point) ";
    $sql .= "values('$id', '$pass', '$name', '$email', '$phone', '$address', '$introduce', '$gender', '$hobbys', '$img_path', 3, 0)";
} else {
    $sql = "insert into members(id, pass, name, email, phone, address, introduce, gender, hobbys, img, level, point) ";
    $sql .= "values('$id', '$pass', '$name', '$email', '$phone', '$address', '$introduce', '$gender', '$hobbys', '$img_path', 9, 0)";
}


mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
mysqli_close($con);

echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>


