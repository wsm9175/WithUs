<?session_start();
      if(!isset($_SESSION['username'])) {
            // echo "<script>location.replace('index.php');</script>";
      }
      else {
            $username = $_SESSION['username'];
            $name = $_SESSION['name'];
            echo "<script>location.replace('./lib/main.php');</script>";
      }
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <!-- 반응형 웹을 위한 세팅 -->
        <meta
            name="viewport"
            content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width"/>
        <title>With Us</title>
        <!-- BootStrap 이용함 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap"
            rel="stylesheet">
        <!-- css 파일 연결 -->
        <link rel="stylesheet" type="text/css" href="/css/index.css">
    </head>
    <body>
        <div id="contents">
            <header id="title">
                <img
                    src="/img/index_header.png"
                    alt="index_header"
                    id="index_header"
                    class="mx-auto index_header">
                <div id="name">
                    <div class="index_title">
                        <img
                            src="/img/icon_index.png"
                            alt="indexIcon"
                            id="index_icon"
                            class="mx-auto icon_index">
                    </div>
                </div>
            </header>
            <div class="hr-sect">
                <p>로그인</p>
            </div>
            <form method="post" action="./lib/login/check_login.php" class="loginForm">
                <div id="input_account" class="mx-auto">
                    <div class="input">
                        <input type="text" class="input_form" name="email" placeholder="아이디를 입력하세요"/>
                    </div>
                    <div class="input">
                        <input
                            type="password"
                            class="input_form input_pw"
                            name="pw"
                            placeholder="비밀번호를 입력하세요"/>
                    </div>
                    <div class="btn_login">
                        <button
                            type="submit"
                            class="btn btn-success btn_submit button"
                            onclick="button()">로그인</button>
                    </div>
                </div>
            </form>
            <div class="signin">
                <p class="question">회원이 아니신가요?</p>
                <p onclick="document.location.href='./lib/signup.php'">회원가입 하기</p>
            </div>
        </div>
    </body>
</html>