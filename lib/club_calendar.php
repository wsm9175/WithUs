<?session_start();
      if(!isset($_SESSION['username'])) {
            echo "<script>location.replace('../index.php');</script>";
      }
      else {
            $email = $_SESSION['username'];
            $name = $_SESSION['name'];
            $school_uid = $_SESSION['school_uid'];
            $GLOBALS['select_name'] =  $_GET['club_name'];
            $GLOBALS['select_id'] = $_GET['club_id'];
            $GLOBALS['select_register'] = $_GET['is_register'];
            $GLOBALS['is_admin'] = $_GET['is_admin'];
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
            <title></title>
        </head>
        <body>
            <?
                  include "./db/dbconn.php";

                  $club_id = $_GET['club_id'];

                  $sql = "SELECT * FROM `club` WHERE school_uid = $club_id";

                  $result = mysqli_query($connect, $sql);

            ?>

            <div id='contents'>
                <div id="header">
                    <? include "./menu/top_menu_club_detail.php"; ?>
                </div>
                <div id="menu">
                    <? include "./menu/top_menu_club.php"; ?>
                </div>
                <div id="board_list">

                </div>
                <?php
                  
                ?>

            </div>
        </body>
    </html>