<?php
/////////////////////////////////////////////////////////////////////////////////로그아웃이 되었을 시 수정 
    session_start();
	if (isset($_SESSION["userid"])) 
		$userid = $_SESSION["userid"];
	else 
		$userid = "";

	$filename_origin = "";
	$filename_copy = "";

    ///////////////////////////////////////////////////////////////////////////////////
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "root", "", "20193184");;
    mysqli_query($con,"set names UTF8");
///////////////////////////////////////////////////////////////////////////////////////////로그아웃이 되었을 시 
    $sql = "select id, file_name, file_copied  from board where num = $num";
    $result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	
	$filename_origin = $row["file_name"];
	$filename_copy = $row["file_copied"];


    if($userid!= $row["id"]){
        
         echo("
                    <script>
                    alert('게시판 수정은 본인만 가능합니다. 재로그인 해주세요!');
                    location.href = 'board_list.php?page=$page';
                    </script>
        ");
         mysqli_close($con);
                exit;
    }
////////////////////////////////////////////////////////////////////////////////////////////////


// File upload 후 update 추가
 $upload_dir = './data/';

	$upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
    $upfile_error    = $_FILES["upfile"]["error"];
    
    // print_r $_FILES["upfile"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				mysqli_close($con);
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				mysqli_close($con);
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
    }

// file_name, file_type, file_copied update 파일이 있을 경우 수정
    $sql = "update board set subject='$subject', content='$content' ";

    if($upfile_name != ""){

		if($filename_copy!= null){
			unlink($upload_dir.$filename_copy);
		}
        $sql .= ", file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name'";
	}

    $sql .= " where num=$num";

    mysqli_query($con, $sql);
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'board_list.php?page=$page';
	      </script>
	  ";
?>

   
