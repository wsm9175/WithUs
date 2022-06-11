<?session_start();
   include "../db/dbconn.php";
      
      //login.php에서 입력받은 id, password
      $username = $_POST['email'];
      $userpass = $_POST['pw'];
      
      $sql = "SELECT * FROM user WHERE email = '$username' AND password = '$userpass'";
      $result = mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($result);
      
      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['username'] = $row['email'];
         $_SESSION['name'] = $row['name'];
         $_SESSION['school_uid'] = $row['shcool_uid'];
         $_SESSION['major'] = $row['major'];
         $_SESSION['phone_number'] = $row['phone_number'];
         $_SESSION['school_id'] = $row['school_id'];
         $_SESSION['nickname'] = $row['nickname'];
         echo "<script>location.replace('../main.php');</script>";
         exit;
      }
      
      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('이메일 및 비밀번호를 확인해주세요')</script>";
         echo "<script>location.replace('../../index.php');</script>";
         exit;
      }
      ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body></body>
</html>