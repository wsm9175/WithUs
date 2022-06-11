<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
      include "../db/dbconn.php";

      $email = $_POST['email'];
	// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$password = $_POST['password'];
      $nickname = $_POST['nickname'];
	$school = $_POST['school'];
	$name = $_POST['name'];
	$schoolId = $_POST['schoolId'];
      $major = $_POST['major'];
      $phoneNumber = $_POST['phoneNumber'];

      // $sql = "INSERT INTO `user` (email,password) ";
      // $sql .= "VALUES ('$email','$password')";

      $sql = "INSERT INTO `user` (email,password,name,shcool_uid,major,phone_number,school_id,nickname) ";
      $sql .= "VALUES ('$email','$password','$name','$school','$major','$phoneNumber',$schoolId,'$nickname')";
      
      $result = mysqli_query($connect, $sql);
 
      if ($result === false) {
            echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
            echo mysqli_error($connect);
        } else {
        ?>
            <script>
                alert("회원가입이 완료되었습니다");
                location.href = "../../index.php";
            </script>
        <?php
        }
        ?>
?>
