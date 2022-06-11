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
            <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <!-- BootStrap 이용함 -->
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
                crossorigin="anonymous"/>
            <link rel="stylesheet" type="text/css" href="/css/main.css">
            <link
                rel="stylesheet"
                href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <link
                rel="stylesheet"
                href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

            <title>With Us</title>

            <script>
                $(function () {
                    $('.mainSlide').slick({
                        autoplay: false, slidesToShow: 5, slidesToScroll: 1, dotsClass: "slick-dots", //아래 나오는 페이지네이션(점) css class 지정
                        draggable: true, //드래그 가능 여부
                        // responsive: [     {  반응형 웹 구현 옵션         breakpoint: 960, 화면 사이즈 960px
                        // settings: {             위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경 slidesToShow: 3 }     },
                        // {         breakpoint: 768, 화면 사이즈 768px settings: {             위에 옵션이 디폴트 ,
                        // 여기에 추가하면 그걸로 변경 slidesToShow: 2         }     } ]
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3,
                                    arrows: false
                                }
                            }, {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 3,
                                    arrows: false
                                }
                            }
                        ]
                    });
                })
            </script>
        </head>
        <body>
            <div id='contents'>
                <div id="header">
                    <? include "./menu/top_menu1.php"; ?>
                </div>
                <?php
                    include "./db/dbconn.php";
                    $sql = "SELECT * FROM `club` WHERE school_uid = $school_uid";
                    $result = mysqli_query($connect, $sql);

                    //class 선언을 통해 동아리 목록 정리

                    class Club{
                        public $id,$admin, $name, $school_uid, $category, $memberCount, $member_uid,$is_recruitment, $title_img, $is_register, $promotion_img,$explanation;
                    }
                    
                    $club_list = array();

                    if($result != null){
                        while ($row = mysqli_fetch_array($result)){
                            $club = new Club;

                            $club->id = $row['id'];
                            $club->admin = $row['admin'];
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
                            array_push($club_list, $club);
                        }
                    }
                ?>
                <div class="myclub">
                    <div class="menu">
                        <h2>내 동아리</h2>
                    </div>
                    <div class="mainSlide">
                    <?php
                            if($club_list == null){
                                // 학교에 등록된 동아리가 없으므로 기본 이미지 출력
                            }else{
                                $i = 0;
                                $my_club = array();
                                while($i<count($club_list)){
                                    $club_list_member = $club_list[$i]->member_uid;
                                    $club_member_list = explode(",", $club_list_member);
                                    $j = 0;
                                    while($j < count($club_member_list)){
                                        $club_member = $club_member_list[$j];
                                        if($club_member  == $email){
                                            $club_list[$i]->is_register = 0;
                                            array_push($my_club, $club_list[$i]);
                                            break;
                                        }
                                        $j++;
                                    }
                                    $i++;
                                }
                                $f = 0;
                                if($my_club != null){
                                    while($f < count($my_club)){        
                                        // echo"<img src='".$my_club[$f]->title_img."'class='slide_object'>";
                                        // echo '<img src="data:image/png;base64,' .base64_encode( $my_club[$f]->title_img) . '" class = "slide_object" />';
                                        $club_id = $my_club[$f]->id;
                                        $club_name = $my_club[$f]->name;
                                        $is_register = $my_club[$f]->is_register;
                                        global $is_admin;
                                        if($email == $my_club[$f]->admin){
                                            $is_admin = 0;
                                        }else{
                                            $is_admin = 1;
                                        }
                                        // echo '<a href=./club_board.php?club_id='.$club_id.'> <img src="data:image/png;base64,' .base64_encode($my_club[$f]->title_img) . '" class = "slide_object" /> </a>';
                                        echo '<img src="data:image/png;base64,' .base64_encode( $my_club[$f]->title_img) . '" class = "slide_object rounded block" onclick="location.href=\'./club_board.php?club_id='.$club_id.'&club_name='.$club_name.'&is_register='.$is_register.'&is_admin='.$is_admin.'\'"/>';
                                    
                                        $f++;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="myclub">
                    <div class="menu">
                        <h2>모집중인 동아리</h2>
                    </div>
                    <div class="mainSlide">
                    <?php
                            if($club_list == null){
                                // 학교에 등록된 동아리가 없으므로 기본 이미지 출력
                            }else{
                                $i = 0;
                                $my_club = array();
                                while($i<count($club_list)){
                                    $is_recruitment = $club_list[$i]->is_recruitment;
                                    if($is_recruitment == 0){
                                        array_push($my_club, $club_list[$i]);
                                    }
                                    $i++;
                                }
                                $f = 0;
                                if($my_club != null){
                                    while($f < count($my_club)){
                                        // echo"<img src='".$my_club[$f]->title_img."'class='slide_object'>";
                                        $club_id = $my_club[$f]->id;
                                        $club_name = $my_club[$f]->name;
                                        $is_register = $my_club[$f]->is_register;
                                        echo '<img src="data:image/png;base64,' .base64_encode( $my_club[$f]->promotion_img) . '" class = "slide_object rounded block" onclick="location.href=\'./club_application.php?club_id='.$club_id.'&club_name='.$club_name.'&is_register='.$is_register.'\'"/>';
                                        $f++;
                                    }
                                }
                            }

                        ?>
                    </div>
                </div>
                <div class="myclub">
                    <div class="menu">
                        <h2>우리 학교 동아리</h2>
                    </div>
                    <div class="mainSlide">
                    <?php
                            if($club_list == null){
                                // 학교에 등록된 동아리가 없으므로 기본 이미지 출력
                            }else{
                                $i = 0;
                                while($i<count($club_list)){
                                        $club_id = $club_list[$i]->id;
                                        $club_name = $club_list[$i]->name;
                                        $is_register = $club_list[$i]->is_register;
                                        echo '<img src="data:image/png;base64,' .base64_encode( $club_list[$i]->title_img) . '" class = "slide_object rounded block" onclick="location.href=\'./club_board.php?club_id='.$club_id.'&club_name='.$club_name.'&is_register='.$is_register.'&is_admin='.$is_admin.'\'"/>';
                                    $i++;
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </body>
    </html>