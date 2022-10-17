<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if ( $userlevel != 1 )
    {   ///////////////////////////////////////////////location.href = 'index.php';로 수정. 원래는 history.go(-1)로 되어있었는데 관리자 자신이 자신을 관리자가 아니도록 고칠 시 메인페이지로 이동. 
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            location.href = 'index.php';
            </script>
        ");
        exit;
    }

    $num   = $_GET["num"];
    $level = $_POST["level"];
    $point = $_POST["point"];

    $con = mysqli_connect("localhost", "root", "", "20193184");
    mysqli_query($con,"set names UTF8");
    $sql = "update members set level=$level, point=$point where num=$num";
    mysqli_query($con, $sql);

///////////////////////////////////////////////////////////////////수정(관리자모드 refresh)
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";                   
    if ( $userid == "" )            //예상치못한 상황을 대비하기위해서.
    {
        echo("
            <script>
            alert('다시 로그인해주세요!');
            location.href = 'index.php';
            </script>
        ");
        mysqli_close($con);          
        exit;                                                //중단
    }
    else{
        $sql = "select * from members where id='$userid'";       
        $result=mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if($num==$row["num"]){                               //자신의 포인트와 레벨을 수정했을 때만 해당 세션을 다시 맺는다. 
            unset($_SESSION["userlevel"]);
            unset($_SESSION["userpoint"]);
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];
        }
    }
///////////////////////////////////////////////////////////////////

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

