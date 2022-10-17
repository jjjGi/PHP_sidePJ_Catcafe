<?php
/////////////////////////////////////////////////////////////////////////////////로그아웃이 되었을 시 수정 
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";


    ///////////////////////////////////////////////////////////////////////////////////
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "root", "", "20193184");
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
///////////////////////////////////////////////////////////////////////////////////////////로그아웃이 되었을 시 
    if($userid!= $row["id"]){
         echo("
                    <script>
                    alert('게시판 삭제는 본인만 가능합니다. 재로그인 해주세요!');
                    location.href = 'board_list.php?page=$page';
                    </script>
        ");
         mysqli_close($con);
                exit;
    }
////////////////////////////////////////////////////////////////////////////////////////////////
    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from board where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>

