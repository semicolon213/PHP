<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>회원가입</title>
        <link rel="stylesheet" type="text/css" href="./css/common.css?after">
        <link rel="stylesheet" type="text/css" href="./css/member.css?after">
        <script>
            function check_input()
            {
                if (!document.member_form.id.value) {
                    alert("아이디를 입력하세요!");
                    document.member_form.id.focus();
                    return;
                }

                if (!document.member_form.pass.value) {
                    alert("비밀번호를 입력하세요!");
                    document.member_form.pass.focus();
                    return;
                }

                if (!document.member_form.pass_confirm.value) {
                    alert("비밀번호확인을 입력하세요!");
                    document.member_form.pass_confirm.focus();
                    return;
                }

                if (!document.member_form.name.value) {
                    alert("이름을 입력하세요!");
                    document.member_form.name.focus();
                    return;
                }

                if (!document.member_form.email1.value) {
                    alert("이메일 주소를 입력하세요!");
                    document.member_form.email1.focus();
                    return;
                }

                if (!document.member_form.email2.value) {
                    alert("이메일 주소를 입력하세요!");
                    document.member_form.email2.focus();
                    return;
                }

                if (!document.member_form.phone.value) {
                    alert("핸드폰 번호를 입력하세요!");
                    document.member_form.phone.focus();
                    return;
                }

                if (!document.member_form.address.value) {
                    alert("주소를 입력하세요!");
                    document.member_form.address.focus();
                    return;
                }

                if (!document.member_form.introduce.value) {
                    alert("가입인사 및 자기소개를 입력하세요!");
                    document.member_form.introduce.focus();
                    return;
                }
                
                const checkedCheckboxes = document.querySelectorAll('input[name="hobby[]"]:checked');
                const count = checkedCheckboxes.length;
                
                if (count < 1) {
                    alert("관심분야를 하나 이상 선택하세요");
                    return;
                }

                if (document.member_form.pass.value !=
                        document.member_form.pass_confirm.value) {
                    alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
                    document.member_form.pass.focus();
                    document.member_form.pass.select();
                    return;
                }

                document.member_form.submit();
            }

            function reset_form() {
                document.member_form.id.value = "";
                document.member_form.pass.value = "";
                document.member_form.pass_confirm.value = "";
                document.member_form.name.value = "";
                document.member_form.email1.value = "";
                document.member_form.email2.value = "";
                document.member_form.phone.value = "";
                document.member_form.address.value = "";
                document.member_form.introduce.value = "";
                document.member_form.gender.value = "";
                document.member_form.musicion.value = "";
                document.member_form.hobby.value = "";
                document.member_form.id.focus();
                return;
            }

            function chk_line(form) {
                if (form.length > 100) {
                    window.alert('100자이하만 입력');
                    return false;
                }
            }

            function check_id() {
                window.open("member_check_id.php?id=" + document.member_form.id.value,
                        "IDcheck",
                        "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
            }
        </script>
    </head>
    <body> 
        <header>
            <?php include "header.php"; ?>
        </header>
        <section>
            <div id="main_img_bar">
                <img src="./img/main_img.png">
            </div>
            <div id="main_content">
                <div id="join_box">
                    <form  name="member_form" method="post" action="member_insert.php" enctype="multipart/form-data">
                        <h2>회원 가입</h2>
                        <div class="form id">
                            <div class="col1">아이디</div>
                            <div class="col2">
                                <input type="text" name="id">
                            </div>  
                            <div class="col3">
                                <a href="#"><img src="./img/check_id.gif" 
                                                 onclick="check_id()"></a>
                            </div>                 
                        </div>
                        <div class="clear"></div>

                        <div class="form">
                            <div class="col1">비밀번호</div>
                            <div class="col2">
                                <input type="password" name="pass">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">비밀번호 확인</div>
                            <div class="col2">
                                <input type="password" name="pass_confirm">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">이름</div>
                            <div class="col2">
                                <input type="text" name="name">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form email">
                            <div class="col1">이메일</div>
                            <div class="col2">
                                <input type="text" name="email1">@<input type="text" name="email2">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">핸드폰</div>
                            <div class="col2">
                                <input type="text" name="phone">
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form" style="height: 120px">
                            <div class="col1">주소</div>
                            <div class="col2">
                                <textarea style="height: 100px" cols="54" rows="10" name="address" onchange="chk_line(this)"></textarea>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form" style="height: 120px;">
                            <div class="col1">가입인사 및 자기소개</div>
                            <div class="col2">
                                <textarea style="height: 100px" cols="54" rows="10" name="introduce" onchange="chk_line(this)"></textarea>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">성별</div>
                            <div class="col2">
                                <div style="display: flex; align-items: center">
                                    <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="gender" value="남">남</label>
                                    <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="gender" value="여">여</label>
                                </div>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">뮤지션 여부</div>
                            <div class="col2">
                                <div style="display: flex; align-items: center">
                                    <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="musicion" value="yes">예</label>
                                    <label style="margin-right: 10px"><input style="width: 30px" type="radio" name="musicion" value="no">아니요</label>
                                </div>
                            </div>                 
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">취미 관심분야</div>
                            <div class="col2">
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="재즈">재즈</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="POP">POP</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="K-POP">K-POP</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="J-POP">J-POP</label>
                                <br>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="발라드">발라드</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="클래식">클래식</label>
                                <label style="margin-right: 10px"><input style="width: 30px; height: 15px;" type="checkbox" name="hobby[]" value="R&B">R&B</label>
                            </div>                
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">대표 이미지</div>
                            <div class="col2">
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

