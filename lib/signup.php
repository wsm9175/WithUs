<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
    <!-- 반응형 웹을 위한 세팅 -->
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />
    <title>With Us</title>
    <!-- BootStrap 이용함 -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous">
      <!-- css 파일 연결 -->
      <link rel="stylesheet" type="text/css" href="../css/signup.css">
  </head>
  <body>
        <!-- bootstrap이 적용될 container 정의 -->
            <div id="container">
                  <header id="title">
                        <div class="hr-sect"><p>회원가입</p></div>
                  </header>
                  <form method="post" action="./signup/signup_ok.php">
                        <div id = "input_account" class="mx-auto">
                              <div class = "input">
                                    <input type="text" name = "email" class="input_form" Placeholder="이메일을 입력하세요" />
                              </div>
                              <div class="input">
                                    <input type="text" name = "password" class= "input_form input_pw" Placeholder="비밀번호를 입력하세요"/>                                   
                              </div>
                              <div class="input">
                                    <input type="text" name = "nickname" class= "input_form" Placeholder="사용하실 닉네임을 입력하세요"/>                                   
                              </div>
                              <div class="input">
                                    <input type="text" name = "school" class= "input_form" Placeholder="본인의 학교를 입력하세요"/>                                   
                              </div>
                              <div class="input">
                                    <input type="text" name = "phoneNumber" class= "input_form" Placeholder="휴대폰 번호를 입력하세요"/>                                   
                              </div>
                              <div class="input">
                                    <input type="text" name = "name" class= "input_form" Placeholder="본인의 이름을 입력하세요"/>                                   
                              </div>
                              <div class="input">
                                    <input type="text" name="schoolId" class= "input_form" Placeholder="본인의 학번을 입력하세요"/>                                   
                              </div>
                              <div class="input">
                                    <input type="text" name="major" class= "input_form" Placeholder="본인의 학과를 입력하세요"/>                                   
                              </div>
                              <div class="btn_login">
                                    <button type="submit" class="btn btn-success btn_submit button" onclick="button()">회원가입 완료</button>
                              </div>
                              <div class = "login">
                                    <p class = "question">이미 회원이신가요?</p>
                                    <p onclick="document.location.href='../index.php'">로그인 하기</p>
                              </div>
                        </div>
                  </form>
            </div>

  </body>
</html>