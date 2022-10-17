<?php
session_start();
$pass=$_POST["pass"];

if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";

if($userid==""){
    echo "다시 로그인 해주세요";

}

 else{
    $con = mysqli_connect("localhost", "root", "", "20193184");
    $sql = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if($pass!=$row["pass"]){
        echo "<script>
            alert('비밀번호가 맞지 않습니다! 비밀번호를 다시 입력하세요');
            history.go(-1)
            </script>";

    }
    else{
                    $sql = "select * from board where id = '$userid'";
                    $result = mysqli_query($con, $sql);

                    while( $row = mysqli_fetch_array($result)){                //게시판 첨부파일 삭제 
                        $copied_name = $row["file_copied"];

                        if ($copied_name)
                        {
                            $file_path = "./data/".$copied_name;
                            unlink($file_path);
                        }

                    }
    
                    $sql = "delete from board where id = '$userid'";            
                    mysqli_query($con, $sql);                                   //게시판 삭제

                    $sql = "delete from sendmessage where send_id = '$userid'";
                    mysqli_query($con, $sql);                                   //탈퇴회원이 보낸 쪽지함 삭제 

                    $sql = "delete from receivemessage where rv_id = '$userid'";
                    mysqli_query($con, $sql);                                   //탈퇴회원이 받은 쪽지함 삭제


                    $sql = "delete from members where id = '$userid'";

                    mysqli_query($con, $sql);

                    echo"<script>
                    opener.location.href = 'logout.php'; 
                    javascript:self.close();
                    </script>";

                }
        mysqli_close($con);                  
   
    }               

?>
