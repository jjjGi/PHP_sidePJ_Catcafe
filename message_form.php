<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고양이 팬카페</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
function check_input() {
	if (!document.message_form.rv_id.value)
	{
		alert("수신 아이디를 입력하세요!");
		document.message_form.rv_id.focus();
		return;
	}
	if (!document.message_form.subject.value)
	{
		alert("제목을 입력하세요!");
		document.message_form.subject.focus();
		return;
	}
	if (!document.message_form.content.value)
	{
		alert("내용을 입력하세요!");    
		document.message_form.content.focus();
		return;
	}
	document.message_form.submit();
}
</script>
</head>
<body> 
<header>
	<?php include "header.php";?>
</header>  
<?php
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>

<section>
	<div id="main_img_bar">
		<!-- <img src="./img/main_img.png"> -->
	</div>
	<div id="message_box">
		<div class="left-content">
			<h3 id="write_title">
				쪽지<br />
				보내기
			</h3>
		</div>
		
		<div class="right-content">
			<ul class="top_buttons">
					<li><span><a href="message_box.php?mode=rv">수신 쪽지함 </a></span></li>
					<li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li>
			</ul>
			<form name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
				<div id="write_msg">
					<ul>
						<li>
							<!-- <span class="col1">제목 : </span> -->
							<span class="col2"><input name="subject" type="text" placeholder="제목"></span>
						</li>	
						<li>
							<!-- <span class="col1">수신 아이디 : </span> -->
							<span class="col2"><input name="rv_id" type="text" placeholder="받는사람"></span>
						</li>	
						<li>
							<span class="col1">보내는 사람 : </span>
							<span class="col2"><?=$userid?></span>
						</li>							
						<li id="text_area">	
							<!-- <span class="col1">내용 : </span> -->
							<span class="col2">
								<textarea name="content" placeholder="내용을 입력하세요"></textarea>
							</span>
						</li>	
					</ul>
					<div class="buttons">
						<button type="button" onclick="check_input()">보내기</button>
					</div>					
				</div>	    	
			</form>							
		</div>
		
	</div> <!-- message_box -->
</section> 
<footer>
	<?php include "footer.php";?>
</footer>
</body>
</html>
