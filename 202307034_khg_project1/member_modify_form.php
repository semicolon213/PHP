<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>정보수정</title>
        <link rel="stylesheet" type="text/css" href="./css/common.css?after">
        <link rel="stylesheet" type="text/css" href="./css/member.css?after">
        <script type="text/javascript" src="./js/member_modify.js"></script>
    </head>
    <body> 
        <header>
            <?php include "header.php"; ?>
        </header>
        <?php
        $con = mysqli_connect("localhost", "user1", "12345", "202307034_hearhere");
        $sql = "select * from members where id='$userid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        // DB에서 값 가져오기
        $pass = $row["pass"];
        $name = $row["name"];
        $phone = $row["phone"];
        $gender = $row["gender"];
        $address = $row["address"];
        $hobby = $row["hobbys"];
        $introduce = $row["introduce"];
        $img_path = $row["img"];
        $musicion = $row["level"]; // 레벨이 3이라면 뮤지션

        $hobbys = explode(",", $hobby); // ,를 기준으로 나눠서 배열에 담기

        $email = explode("@", $row["email"]);
        $email1 = $email[0];
        $email2 = $email[1];

        mysqli_close($con);
        ?>
        <section>
            <div id="main_img_bar">
                <img src="./img/main_img.png">
            </div>
            <div id="main_content">
                <div id="join_box">
                    <form  name="member_form" method="post" action="member_modify.php?id=<?= $userid ?>" enctype="multipart/form-data">
                        <h2>회원 정보수정</h2>
                        <div class="form id">
                            <div class="col1">아이디</div>
                            <div class="col2">
                                <?= $userid ?>
                            </div>                 
                        </div>
                        <div class="clear"></div>

                        <div class="form">
                            <div class="col1">비밀번호</div>
                            <div class="col2">
                                <input type="password" name="pass" value="<?= $pass ?>">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">비밀번호 확인</div>
                            <div class="col2">
                                <input type="password" name="pass_confirm" value="<?= $pass ?>">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">이름</div>
                            <div class="col2">
                                <input type="text" name="name" value="<?= $name ?>">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form email">
                            <div class="col1">이메일</div>
                            <div class="col2">
                                <input type="text" name="email1" value="<?= $email1 ?>">@<input 
                                    type="text" name="email2" value="<?= $email2 ?>">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">핸드폰</div>
                            <div class="col2">
                                <input type="text" name="phone" value="<?= $phone ?>">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form" style="height: 120px">
                            <div class="col1">주소</div>
                            <div class="col2">
                                <textarea style="height: 100px" cols="54" rows="10" name="address" onchange="chk_line(this)"><?= $address ?></textarea>

                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form" style="height: 120px;">
                            <div class="col1">가입인사 및 자기소개</div>
                            <div class="col2">
                                <textarea name="introduce"><?= $introduce ?></textarea>
                                <textarea style="height: 100px" cols="54" rows="10" name="introduce" onchange="chk_line(this)"><?= $introduce ?></textarea>
                            </div>                
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">성별</div>
                            <div class="col2">
                                <?php
                                if ($gender == "man") { // 남자라면
                                    ?>
                                    <div style="display: flex; align-items: center">
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="gender" value="남" checked>남</label>
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="gender" value="여">여</label>
                                    </div>
                                    <?php
                                } else { // 여자라면
                                    ?>
                                    <div style="display: flex; align-items: center">
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="gender" value="남">남</label>
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="gender" value="여" checked>여</label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">뮤지션 여부</div>
                            <div class="col2">
                                <?php
                                if ($musicion == 3) { // 뮤지션이라면
                                    ?>
                                    <div style="display: flex; align-items: center">
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="musicion" value="yes" checked>예</label>
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="musicion" value="no">아니요</label>
                                    </div>
                                    <?php
                                } else { // 뮤지션이 아니라면
                                    ?>
                                    <div style="display: flex; align-items: center">
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="musicion" value="yes">예</label>
                                        <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="musicion" value="no" checked>아니요</label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">취미 관심분야</div>
                            <div class="col2">
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="재즈"<?php if (in_array('재즈', $hobbys)) echo 'checked="checked"'; ?>>재즈</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="POP"<?php if (in_array('POP', $hobbys)) echo 'checked="checked"'; ?>>POP</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="K-POP"<?php if (in_array('K-POP', $hobbys)) echo 'checked="checked"'; ?>>K-POP</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="J-POP"<?php if (in_array('J-POP', $hobbys)) echo 'checked="checked"'; ?>>J-POP</label>
                                <br>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="발라드"<?php if (in_array('발라드', $hobbys)) echo 'checked="checked"'; ?>>발라드</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="클래식"<?php if (in_array('클래식', $hobbys)) echo 'checked="checked"'; ?>>클래식</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="R&B"<?php if (in_array('R&B', $hobbys)) echo 'checked="checked"'; ?>>R&B</label>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">대표 이미지</div>
                            <div class="col2">
                                <img src="<?= $img_path ?>">
                                <input type="file" name="img">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="bottom_line"> </div>
                        <div class="buttons">
                            <img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                            <img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                                 onclick="reset_form()">
                        </div>
                    </form>
                </div> <!-- join_box -->
            </div> <!-- main_content -->
        </section> 
    </body>
</html>

