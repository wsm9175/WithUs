<?
   $connect = mysqli_connect("localhost","wsm9175","z1x2c3z1x2c3!","wsm9175");
    mysqli_query($connect,'SET NAMES utf8');

   if ($connect->connect_error) {
      die("연결 실패 : " .$conn->connect_error); // 연결 실패 시 원인을 출력한다
   }
   mysqli_query($connect, "set session character_set_connection=utf8;");
   mysqli_query($connect, "set session character_set_results=utf8;");
   mysqli_query($connect, "set session character_set_client=utf8;");
?>