<?session_start();
      if(!isset($_SESSION['username'])) {
            echo "<script>location.replace('../index.php');</script>";
      }
      else {
            $email = $_SESSION['username'];
            $name = $_SESSION['name'];
            $nickName = $_SESSION['nickname'];
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
            <link rel="stylesheet" type="text/css" href="/css/club_board.css">
            <title></title>
        </head>
        <body>
            <?
                  include "./db/dbconn.php";
                
                $club_id = $_GET['club_id'];
                $select_name = $_GET['club_name'];
                $select_register = $_GET['is_register'];

                  $sql = "SELECT * FROM `board` WHERE club_id = $club_id ORDER BY `date` DESC";

                  $result = mysqli_query($connect, $sql);

                  class Board{
                    public $id, $club_id, $email, $title, $date, $content,$img_uid;
                }
                
                $board_list = array();

                if($result != null){
                    while ($row = mysqli_fetch_array($result)){
                        $board = new Board;

                        $board->id = $row['id'];
                        $board->club_id = $row['name'];
                        $board->email = $row['email'];
                        $board->nickname = $row['nickname'];
                        $board->title = $row['title'];
                        $board->date = $row['date'];
                        $board->content = $row['content'];
                        $board->img_uid = $row['img_uid'];

                        array_push($board_list, $board);
                    }
                }
            ?>
            <div id='contents'>
                <div id="header">
                    <? include "./menu/top_menu_club_detail.php"; ?>
                </div>
                <div id="menu">
                    <? include "./menu/top_menu_club.php"; ?>
                </div>
                <?
                    if($GLOBALS['select_register'] == 0){
                        echo '<div id="board_plus onclick="location.href=\'./club_board_add.php?club_id='.$club_id.'&club_name='.$select_name.'&is_register='.$is_register.'&is_admin='.$is_admin.'\'">';
                        echo '<p onclick="location.href=\'./club_board_add.php?club_id='.$club_id.'&club_name='.$select_name.'&is_register='.$is_register.'&is_admin='.$is_admin.'\'">새로운 글을 작성해보세요</p>';
                        echo '</div>';
                    }
                
                ?>
                <div id="board_list">
                    <?
                        if($board_list == null){
                            // 동아리의 게시판이 하나도 없는 경우
                        }else{
                            // 동아리의 게시판이 하나 이상인 경우
                            $i = 0;
                            while($i<count($board_list)){
                                echo'<div class ="board">';
                                echo '<p>'.$board_list[$i]->nickname.'</p>';
                                echo '<p>'.$board_list[$i]->date.'</p>';
                                echo '<p>'.$board_list[$i]->title.'</p>';
                                echo '<p>'.$board_list[$i]->content.'</p>';
                                echo'</div>';
                                $i++;
                            }
                        }
                    ?>
                </div>
                <?php
                ?>
            </div>
        </body>
    </html>