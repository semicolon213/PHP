<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>프로필</title>
        <link rel="stylesheet" type="text/css" href="./css/common.css">
    </head>
    <body> 
        <header>
            <?php include "header.php"; ?>
        </header>
        <?php
        if (isset($_SESSION["userid"])) {
            $userid = $_SESSION["userid"];
        } else {
            $userid = "";
        }
        $con = mysqli_connect("localhost", "user1", "12345", "202307034_hearhere");
        $sql = "select * from members where id='$userid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        // DB에서 값 가져오기
        $pass = $row["pass"];
        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $gender = $row["gender"];
        $address = $row["address"];
        $hobby = $row["hobbys"];
        $hobbys = implode(",", json_decode($hobby,true));
        $introduce = $row["introduce"];
        $img_path = $row["img"];
        $level = $row["level"];
        if ($level == 3) {
            $musicion = "yes";
        } else {
            $musicion = "no";
        }


        ?>
        <section>
            <h2>프로필</h2>
            <ul>
                <li>아이디: <?= $userid ?></li>
                <li>이름: <?= $name ?></li>
                <li>비밀번호: <?= $pass ?></li>
                <li>이메일: <?= $email ?></li>
                <li>핸드폰: <?= $phone ?></li>
                <li>주소: <?= $address ?></li>
                <li>성별: <?= $gender ?></li>
                <li>취미: <?= $hobbys ?></li>
                <li>가입인사 및 자기소개: <?= $introduce ?></li>
                <li>뮤지션 여부: <?= $musicion ?></li>
                <li>대표 이미지: <img src="<?= $img_path ?>" width="100px" height="75px"></li>
                <li>찜 목록:</a></li>
            </ul>
            <?php
            $sql = "select num from zzim where id = '$userid'";
            $result = mysqli_query($con, $sql);

            $nums = [];
            $i = 0;

            while ($row = mysqli_fetch_array($result)) {
                $nums[] = $row['num'];
            }

            // 저장된 num 값을 사용하여 두 번째 쿼리를 반복 실행
            foreach ($nums as $num) {
                $sql = "select num, subject from admin_board where num = '$num'";
                $result = mysqli_query($con, $sql);
                // 메인페이지에선 4개만 출력
                if ($i > 3) {
                    break;
                }
                if ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div style="border: 2px solid; padding: 10px; height: 10%; width: 80%; margin-left:auto; margin-right : auto;"
                         id="round">
                        <h2>
                            <a href="musicion_board_view.php?num=<?= $row['num'] ?>&page=<?=1?>"
                               style="text-decoration-line: none; color:black">
                                   <?= $row['subject'] ?>
                            </a>
                        </h2>
                        <a href="zzim_delete.php?num=<?= $row['num'] ?>"
                           style="text-decoration-line: none; color:black">
                            [찜 제거]
                        </a>
                    </div>
                    <p></p>
                    <?php
                }
                $i++;
            }
            // DB 접속 해제
            mysqli_close($con);
            ?>
        </section> 
    </body>
</html>

