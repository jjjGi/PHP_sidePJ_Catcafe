<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  unset($_SESSION["usergameresult"]);
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
