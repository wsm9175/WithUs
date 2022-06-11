<?
  session_start();
  unset($_SESSION['name']);
  unset($_SESSION['username']);
  unset($_SESSION['school_uid']);
  unset($_SESSION['major']);
  unset($_SESSION['phone_number']);
  unset($_SESSION['school_id']);
  unset($_SESSION['nickname']);


  echo("
       <script>
          location.href = '../../index.php'; 
         </script>
       ");
?>
