<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고양이 팬카페</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
function check_input() {
	if (!document.board_form.subject.value)
	{
		alert("제목을 입력하세요!");
		document.board_form.subject.focus();
		return;
	}
	if (!document.board_form.content.value)
	{
		alert("내용을 입력하세요!");    
		document.board_form.content.focus();
		return;
	}
    document.board_form.submit();
}
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        <!-- <img src="./img/board_cat.png"> -->
	</div>
	
	<div id="board_box">

		<div class="left-content">
			<h3 id="board_title">
				게시판
				<p>
				> 글 쓰기
				</p>
			</h3>
		</div>
		
		<div class="right-content">
			<form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
			<ul id="board_form">		
					<li>
						<!-- <span class="col1">제목 : </span> -->
						<span class="col2"><input name="subject" type="text" placeholder="제목"></span>
					</li>	    	
					<li>
						<span class="col1">작성자 </span>
						<span class="col2"><?=$username?></span>
					</li>
					<li id="text_area">	
						<!-- <span class="col1">내용 : </span> -->
						<span class="col2">
							<textarea name="content" placeholder="내용을 입력하세요"></textarea>
						</span>
					</li>
					<li>
						<span class="col1"> 첨부 파일</span>
						<span class="col2" id="files"><input type="file" name="upfile"></span>
					</li>
					</ul>
					<ul class="buttons">
						<li><button type="button" onclick="check_input()">완료</button></li>
						<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
					</ul>
			</form>
		</div>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
