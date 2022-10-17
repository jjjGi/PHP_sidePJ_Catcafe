<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    ///////////////////////////////////////////////////////////////////////자기자신을 퇴출시켰을때 수정 하기위해 
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    ///////////////////////////////////////////////////////////////////////
    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
                exit;
    }

    $num   = $_GET["num"];
    $id    = $_GET["id"];                   //관리자 권한으로 삭제시 추가 수정 
    $con = mysqli_connect("localhost", "root", "", "20193184");
    ////////////////////////여기서부터 이어서하기///////////////////퇴출 회원이 작성한 게시판, 송,수신쪽지 삭제 수정 
    $sql = "select * from board where id = '$id'";
    $result = mysqli_query($con, $sql);

    while( $row = mysqli_fetch_array($result) ){                //게시판 첨부파일 삭제 
        $copied_name = $row["file_copied"];

        if ($copied_name)
        {
            $file_path = "./data/".$copied_name;
            unlink($file_path);
        }

    }
    
    $sql = "delete from board where id = '$id'";            
    mysqli_query($con, $sql);                                   //게시판 삭제

    $sql = "delete from sendmessage where send_id = '$id'";
    mysqli_query($con, $sql);                                   //탈퇴회원이 보낸 쪽지함 삭제 

    $sql = "delete from receivemessage where rv_id = '$id'";
    mysqli_query($con, $sql);                                   //탈퇴회원이 받은 쪽지함 삭제

/////////////////////////////////////////////////////////////////
    $sql = "delete from members where num = $num";

    mysqli_query($con, $sql);
  
    mysqli_close($con);
  //////////////////////////////////////////////////////////////////자기자신을 퇴출시킬시 로그아웃. 수정 
    if($userid==$id){
        echo "
         <script>
             location.href = 'logout.php';
         </script>
       ";
    }
    else{
        echo "
         <script>
             location.href = 'admin.php';
         </script>
       ";
    }
    ////////////////////////////////////////////////////////////////
?>

