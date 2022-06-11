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
            if($_GET['is_register'] == 1){
                echo '<script>alert("해당 동아리 멤버만 접근 가능합니다."); location.replace("./main.php");</script>';
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
            <link rel="stylesheet" type="text/css" href="/css/menu_club-1.css">
            <link rel="stylesheet" type="text/css" href="/css/club_member.css">
            <title></title>
        </head>
        <body>
            <?
                  $club_id = $_GET['club_id'];
                  
                  include "./db/dbconn.php";

                  $sql = "SELECT * FROM `application_form` WHERE club_id = $club_id";

                  $result = mysqli_query($connect, $sql);

                  class ApplicationForm{
                      public $id, $club_id, $email, $name, $phoneNumber;
                  }

                $form_list = array();

                if($result != null){
                    while ($row = mysqli_fetch_array($result)){
                        $form = new ApplicationForm ;

                        $form->id = $row['id'];
                        $form->club_id = $row['club_id'];
                        $form->email = $row['email'];
                        $form->name = $row['name'];
                        $form->phoneNumber = $row['phoneNumber'];

                        array_push($form_list, $form);
                    }
                }
                $sql = "SELECT * FROM `club` WHERE id = $club_id";
                $result = mysqli_query($connect, $sql);

                class Club{
                    public $id, $name, $school_uid, $category, $memberCount, $member_uid,$is_recruitment, $title_img, $is_register, $promotion_img,$explanation;
                }

                $club = new Club;
                global $member_list;

                if($result != null){
                    while ($row = mysqli_fetch_array($result)){

                        $club->member_uid = $row['member_uid'];
                        $member_list = explode(",", $club->member_uid);
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
                <div id="list">
                    <div id="application_list">
                        <?
                            if($form_list != null && $GLOBALS['is_admin'] == 0){
                                echo '<h2 class="title">동아리 신청자</h2>';
                                $i = 0;
                                while($i <count($form_list)){
                                    echo '<div class="applicant">';
                                    echo '<p class="info">'.$form_list[$i]->name.'</p>';
                                    echo '<p class="info">'.$form_list[$i]->phoneNumber.'</p>';
                                    echo '</div>';   
                                    $i++;
                                }
                            }
                        ?>
                    </div>
                    <div id="member_list">
                            <?
                                include "./db/dbconn.php";
                                if($member_list != null){
                                    $i = 0;
                                    echo '<h2 class="title">동아리 멤버</h2>';
                                    while($i <count($member_list)){
                                        $email = $member_list[$i];
                                        $num = $i+1;
                                        $print = strval($num)." ".$email;
                                        echo '<div class="applicant">';
                                        echo '<p class="info">'.$print.'</p>';

                                        $sql = "SELECT * FROM `user` WHERE email = $email";
                                        $result = mysqli_query($connect, $sql);

                                        global $member_name;
                                        if($result != null){
                                            while ($row = mysqli_fetch_array($result)){
                                                $member_name = $row['name'];
                                            }
                                        }
                                        // echo '<p class="info">'.$member_name.'</p>';
                                        echo '</div>';   
                                        $i++;
                                    }
                                }
                            ?>
                    </div>
                </div>
            </div>
        </body>
    </html>