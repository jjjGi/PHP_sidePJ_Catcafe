<?php
    $id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
          
    $con = mysqli_connect("localhost", "root", "", "20193184");
    mysqli_query($con,"set names utf8");

    $sql = "update members set pass='$pass', name='$name' , email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

/////////////////////////////////////////////////////////////////////////////////////////수정(게시판에도 이름 바뀌도록.) 
    $sql = "update board set  name='$name' where id='$id' ";
    mysqli_query($con, $sql);




/////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////
  session_start();                              //11주차 강의중 회원수정하면 안바뀌는 문제 해결 
  unset($_SESSION["userid"]);                   //해결방법= 세션을 unset하고 다시 세션 맺기 
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  unset($_SESSION["usergameresult"]);


    $sql = "select * from members where id='$id'";  //수정된 id를 가진사람 찾음 
    $result = mysqli_query($con, $sql);             

    $row = mysqli_fetch_array($result);             //이미 로그인된 상태에서 수정된 id를 바로 쓰는거니까 확인할 필요없이 바로 속성을 가져온다. 


    mysqli_close($con);  
    $_SESSION["userid"] = $row["id"];               //세션을 다시 맺는다. 
    $_SESSION["username"] = $row["name"];
    $_SESSION["userlevel"] = $row["level"];
    $_SESSION["userpoint"] = $row["point"];
    $_SESSION["usergameresult"] = $row["game_result"];       
///////////////////////////////////////////////////////////////////////////////////////////////
    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
