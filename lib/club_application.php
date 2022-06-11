<?session_start();
      if(!isset($_SESSION['username'])) {
            echo "<script>location.replace('../index.php');</script>";
      }
      else {
            $email = $_SESSION['username'];
            $name = $_SESSION['name'];
            $school_uid = $_SESSION['school_uid'];
            $club_id = $_GET['club_id'];
            $club_name = $_GET['club_name'];
            $is_register = $_GET['is_register'];

            if($is_register == 0){
                  echo '<script>alert("이미 등록된 회원입니다.");location.replace("./main.php");</script>';
                  echo "<script>location.replace('./main.php');<script>";
            }
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
            <link rel="stylesheet" type="text/css" href="/css/club_application.css">
            <title></title>
        </head>
        <body>
            <?
      
                  include "./db/dbconn.php";

                  $sql = "SELECT * FROM `club` WHERE id = $club_id";

                  $result = mysqli_query($connect, $sql);

                  class Club{
                        public $id, $name, $school_uid, $category, $memberCount, $member_uid,$is_recruitment, $title_img, $is_register, $promotion_img;
                  }

                  $club = new Club;

                  if($result != null){
                        while ($row = mysqli_fetch_array($result)){
                            $club->id = $row['id'];
                            $club->name = $row['name'];
                            $club->school_uid = $row['school_uid'];
                            $club->category = $row['category'];
                            $club->memberCount = $row['memberCount'];
                            $club->member_uid = $row['member_uid'];
                            $club->is_recruitment = $row['is_recruitment'];
                            $club->title_img = $row['title_img'];
                            $club->is_register = 1;
                            $club->promotion_img = $row['promotion_img'];
                            $club->explanation = $row['explanation'];
                        }
                  }
            ?>

            <div id='contents'>
                <div id="header">
                    <? include "./menu/top_menu_club_detail.php"; ?>
                </div>
                <div id="club_info">
                    <div id="club_promotion_img">
                        <?echo '<img id="promotion_img" class="rounded block" src="data:image/png;base64,'.base64_encode( $club->promotion_img).'" />';?>
                    </div>
                    <div id="club_title" class="mx-auto">
                        <h2 id="title" class="mx-auto"><?echo $club->name;?></p>
                    </div>
                    <div id="club_explanation">
                        <p id="explanation" class="mx-auto"><?echo $club->explanation;?></p>
                    </div>
                </div>
                <div id="bottom" class="mx-auto">
                    <button
                        class="btn btn-success btn_submit mx-auto"
                        onclick='location.href="./club_application_form.php?club_id=<?echo $club_id?>&club_name=<?echo $club_name?>&is_register=<?echo $is_register?>"'>신청</button>
                </div>
            </div>
        </body>
    </html>