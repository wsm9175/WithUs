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
            <link rel="stylesheet" type="text/css" href="/css/club_photo.css">
            <title></title>
        </head>
        <body>
            <?
                  include "./db/dbconn.php";

                  $club_id = $_GET['club_id'];
                  $club_name = $_GET['club_name'];
                  $is_register = $_GET['is_register'];
                  $is_admin = $_GET['is_admin'];

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
                <?
                    if($GLOBALS['select_register'] == 0){
                        echo '<form name="reqform" method="post" action="./club_photo_add.php?club_id='.$club_id.'&club_name='.$club_name.'&is_register='.$is_register.'&is_admin='.$is_admin.'&email='.$email.'" enctype="multipart/form-data">'; 
                        echo '<input type="file" name="imgFile" /><br>';
                        echo '<input type="submit" value="업로드" />';
                        echo '</form>';
                    }
                ?>
                <div id = photo_list>
                    <?
                        $sql = "SELECT * FROM `photo_list` WHERE club_id = $club_id ORDER BY `date` DESC";
                        $result = mysqli_query($connect, $sql);

                        class Photo{
                            public $id, $club_id, $email, $img, $date;
                        }
                        
                        $photo_list = array();

                        if($result != null){
                            while ($row = mysqli_fetch_array($result)){
                                $photo = new Photo;
    
                                $photo->id = $row['id'];
                                $photo->club_id = $row['club_id'];
                                $photo->email = $row['email'];
                                $photo->img = $row['img'];
                                $photo->date = $row['date'];
                                array_push($photo_list, $photo);
                            }
                        }

                        if($photo_list !=null){
                            $i =0;
                            while($i<count($photo_list)){
                                echo '<div id="photo">';
                                echo '<p id="writer">'.$photo_list[$i]->email.'</p>';
                                echo '<p id="writer">'.$photo_list[$i]->date.'</p>';
                                echo '<img src="data:image/png;base64,' .base64_encode( $photo_list[$i]->img) . '" class = "photo_object rounded block"/>';
                                echo '</div>';
                                $i++;
                            }

                        }

                    ?>
                </div>

            </div>
        </body>
    </html>