<?session_start();
      include "../db/dbconn.php";
      
      //login.php에서 입력받은 id, password
      $club_id = $_GET['club_id'];
      $club_name = $_GET['club_name'];
      $is_register = $_GET['is_register'];
      $select_name = $_GET['club_name'];

    
      $title = $_POST['title'];
      $contents = $_POST['contents'];

      class Board{
            public $id, $club_id, $email,$nickname, $title, $date, $contents,$img_uid;
      }
      
      $board = new Board;

      $board->club_id = $club_id;
      $board->email = $_SESSION['username'];
      $board->title = $title;
      $board->date = date("Y-m-d H:i:s");
      $board->contents = $contents;
      $board->nickname=$_SESSION['nickname'];
      
      $sql = "INSERT INTO `board` (club_id, email,nickname, title, date, content) ";
      $sql .= "VALUES ('$board->club_id','$board->email','$board->nickname','$board->title','$board->date','$board->contents')";
      $result = mysqli_query($connect, $sql);

      if ($result === false) {
            echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
            echo mysqli_error($connect);
        } else {
        ?>
            <script>
                alert("게시물 등록이 완료되었습니다");
                location.href = "../club_board.php?club_id=<?echo $club_id;?>&club_name=<?echo $club_name;?>&is_register=<?echo $is_register;?>";
            </script>
        <?php
        }
      ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
    </body>
</html>