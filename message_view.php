<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고양이 팬카페</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        
    </div>
   	<div id="message_box">
	    <h3 class="title">
<?php
	$mode = $_GET["mode"];
	$num  = $_GET["num"];

	$con = mysqli_connect("localhost", "root", "", "20193184");
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////쪽지 송,수신 나눔 수정 	
	mysqli_query($con,"set names UTF8");

	if ($mode=="send"){
		$sql = "select * from sendmessage where num=$num";
	}
	else{
		$sql = "select * from receivemessage where num=$num";
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$send_id    = $row["send_id"];
	$rv_id      = $row["rv_id"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	if ($mode=="send"){
		$result2 = mysqli_query($con, "select name from members where id='$rv_id'");
	}
	else{
		$result2 = mysqli_query($con, "select name from members where id='$send_id'");
		///////////////////////////////////////////////////////////////////////////////////////////////수신확인 수정 
		$readtime=$row["readtime"];
		if($readtime==NULL){
			$new_readtime=date("Y-m-d (H:i:s)");
			mysqli_query($con, "update receivemessage set readtime='$new_readtime' where num=$num");
			mysqli_query($con, "update sendmessage set readtime='$new_readtime' where num=$num");	
			//쪽지 받은사람이 삭제했을경우를 대비해 sendmessage에도 저장. 이때 각 쪽지들은 num이 고유하기때문에(삭제되어도) num으로 구분 
		}
		//////////////////////////////////////////////////////////////////////////////////////////////// 
	}

	$record = mysqli_fetch_array($result2);
	//////////////////////////////////////////탈퇴한 회원으로 나오게 수정
	if($record){
		$msg_name = $record["name"];
	}
	else{
		$msg_name="탈퇴한 회원";
	}
	///////////////////////////////////////////////////////////////////
	mysqli_close($con);
	if ($mode=="send")	    	
	    echo "송신 쪽지함 > 내용보기";
	else
		echo "수신 쪽지함 > 내용보기";
?>
		</h3>
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$msg_name?> | <?=$regist_day?></span>
			</li>
			<li>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li>
																	
				<li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
				<?php if ($mode!="send"){ ?>			
					<!-----------------수정-(송신때는 안보이도록) ---------------------------------------------->	
				<li><button onclick="location.href='message_response_form.php?num=<?=$num?>'">답변 쪽지</button></li>
				<?php } ?>
				
				<li><button onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button></li>
		</ul>
	</div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
