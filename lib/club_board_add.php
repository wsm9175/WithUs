<?session_start();
      if(!isset($_SESSION['username'])) {
            echo "<script>location.replace('../index.php');</script>";
      }
      else {
            $email = $_SESSION['username'];
            $name = $_SESSION['name'];
            $school_uid = $_SESSION['school_uid'];
            // echo "<script>location.replace('./lib/main.php');</script>";
      }
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
    <html>
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
            <link rel="stylesheet" type="text/css" href="/css/main.css">
            <link rel="stylesheet" type="text/css" href="/css/menu_club-1.css">
            <link rel="stylesheet" type="text/css" href="/css/club_board_add.css">
            <title></title>
        </head>
        <body>
            <?
                  $club_id = $_GET['club_id'];
                  $select_name = $_GET['club_name'];
                  $select_register = $_GET['is_register'];
                  $is_admin = $_GET['is_admin'];
                  
                  $GLOBALS['select_name'] = $select_name;
                  $GLOBALS['select_id'] = $club_id;
                  $GLOBALS['select_register'] =  $select_register;

                  include "./db/dbconn.php";

                  class Board{
                    public $id, $club_id, $email, $title, $date, $content,$img_uid;
                  }

                     // $sql = "SELECT * FROM `board` WHERE club_id = $club_id";

                  // $result = mysqli_query($connect, $sql);
                
            ?>
            <div id='contents'>
                <div id="header">
                    <? include "./menu/top_menu_club_detail.php"; ?>
                </div>
                <div id="menu">
                    <? include "./menu/top_menu_club.php"; ?>
                </div>
                <form method="post" action="./board_submit/board_submit.php?club_id=<?echo $club_id;?>&club_name=<?echo $select_name;?>&is_register=<?echo $select_register;?>" class="loginForm">
                    <div id="write" class="mx-auto">
                        <div class="input">
                            <input type="text" class="input_title" name="title" placeholder="제목을 입력하세요"/>
                        </div>
                        <div class="input">
                            <input
                                type="textarea"
                                class="input_form"
                                name="contents"
                                placeholder="본문 내용을 입력하세요."/>
                        </div>
                        <div class="btn_submit">
                            <button
                                type="submit"
                                class="btn btn-success btn_submit button"
                                onclick="button()">올리기</button>
                        </div>
                    </div>
                </form>
            </div>
        </body>
    </html>