<meta charset='utf-8'>
<?php
    $send_id = $_GET["send_id"];

    $rv_id = $_POST['rv_id'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	if(!$send_id) {						//세션이 해지되었을때 
		echo("
			<script>
			alert('로그인 후 이용해 주세요! ');
			history.go(-1)
			</script>
			");
		exit;
	}

	$con = mysqli_connect("localhost", "root", "", "20193184");
	mysqli_query($con,"set names UTF8");
	$sql = "select * from members where id='$rv_id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);

	if($num_record)
	{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////송신쪽지함 수신쪽지함 따로 한 이후 수정 

		$sql = "insert into sendmessage (send_id, rv_id, subject, content,  regist_day) ";						//송신쪽지함에 넣음 
		$sql .= "values('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

		$sql = "insert into receivemessage (send_id, rv_id, subject, content,  regist_day) ";					//수신쪽지함에 넣음 
		$sql .= "values('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	} else {
		echo("
			<script>
			alert('해당 회원이 탈퇴되었거나 수신 아이디가 잘못 되었습니다!');
			history.go(-1)
			</script>
			");
		mysqli_close($con);												/////////////////////// 수정 
		exit;
	}

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'message_box.php?mode=send';
	   </script>
	";
?>

  
