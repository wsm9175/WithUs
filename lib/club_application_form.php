<?session_start();
      if(!isset($_SESSION['username'])) {
            echo "<script>location.replace('../index.php');</script>";
      }
      else {
            $email = $_SESSION['username'];
            $name = $_SESSION['name'];
            $school_uid = $_SESSION['school_uid'];
            $phoneNumber = $_SESSION['phone_number'];
            $club_id = $_GET['club_id'];
            $club_name = $_GET['club_name'];
            $is_register = $_GET['is_register'];

            if($is_register == 0){
                  echo '<script>alert("이미 등록된 회원입니다.");location.replace("./main.php");</script>';
                  echo "<script>location.replace('./main.php');<script>";
            }

            include "./db/dbconn.php";

            $sql = "INSERT INTO `application_form` (club_id, email, name, phoneNumber) ";
            $sql .= "VALUES ('$club_id','$email','$name','$phoneNumber')";

            $result = mysqli_query($connect, $sql);

            if ($result === false) {
                  echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
                  echo mysqli_error($connect);
                  echo 'location.href = "./main.php";</script>';
              } else {
                    echo '<script> alert("신청이 완료되었습니다"); location.href = "./main.php";</script>';
            }
      }
?>